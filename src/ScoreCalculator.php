<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:11
 */

namespace Kata\ScoreCalculator;


interface ScoreCalculator
{
    /**
     * @param string $rawDicesResult
     * @return int
     */
    public function calculateScore(string $rawDicesResult): int;
}
