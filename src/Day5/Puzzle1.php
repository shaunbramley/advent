<?php

namespace Advent\Day5;

class Puzzle1
{
    public function __invoke() {
    
        $input = file_get_contents(__DIR__ . '/../../input/day_5.txt');
        $input = trim(preg_replace("/\n/", ' ', $input));
        $input = explode(' ', $input);
        
        $maze = new Maze($input);
        
        $maze->solve();
    
        echo 'Jumps required: ' . $maze->getNumberOfJumpsTaken() . PHP_EOL;
    }
}
