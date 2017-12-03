<?php

namespace Advent\Day1;

class Comparator
{
    private $input;
    private $offset;
    private $summary;
    
    public function __construct(array $input = [], int $offset = 1) {
        $this->input = $input;
        $this->offset = $offset;
        $this->summary = 0;
    }

    public function __invoke() {
        $length = count($this->input);
        
        if ($length > 0) {
            foreach ($this->input as $key => $value) {

                $offset = $key + $this->offset;
                if ($offset >= $length) {
                    $offset -= $length;
                }
                
               
                if ($value === $this->input[$offset]) {
                    $this->summary += $value;
                }
            }
        }
    }
    
    public function getSummation() {
        return $this->summary;
    }
    
}
