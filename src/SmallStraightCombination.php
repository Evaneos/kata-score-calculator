<?php
namespace Kata;

class SmallStraightCombination implements Combination
{
    const SCORE = 20;
    const COMBINATION = [1,2,3,4,5];

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
