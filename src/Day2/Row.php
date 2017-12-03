<?php

namespace Advent\Day2;

class Row
{
    private $cells;
    
    public function __construct(array $cells = [])
    {
        $this->cells = $cells;
    }

    public function getNumberLargest()
    {
        return max($this->cells);
    }
    
    public function getNumberSmallest() {
        return min($this->cells);
    }
    
    public function getDifference() {
        return $this->getNumberLargest() - $this->getNumberSmallest();
    }

    public function getDivisor()
    {
        $cells = $this->cells;
        $length = count($cells);
        
        sort($cells);

        foreach ($this->cells as $key => $value) {
            if ($key <= $length / 2) {

                for ($x = $key + 1; $x < ($length); $x++) {
                    // we have an even divisor
                    if (($cells[$x] % $cells[$key]) === 0) {

                        return $cells[$x] / $cells[$key];

                    }
                }
            }
            
        }
    }
}
