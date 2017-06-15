<?php

namespace ScoreCalculator\Contracts;

interface StringToIntContract
{
    /**
     * @param string|null $input
     *
     * @return int
     */
    public function getNumber(string $input = null) : int;
}
