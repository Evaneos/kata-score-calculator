<?php

namespace ScoreCalculator;

class Calculator implements StringToInt
{
    /**
     * @param string $string
     *
     * @return int
     */
    public function getNumber(string $string = null) : int
    {
        return $string ?? 0;
    }
}
