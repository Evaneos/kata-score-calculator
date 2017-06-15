<?php

namespace Kata;

/**
 * Class Cast
 *
 * @package Kata\ScoreCalculator
 **/
interface ScoreCalculator
{

    /**
     * @param string $value
     *
     * @return int
     */
    public function score(string $value):int;
}
