<?php

namespace Calculator;

class DiceCollection{

    /**
     * @var array
     */
    private $dices;

    public function countFace($face)
    {
        $diceCount = array();

        foreach($this->dices as $dice) {
            if ($dice->getFace() == $face) {
                $diceCount++;
            }
        }
        return $diceCount;
    }

    public function countFaces() {
        $diceCount = array();

        foreach($this->dices as $dice) {
            $diceCount[$dice->getFace()] += 1;
        }
        return $diceCount;
    }

    /**
     * @return array
     */
    public function getDices()
    {
        return $this->dices;
    }
}