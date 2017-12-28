<?php

namespace spec\Advent\Day10;

use Advent\Day10\Hash;
use Advent\Day10\Knot;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HashSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Hash::class);
    }

    function it_finds_correct_hash_for_null() {
        $this->__invoke(new Knot(), '')->shouldReturn('a2582a3a0e66e6e86e3812dcb672a272');
    }

    function it_finds_correct_hash_for_AOC_2017() {
        $this->__invoke(new Knot(), 'AoC 2017')->shouldReturn('33efeb34ea91902bb2f59c9920caa6cd');
    }

    function it_finds_correct_hash_for_1_2_3() {
        $this->__invoke(new Knot(), '1,2,3')->shouldReturn('3efbe78a8d82f29979031a4aa0b16a9d');
    }

    function it_finds_correct_hash_for_1_2_4() {
        $this->__invoke(new Knot(), '1,2,4')->shouldReturn('63960835bcdc130f0b66d7ff4f6a5a8e');
    }
}
