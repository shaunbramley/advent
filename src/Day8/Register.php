<?php

namespace Advent\Day8;

class Register
{
    private $value;

    function __construct($value = 0)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function dec(int $value) : Register
    {
        $this->value -= $value;
        return $this;
    }

    public function inc(int $value) : Register {
        $this->value += $value;
        return $this;
    }

    public function isGreaterThanOrEqual(int $value) {
        return $this->value >= $value;
    }

    public function isLessThanOrEqual(int $value) {
        return $this->value <= $value;
    }

    public function isGreaterThan(int $value) {
        return $this->value > $value;
    }

    public function isLessThan(int $value) {
        return $this->value < $value;
    }

    public function isEqual(int $value) {
        return $this->value == $value;
    }

    public function isNotEqual(int $value) {
        return $this->value != $value;
    }
}
