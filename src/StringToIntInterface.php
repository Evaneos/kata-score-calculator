<?php

namespace Kata;

/**
 * Class Cast
 *
 * @package Kata\ScoreCalculator
 **/
interface StringToIntInterface
{

    /**
     * @param string $value
     *
     * @return int
     */
    public function cast(string $value):int;
}
