<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 16:07
 */

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\Combination;
use Kata\ScoreCalculator\DiceFaceOccurence;
use Kata\ScoreCalculator\Roll;

class OtherCombination implements Combination
{
    /**
     * @param Roll $roll
     *
     * @return bool
     */
    public function satisfies(Roll $roll): bool
    {
        return true;
    }

    /**
     * @param Roll $roll
     *
     * @return int
     */
    public function getScore(Roll $roll): int
    {
        $duplicates = $roll->getDiceFaceOccurences();

        return max(
            array_map(function (DiceFaceOccurence $occurence) use ($duplicates) {
                if ($occurence->getCount() < 2) {
                    return 0;
                }
                return $occurence->getCount() * $occurence->getDiceValue();
            }, $duplicates)
        );
    }
}
