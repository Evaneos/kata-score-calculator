<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 16:37
 */

namespace Kata\ScoreCalculator\DiceFace;

use Assert\Assertion;
use Kata\ScoreCalculator\DiceFace;

class TraditionnalDiceFace implements DiceFace
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
    public static function fromValue(int $value): DiceFace
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

    /**
     * @return string
     */
    public function face(): string
    {
        return (string) $this->value;
    }
}