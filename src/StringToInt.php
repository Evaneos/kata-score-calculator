<?php

namespace Kata;

/**
 * Class StringToInt
 *
 * @package Kata\ScoreCalculator
 **/
class StringToInt implements StringToIntInterface
{

    /**
     * @param string $value
     *
     * @return int
     */
    public function cast(string $value): int
    {
        if (empty($value)) {
            return 0;
        }
    }
}
