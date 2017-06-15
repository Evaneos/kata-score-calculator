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
     * @var DiceValue[]
     */
    private $values;

    /**
     * DiceValues constructor.
     * @param array $array_map
     */
    public function __construct(array $values)
    {
        Assertion::allIsInstanceOf($values, DiceValue::class);
        Assertion::count($values, self::NUMBER_OF_DICES, 'Bad number of dices');

        usort($values, function (DiceValue $value1, DiceValue $value2) {
            return $value1->getValue() - $value2->getValue();
        });

        $this->values = $values;
    }

    public function getValuesAsInts()
    {
        return array_map(function (DiceValue $value) {
            return $value->getValue();
        }, $this->values);
    }

    /**
     * @param DiceValue[] $scores
     * @return bool
     */
    public function isSmallStraight()
    {
        return $this->getValuesAsInts() === [1, 2, 3, 4, 5];
    }

    public function isLargeStraight()
    {
        return $this->getValuesAsInts() === [2, 3, 4, 5, 6];
    }
}