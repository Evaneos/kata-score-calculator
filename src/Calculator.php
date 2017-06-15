<?php

namespace ScoreCalculator;

class Calculator implements Contracts\StringToIntContract
{
    /**
     * @param string|null $input
     *
     * @return int
     */
    public function getNumber(string $input = null) : int
    {
        return $input ?? 0;
    }
}
