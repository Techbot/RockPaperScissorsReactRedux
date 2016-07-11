<?php

namespace AppBundle\Controller;

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

    function __construct()
    {
        //$this->player = new Player();
        //$this->machine = new Npc();
    }

    /**
     * @return int
     */
    public function get_machineChoice()
    {
        $this->machineChoice = $this->machine->choose();
    }

    public function compare()
    {
        if ($this->playerChoice > $this->machineChoice) {
            return 'win';
        }
        if ($this->playerChoice < $this->machineChoice) {
            return 'lose';
        }
        return 'draw';
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

            //trigger exception in a "try" block
            try {
                $this->checkNotNull($this->user->getGameStatus());
                //If the exception is thrown, this text will not be shown
                echo 'If you see this, the player is set';
            }
            //catch exception
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }

                $es = new EventStore('http://46.19.33.139:2113');

                $events = new WritableEventCollection([
                    WritableEvent::newInstance('init', ['player' => $this->user->getId()])
                ]);
                $es->writeToStream('RockPaperScissors', $events);

                $this->user->setGameStatus(1);

                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($this->user);

                $this->getDoctrine()->getManager()->flush();
                //$userManager->flush();



            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            ]);
        }
    }


    public function checkNotNull(){
        if ($this->user->getGameStatus() === null){
            throw new \Exception("Value must be object at this point");
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

        $this->machineChoice = $this->get_machineChoice();

        //this would be localhost
        $es = new EventStore('http://46.19.33.139:2113');

        $result = $this->compare();

        $events = new WritableEventCollection([
            WritableEvent::newInstance('round', ['player' => $this->user->getId(), 'playerChoice' => $this->playerChoice, 'machineChoice' => $this->machineChoice, 'result' => $result]),

        ]);
        $es->writeToStream('RockPaperScissors', $events);



        return new Response(json_encode([$this->machineChoice, $this->playerChoice, $this->user->getId()]));
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
