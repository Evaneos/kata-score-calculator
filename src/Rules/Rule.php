<?php

namespace Calculator\Rules;

interface Rule {
    /**
     * @param array $scores
     * @return boolean
     */
    public function apply(array $scores);
}