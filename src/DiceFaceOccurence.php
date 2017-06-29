<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 17:37
 */

namespace Kata\ScoreCalculator;


class DiceFaceOccurence
{
    /** @var DiceFace */
    private $diceValue;

    /** @var int */
    private $count;

    /**
     * DiceValueOccurence constructor.
     * @param DiceFace $diceValue
     * @param int $count
     */
    public function __construct(DiceFace $diceValue, int $count)
    {
        $this->diceValue = $diceValue;
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getDiceValue(): int
    {
        return $this->diceValue->getValue();
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return DiceFaceOccurence
     */
    public function addOne() : DiceFaceOccurence
    {
        return new self($this->diceValue, $this->count + 1);
    }
}