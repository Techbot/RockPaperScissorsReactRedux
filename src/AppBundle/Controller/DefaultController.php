<?php

namespace AppBundle\Controller;

use Application\Machine;
use Application\Game;
use Battle\Player;
use Battle\Npc;
use EventStore\EventStore;
use EventStore\WritableEvent;
use EventStore\WritableEventCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

class DefaultController extends Controller
{
    private $machineChoice;
    private $playerChoice;
    private $user;
    private $player;
    private $machine;
    private $game;   

    function __construct()
    {
        $this->game = new Game();
        $this->machine = new Machine();
        $this->machineChoice = $this->machine->choose();
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $this->user = $this->getUser();

        if ($this->user == null) {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();

            return $this->render('default/home.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
                'users' => $users
            ]);
        } else {

            try {
                $this->checkNotNull($this->user->getGameStatus());
                //If the exception is thrown, this text will not be shown
                echo 'If you see this, the player is set';
            }
            //catch exception
            catch(\Exception $e) {
                $es = new EventStore('http://46.19.33.139:2113');

                $events = new WritableEventCollection([
                    WritableEvent::newInstance('init', ['player' => $this->user->getId()])
                ]);
                $es->writeToStream('RockPaperScissors', $events);

                $this->user->setGameStatus(1);

                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($this->user);

                $this->getDoctrine()->getManager()->flush();
                echo 'Message: ' .$e->getMessage();
             }
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            ]);
        }
    }

    public function checkNotNull(){
        if ($this->user->getGameStatus() === null){
            throw new \Exception("Gamestatus must be set at this point");
        }
    }

    /**
     * @param Request $request
     * @Route("/round", name="homepage2")
     * @return Response
     * @throws \EventStore\Exception\WrongExpectedVersionException
     */

    public function round(Request $request)
    {
        $this->user = $this->getUser();
        $this->playerChoice = (int)$request->query->get('choice');
        //this would be localhost
        $es = new EventStore('http://46.19.33.139:2113');
        $result = $this->game->round($this->playerChoice, $this->machineChoice);
        $events = new WritableEventCollection([
            WritableEvent::newInstance('round', ['player' => $this->user->getId(), 'playerChoice' => $this->playerChoice, 'machineChoice' => $this->machineChoice, 'result' => $result]),
        ]);

        if ($es->writeToStream('RockPaperScissors', $events)) {
            return new Response(json_encode([$this->machineChoice, $this->playerChoice, $this->user->getId()]));
        }
        return new Response(json_encode(['write fail']));
    }

    /**
     * @Route("/myid", name="myId")
     * @return Response
     */

    public function getMyID()
    {
        return new Response(json_encode($this->getUser()->getId() ? $this->getUser()->getId() : 0));
    }
}
