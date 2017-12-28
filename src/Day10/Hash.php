<?php

namespace Advent\Day10;

class Hash
{
    public function __invoke(Knot $knot, string $input) : string {
        $lengths = [];
        $hash = '';

        for ($x = 0; $x < strlen($input); $x++) {
            $lengths[] = ord($input[$x]);
        }

        $lengths = array_merge($lengths, [17, 31, 73, 47, 23]);
        $list = range(0, 255);

        for ($x = 0; $x < 64; $x++) {
            $list = $knot($list, $lengths);
        }

        for ($x = 0; $x < 16; $x++) {
            $v = 0;
            for ($y = 0; $y < 16; $y++) {
                $v ^= $list[($x * 16) + $y];
            }
            $hash .= str_pad(dechex($v), 2, '0', STR_PAD_LEFT);
        }
        return $hash;
    }
}
