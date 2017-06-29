<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 17:07
 */

namespace Kata\ScoreCalculator;


use Assert\Assertion;

class Roll
{
    const NUMBER_OF_DICES = 5;

    /**
     * @var DiceFace[]
     */
    private $values;

    /**
     * DiceValues constructor.
     * @param array $array_map
     */
    public function __construct(array $values)
    {
        Assertion::allIsInstanceOf($values, DiceFace::class);
        Assertion::count($values, self::NUMBER_OF_DICES, 'Bad number of dices');

        usort($values, function (DiceFace $value1, DiceFace $value2) {
            return $value1->getValue() - $value2->getValue();
        });

        $this->values = $values;
    }

    /**
     * @return DiceFaceOccurence[]
     */
    public function getDiceFaceOccurences(): array
    {
        $countOccurences = array_count_values($this->getValuesAsInts());

        return array_reduce(
            array_keys($countOccurences),
            function (array $occurences, int $diceValue) use ($countOccurences) {
                $occurences[] = new DiceFaceOccurence(DiceFace::fromValue($diceValue), $countOccurences[$diceValue]);

                return $occurences;
            },
            []
        );
    }

    /**
     * @param int  $n
     *
     * @return bool
     */
    public function isAnyDiceValuePresentExactlyNTimes(int $n): bool
    {
        return array_reduce(
            $this->getDiceFaceOccurences(),
            function ($squareFound, DiceFaceOccurence $occurence) use ($n) {
                return $squareFound || $occurence->getCount() === $n;
            },
            false
        );
    }

    /**
     * @return bool
     */
    public function isConsecutive(): bool
    {
        return $this->getValuesAsInts()  === [1, 2, 3, 4, 5] ||
            $this->getValuesAsInts()  === [2, 3, 4, 5, 6];
    }

    /**
     * @return int
     */
    public function getMaxValue(): int
    {
        return max($this->getValuesAsInts());
    }

    /**
     * @return int[]
     */
    public function getValuesAsInts(): array
    {
        return array_map(function (DiceFace $value) {
            return $value->getValue();
        }, $this->values);
    }
}