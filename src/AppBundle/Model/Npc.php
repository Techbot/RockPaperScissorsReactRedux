<?php
namespace Battle;
class Npc
{
    public function __construct()
    {
       
    }

    public function choose()
    {
        return rand(0,2);
    }
}
