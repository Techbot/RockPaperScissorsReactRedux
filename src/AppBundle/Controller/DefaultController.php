<?php

namespace AppBundle\Controller;

use Battle\Game;
use EventStore\EventStore;
use EventStore\WritableEvent;
use EventStore\WritableEventCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public $machineChoice;
   
    private $user;
    

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $this->user = $this->getUser();
        
         if ($this->user!=null) {
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            ]);
        }else{
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

    public function writeToStore(Request $request)
    {  
        $this->user = $this->getUser();

        $playerChoice = (int)$request->query->get('choice');

        $game = new Game();

        $this->machineChoice = $game->get_round($playerChoice);

        $es = new EventStore('http://46.19.33.139:2113');

        $events = new WritableEventCollection([
            WritableEvent::newInstance('round', ['player' => $this->user->getId(),'playerChoice' => $playerChoice, 'machineChoice' => $this->machineChoice]),

        ]);
        $es->writeToStream('RockPaperScissors', $events);

        return new Response( json_encode([$this->machineChoice, $playerChoice, $this->user->getId()]));
    }

    /**
     * @param Request $request
     * @Route("/buy", name="homepage3")
     * @return Response
     * @throws \EventStore\Exception\WrongExpectedVersionException
     */

    public function writeToStore2(Request $request)
    {
        $playerChoice = (int)$request->query->get('choice');

        $game = new Game();

        $game->buy($playerChoice);

        $es = new EventStore('http://46.19.33.139:2113');

        $events = new WritableEventCollection([
            WritableEvent::newInstance('buy', ['player' => $this->user,'playerChoice' => $playerChoice]),

        ]);
        $es->writeToStream('Products_Bought', $events);

        return new Response( json_encode([$playerChoice]));
    }




}
