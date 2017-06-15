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
    const VALID_DICE_FACES = ['1', '2', '3', '4', '5', '6'];

    /**
     * @var int
     */
    private $value;

    /**
     * DiceValue constructor.
     * @param string $value
     */
    public function __construct($value)
    {
        Assertion::InArray($value, self::VALID_DICE_FACES);

        $this->value = (int) $value;
    }

    /**
     * @param string $value
     */
    public static function fromValue($value)
    {
        return new self($value);
    }

    public function getValue()
    {
        return $this->value;
    }
}