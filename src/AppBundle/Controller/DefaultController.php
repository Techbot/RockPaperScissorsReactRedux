<?php

namespace AppBundle\Controller;
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 07/04/2016
 * Time: 08:46
 */

use EventStore\EventStore;
use EventStore\WritableEvent;
use EventStore\WritableEventCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//require '../vendor/autoload.php';

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }

    /**
     * @param Request $request
     * @Route("/write/{id}", name="homepage2")
     * @return Response
     * @throws \EventStore\Exception\WrongExpectedVersionException
     */

    public function writeToStore(Request $request)
    {
        $data = (int)$request->query->get('choice');

        $machine = $this->get("stuff");

        $machineChoice = $machine->choice();

        $es = new EventStore('http://164.138.27.49:2113');

        $events = new WritableEventCollection([
            WritableEvent::newInstance('round', ['player' => $data,'machine' => $machineChoice]),



        ]);
        $es->writeToStream('RockPaperScissors', $events);

        return new Response( json_encode([$data,$machineChoice]));
    }
}
