<?php

namespace ScoreCalculator;

class Calculator implements StringToIntContract
{
    /**
     * @param string $input
     *
     * @return int
     */
    public function getNumber(string $input = null) : int
    {
        return $input ?? 0;
    }
}
