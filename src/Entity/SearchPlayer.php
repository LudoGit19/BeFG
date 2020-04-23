<?php

namespace App\Entity;

class SearchPlayer{
    private $minYearOfBirth;
    private $maxYearOfBirth;

    /**
     * Get the value of minYearOfBirth
     */ 
    public function getMinYearOfBirth()
    {
        return $this->minYearOfBirth;
    }

    /**
     * Set the value of minYearOfBirth
     *
     * @return  self
     */ 
    public function setMinYearOfBirth(int $minYearOfBirth)
    {
        $this->minYearOfBirth = $minYearOfBirth;

        return $this;
    }

    /**
     * Get the value of maxYearOfBirth
     */ 
    public function getMaxYearOfBirth()
    {
        return $this->maxYearOfBirth;
    }

    /**
     * Set the value of maxYearOfBirth
     *
     * @return  self
     */ 
    public function setMaxYearOfBirth(int $maxYearOfBirth)
    {
        $this->maxYearOfBirth = $maxYearOfBirth;

        return $this;
    }
}