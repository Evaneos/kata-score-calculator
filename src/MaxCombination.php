<?php
namespace Kata;

class MaxCombination implements Combination
{

    /**
     * @param array $diceFaces
     * @return int
     */
    public function score(array $diceFaces): int
    {
        $diceFaces = array_filter(
            array_count_values($diceFaces),
            function ($value) {
                return $value > 1;
            }
        );

        foreach ($diceFaces as $key => $value) {
            $diceFaces[$key] = $key * $value;
        };

        return max($diceFaces);
    }

    /**
     * @param array $diceFaces
     * @return bool
     */
    public function isSatisfied(array $diceFaces): bool
    {
        return count(array_unique($diceFaces)) !== 5;
    }
}
