<?php
namespace Kata;

class BigStraightCombination implements Combination
{
    const SCORE = 25;
    const COMBINATION = [2,3,4,5,6];

    /**
     * @param int[] $diceFaces
     * @return int
     */
    public function score(array $diceFaces): int
    {
        return self::SCORE;
    }

    /**
     * @param int[] $diceFaces
     * @return bool
     */
    public function isSatisfied(array $diceFaces): bool
    {
        sort($diceFaces);
        return $diceFaces === self::COMBINATION;
    }
}
