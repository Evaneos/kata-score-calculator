<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 29/06/2017
 * Time: 17:15
 */

namespace Kata\ScoreCalculator\DiceFace;


use Kata\ScoreCalculator\DiceFace;

class PirateDiceFace implements DiceFace
{
    const SKULL = 'skull';
    const MONKEY = 'monkey';
    const DIAMOND = 'diamond';
    const GOLD = 'gold';
    const PARROT = 'parrot';
    const SWORDS = 'swords';

    private static $values = [
        self::SKULL => 0,
        self::MONKEY => 1,
        self::DIAMOND => 5,
        self::GOLD => 5,
        self::PARROT => 1,
        self::SWORDS => 1
    ];

    /** @var string */
    private $face;

    /** @var int */
    private $value;

    /**
     * PirateDiceFace constructor.
     *
     * @param string $face
     * @param int    $value
     */
    private function __construct($face, $value)
    {
        $this->face = $face;
        $this->value = $value;
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
        return $this->face;
    }

    /**
     * @param string $face
     */
    public static function fromFace($face): PirateDiceFace
    {
        return new self($face, self::$values[$face]);
    }
}