<?php
namespace Kata;

class PairCombination implements Combination
{
    /**
     * @param int[] $diceFaces
     * @return int
     */
    public function score(array $diceFaces): int
    {
        $diceFaces = $this->filterPair($diceFaces);

        foreach ($diceFaces as $key => $value) {
            $diceFaces[$key] = $key * $value;
        };

        return max($diceFaces);
    }

    /**
     * @param int[] $diceFaces
     * @return bool
     */
    public function isSatisfied(array $diceFaces): bool
    {
        $diceFaces = $this->filterPair($diceFaces);

        return !empty($diceFaces);
    }

    /**
     * @param int[] $diceFaces
     *
     * @return int[]
     */
    private function filterPair(array $diceFaces): array
    {
        return array_filter(
            array_count_values($diceFaces),
            function ($value) {
                return $value === 2;
            }
        );
    }
}
