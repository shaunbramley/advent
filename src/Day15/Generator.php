<?php

namespace Advent\Day15;

class Generator
{
    private $factor;
    private $produced;
    private $match;

    public function __construct(int $start = 0, int $factor = 0, int $match = 0)
    {
        $this->produced = $start;
        $this->factor = $factor;
        $this->match = $match;
    }

    public function nextValueAsDec() : int {
        if ($this->match > 0) {
            do {
                $this->produced = ($this->produced * $this->factor) % 2147483647;
            } while (!(($this->produced % $this->match) === 0));
            return $this->produced;

        }
        if (0 === $this->match) {
            $this->produced = ($this->produced * $this->factor) % 2147483647;
        }
        return $this->produced;
    }

    public function nextValueAsBin() {
        return decbin($this->nextValueAsDec());
    }
}
