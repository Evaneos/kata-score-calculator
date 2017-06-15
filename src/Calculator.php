<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\InputParser;
use Evaneos\Kata\Solid\RollsHandler;

class Calculator implements ScoreCalculator
{
    private $inputParser;
    private $rollsHandlers;

    public function __construct(InputParser $inputParser, array $handlers)
    {
        $this->inputParser = $inputParser;
        foreach ($handlers as $handler) {
            $this->addHandler($handler);
        }
    }

    public function calculate($input)
    {
        $rolls = $this->inputParser->parse($input);

        foreach($this->rollsHandlers as $handler) {
            $score = $handler->handle($rolls);
            if($score !== false) {
                return $score;
            }
        }

        return 0;
    }

    private function addHandler(RollsHandler $handler)
    {
        $this->rollsHandlers[] = $handler;
    }
}
