<?php

namespace ScoreCalculator;

interface StringToInt
{
    /**
     * @param string $number
     *
     * @return int
     */
    public function getNumber(string $number = null) : int;
}
