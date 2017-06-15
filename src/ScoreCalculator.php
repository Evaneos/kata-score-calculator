<?php

namespace Evaneos\Kata\Solid;

interface ScoreCalculator
{
    /**
     * @param string $input
     * @return int
     */
    public function calculate($input);
}
