<?php
namespace Kata;


interface Combination
{
    /**
     * @param int[] $diceFaces
     * @return int
     */
    public function score(array $diceFaces): int;

    /**
     * @param int[] $diceFaces
     * @return bool
     */
    public function isSatisfied(array $diceFaces): bool;
}
