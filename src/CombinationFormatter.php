<?php

namespace Calculator;

class CombinationFormatter {

    /**
     * @param $combination
     * @return array
     * @throws \Exception
     */
    public static function formatToArray($combination) {
        if (preg_match('/^([1-6];){4,4}[1-6]{1,1}$/', $combination) == 0) {
            throw new \Exception("Bad format");
        }
        return explode(';', $combination);
    }
}