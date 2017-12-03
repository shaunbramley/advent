<?php

namespace Advent\Day2;

use Advent\Day2\Row;

class Spreadsheet
{
    private $rows;
    
    public function __construct() {
        $this->rows = [];
    }
    
    public function getNumberOfRows()
    {
        return count($this->rows);
    }

    public function addRow(Row $row) : Spreadsheet
    {
        $this->rows[] = $row;
        
        return $this;
    }

    public function getCheckSum()
    {
        $checksum = 0;
        array_walk(
            $this->rows,
            function($value, $key) use (&$checksum) {
                $checksum += $value->getDifference();
            }
        );
        
        return $checksum;
    }

    public function getDivisorChecksum()
    {
        $checksum = 0;
        array_walk(
            $this->rows, 
            function ($row, $key) use (&$checksum) {
                $checksum += $row->getDivisor(); 
            }
        );
        
        return $checksum;
    }
}
