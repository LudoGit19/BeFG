<?php

namespace App\Entity;

class SearchTeam{
    private $nameOfTeam;

    /**
     * Get the value of nameOfTeam
     */ 
    public function getNameOfTeam()
    {
        return $this->nameOfTeam;
    }

    /**
     * Set the value of nameOfTeam
     *
     * @return  self
     */ 
    public function setNameOfTeam($nameOfTeam)
    {
        $this->nameOfTeam = $nameOfTeam;

        return $this;
    }
}