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
        $userManager = $this->get('fos_user.user_manager');
        $this->user = $this->getUser();

        if ($this->user != null) {

            $users = $userManager->findUsers();

            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
                'users' => $users

            ]);
        } else {

            if ($this->user->getGameStatus = null) {
                $es = new EventStore('http://46.19.33.139:2113');

                $events = new WritableEventCollection([
                    WritableEvent::newInstance('init', ['player' => $this->user->getId()])
                ]);
                $es->writeToStream('RockPaperScissors', $events);

                $this->user->setGameStatus(1);

                $userManager->updateUser($this->user);

                //$this->getDoctrine()->getManager()->flush();
                $userManager->flush();
            }

            return $this->render('default/home.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            ]);
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
        return new Response(json_encode([$this->getUser()->getId()]));
    }
}
