<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 16:37
 */

namespace Kata\ScoreCalculator;


use Assert\Assertion;

class DiceValue
{
    const VALID_DICE_FACES = [1, 2, 3, 4, 5, 6];

    /**
     * @var int
     */
    private $value;

    /**
     * DiceValue constructor.
     * @param string $value
     */
    private function __construct(int $value)
    {
        Assertion::InArray($value, self::VALID_DICE_FACES);

        $this->value = $value;
    }

    /**
     * @param int $value
     */
    public static function fromValue(int $value): DiceValue
    {
        return new self($value);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}