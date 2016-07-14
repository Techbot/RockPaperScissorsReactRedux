<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true))
     */
    protected $gameStatus;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getGameStatus()
    {
        return $this->gameStatus;
    }

    /**
     * set id
     *
     * @return integer
     */
    public function setGameStatus($gameStatus)
    {
        $this->gameStatus= $gameStatus;
    }
    /**
     *
     * @var string
     *
     * @ORM\Column(name="hobby", type="string", nullable =true))
     */
    protected $hobby;

}