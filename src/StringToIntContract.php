<?php

namespace ScoreCalculator;

interface StringToIntContract
{
    /**
     * @param string $input
     *
     * @return int
     */
    public function getNumber(string $input = null) : int;
}
