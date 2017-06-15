<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:11
 */

namespace Kata\ScoreCalculator;


class ScoreCalculator
{
    /**
     * @param string $score
     * @return int
     */
    public function calculateScore($score = null)
    {
        $score = null === $score ? [] : explode(';', $score);
        return array_reduce($score, function ($carry, $score) {
            return $carry = $carry + $score;
        }, 0);
    }
}