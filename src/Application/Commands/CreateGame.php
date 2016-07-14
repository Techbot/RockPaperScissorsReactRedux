<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 14/07/16
 * Time: 12:50
 */

namespace Application;


use Application\Domain\GameId;

final class CreateGame
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return GameId
     */
    public function getId()
    {
        return GameId::fromString($this->id);
    }
}
