<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 17:07
 */

namespace Kata\ScoreCalculator;


use Assert\Assertion;
use Kata\ScoreCalculator\DiceFace\TraditionnalDiceFace;

class Roll
{
    const NUMBER_OF_DICES = 5;

    /**
     * @var DiceFace[]
     */
    private $diceFaces;

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

        $this->diceFaces = $values;
    }

    /**
     * @return DiceFaceOccurence[]
     */
    public function getDiceFaceOccurences(): array
    {
        /** @var DiceFaceOccurence[] $occurences */
        $occurences = [];

        foreach ($this->diceFaces as $diceFace) {
            if (!isset($occurences[$diceFace->face()])) {
                $occurences[$diceFace->face()] = new DiceFaceOccurence($diceFace, 1);
            } else {
                $occurences[$diceFace->face()] = $occurences[$diceFace->face()]->addOne();
            }
        }

        return array_values($occurences);
    }

    /**
     * @param int  $n
     *
     * @return bool
     */
    public function isAnyDiceFacePresentExactlyNTimes(int $n): bool
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
        return $this->getValuesAsStrings()  === ['1', '2', '3', '4', '5'] ||
            $this->getValuesAsStrings()  === ['2', '3', '4', '5', '6'];
    }

    /**
     * @return int
     */
    public function getMaxFace(): string
    {
        return max($this->getValuesAsStrings());
    }

    /**
     * @return int[]
     */
    public function getValuesAsStrings(): array
    {
        return array_map(function (DiceFace $value) {
            return $value->face();
        }, $this->diceFaces);
    }
}