<?php

namespace spec\Advent\Day2;

use Advent\Day2\Row;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RowSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Row::class);
    }
    
    function it_can_find_the_largest_number() {
        $this->beConstructedWith([5, 1, 9, 5]);
        
        $this->getNumberLargest()->shouldReturn(9);
    }
    
    function it_can_find_the_smallest_number() {
        $this->beConstructedWith([5, 1, 9, 5]);
        
        $this->getNumberSmallest()->shouldReturn(1);
    }
    
    function it_can_find_the_difference() {
        $this->beConstructedWith([5, 1, 9, 5]);
        
        $this->getDifference()->shouldReturn(8);
    }

    function it_can_find_the_evenly_divisible_value_in_first_row() {
        $this->beConstructedWith( [5, 9, 2, 8] );
        
        $this->getDivisor()->shouldReturn(4);
    }
    
    function it_can_find_the_evenly_divisible_value_in_second_row() {
        $this->beConstructedWith( [9, 4, 7, 3] );
        
        $this->getDivisor()->shouldReturn(3);
    }
    
    function it_can_find_the_evenly_divisible_value_in_third_row() {
        $this->beConstructedWith( [3, 8, 6, 5] );
        
        $this->getDivisor()->shouldReturn(2);
    }
}
