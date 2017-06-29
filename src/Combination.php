<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 16:05
 */

namespace Kata\ScoreCalculator;

interface Combination
{
    /**
     * @param Roll $roll
     *
     * @return bool
     */
    public function satisfies(Roll $roll): bool;

    /**
     * @param Roll $roll
     *
     * @return int
     */
    public function getScore(Roll $roll): int;
}