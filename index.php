<?php



require __DIR__ . '/vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: rob
 * Date: 07/04/2016
 * Time: 08:46
 */

use EventStore\EventStore;
use EventStore\WritableEvent;
use EventStore\WritableEventCollection;

$es = new EventStore('http://164.138.27.49:2113');

$events = new WritableEventCollection([
    WritableEvent::newInstance('attacked', ['foo' => 'bar']),
    WritableEvent::newInstance('attacked', ['fizz' => 'buzz']),
]);
$es->writeToStream('StreamName', $events);