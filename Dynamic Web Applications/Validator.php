<?php

class Validator {

    public static function string($input, $min = 1, $max = 1000) {

        $value = trim($input);

        return strlen($value) < $min || strlen($value) > $max;

    }
}