<?php
declare(strict_types=1);

namespace Advent\Day5;

class Maze
{
    private $instructions;
    private $jumps;
    private $index;
    private $offsets;

    private $operands;

    public function __construct(array $instructions = [], $offsets =[])
    {
        $this->instructions = $instructions;
        $this->jumps = 0;
        $this->index = 0;
        $this->offsets = $offsets;

        $this->operands = $operands = [
            '<' => function($a, $b) : bool {
                return ($a < $b);
            },
            '>' => function($a, $b) : bool {
                return ($a > $b);
            },
            '>=' => function($a, $b) : bool {
                return ($a >= $b);
            },
            '<=' => function($a, $b) : bool {
                return ($a <= $b);
            },
        ];
    }

    public function getNumberOfInstructions() : int
    {
        return count($this->instructions);
    }

    public function getNumberOfJumpsTaken() : int
    {
        return $this->jumps;
    }

    public function getIndexPointer() : int
    {
        return $this->index;
    }

    /*
     * Perform a single jump step.
     */
    public function jump() : void
    {
        // increment the value at current index
        
        // Is the index pointing to a point within the array.
        if (array_key_exists($this->index, $this->instructions)) {
            // Is the next hop within the maze?

            // determine if we need to add / remove steps based on provided rules.
            $step = $this->offset((int) $this->instructions[$this->index]);
            
            // add / subtract to the offset as required.
            $this->instructions[$this->index] += $step;
            
            // move the index
            $this->index += ($this->instructions[$this->index] - $step);
            
            // increment number of hops taken.
            $this->jumps++;
        }
    }
    
    private function offset(int $offset) : int
    {
        if (count($this->offsets) === 0) {
            // we have no rules so just step +1
            return 1;
        }
        foreach ($this->offsets as $rule) {
            $f = $this->operands[$rule[0]];
            if ($f($offset, $rule[1])) {
                return $rule[2];
            }
        }
    }
    
    /*
     * Wrapper function that will automatically jump until puzzle has been solved.
     */
    public function solve() {
        do {
            $this->jump();
            
        } while (!$this->getHasFinishedPuzzle());
    }
    
    public function getInstructions() : array
    {
        return $this->instructions;
    }

    public function getHasFinishedPuzzle()
    {
        return !array_key_exists($this->index, $this->instructions);
    }
}
