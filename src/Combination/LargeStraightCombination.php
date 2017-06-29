<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 16:07
 */

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\Combination;
use Kata\ScoreCalculator\Roll;

class LargeStraightCombination implements Combination
{
    const SCORE = 25;

    /**
     * @param Roll $roll
     *
     * @return bool
     */
    public function satisfies(Roll $roll): bool
    {
        return $roll->isConsecutive() && $roll->getMaxFace() === '6';
    }

    /**
     * @param Roll $roll
     *
     * @return int
     */
    public function getScore(Roll $roll): int
    {
        return self::SCORE;
    }
}