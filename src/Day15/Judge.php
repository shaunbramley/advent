<?php

namespace Advent\Day15;

class Judge
{
    private $matches = 0;

    public function compare(Generator $a, Generator $b) {
        $first = $a->nextValueAsBin();
        $second = $b->nextValueAsBin();

        if($this->lowestTwoBytes($first) === $this->lowestTwoBytes($second)) {
            $this->matches++;
        }
    }

    private function lowestTwoBytes(string $input) {
        return substr($input, -16, 16);
    }

    public function cycles(Generator $a, Generator $b, int $repetitions) {
        do {
            $this->compare($a, $b);
            $repetitions--;
        } while ($repetitions > 0);
    }

    public function getNumberOfMatches()
    {
        return $this->matches;
    }
}
