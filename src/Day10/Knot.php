<?php
declare(strict_types = 1);

namespace Advent\Day10;

class Knot
{
    private $current = 0;
    private $skip    = 0;
    public function __invoke(array $list, array $lengths) : array {

        $size = count($list);

        foreach ($lengths as $length) {
            $arr = $list;

            for ($x = 0; $x < (int) $length; $x++) {
                $arr[($this->current + $x) % $size] =  $list[($this->current + ($length % $size) - $x - 1) % $size];
            }

            $this->current += ($length + $this->skip) % $size;
            $this->skip++;

            $list = $arr;
        }
        return $list;
    }
}
