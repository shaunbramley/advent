<?php

namespace Advent\Day2;

class Puzzle2
{
    public function __invoke() {
        
        $spreadsheet = new Spreadsheet();
        
        $input = array_map(
            function ($value) {
                return str_getcsv($value, "\t");
            },
            file(__DIR__ . '/../../input/day_2.txt')
        );

        foreach($input as $key => $value) {
            $row = new Row($value);
            
            echo 'Row: ' . $key . PHP_EOL;
            echo 'Minimum: ' . $row->getNumberSmallest() . PHP_EOL;
            echo 'Maximum: ' . $row->getNumberLargest() . PHP_EOL;
            echo 'Difference: ' . $row->getDivisor() . PHP_EOL;
            
            $spreadsheet->addRow($row);
        }
        
        echo 'The checksum is: ' . $spreadsheet->getDivisorChecksum();
    }
}