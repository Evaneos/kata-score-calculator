<?php

namespace Evaneos\Kata\Solid;

class DuplicatedRollsHandler implements RollsHandler
{

  public function handle($rolls)
  {
    $countValues = array_count_values($rolls);
    $bestScore = 0;
    foreach ($countValues as $roll => $count) {
        if ($count > 1 && $score = $count * $roll) {
            $bestScore = $score;
        }
    }

    return $bestScore === 0 ? false : $bestScore;
  }

}
