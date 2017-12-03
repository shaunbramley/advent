<?php

namespace spec\Advent\Day1;

use Advent\Day1\Comparator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComparatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Comparator::class);
    }

    
    public function it_can_pass_puzzle1_first_example() {
        $this->beConstructedWith(str_split('1122', 1), 1);
        $this->__invoke();
        $this->getSummation()->shouldReturn(3);
    }
    
    public function it_can_pass_puzzle1_second_example() {
        $this->beConstructedWith(str_split('1111', 1), 1);
        $this->__invoke();
        $this->getSummation()->shouldReturn(4);
    }
    
    public function it_can_pass_puzzle1_third_example() {
        $this->beConstructedWith(str_split('1234', 1), 1);
        $this->__invoke();
        $this->getSummation()->shouldReturn(0);
    }
    
    public function it_can_pass_puzzle1_fourth_example() {
        $this->beConstructedWith(str_split('91212129', 1), 1);
        $this->__invoke();
        $this->getSummation()->shouldReturn(9);
    }
    
    /*
     * 1212 produces 6: the list contains 4 items, and all four digits match the digit 2 items ahead.
     * 1221 produces 0, because every comparison is between a 1 and a 2.
     * 123425 produces 4, because both 2s match each other, but no other digit has a match.
     * 123123 produces 12.
     * 12131415 produces 4.
     */
    
    
    public function it_can_pass_puzzle2_first_example() {
        $input = [1, 2, 1, 2];
        
        $this->beConstructedWith($input, count($input) / 2);
        $this->__invoke();
        $this->getSummation()->shouldReturn(6);
    }
    
    public function it_can_pass_puzzle2_second_example() {
        $input = [1, 2, 2, 1];
        
        $this->beConstructedWith($input, count($input) / 2);
        $this->__invoke();
        $this->getSummation()->shouldReturn(0);
    }
    
    public function it_can_pass_puzzle2_third_example() {
        $input = [1, 2, 3, 4, 2, 5];
        
        $this->beConstructedWith($input, count($input) / 2);
        $this->__invoke();
        $this->getSummation()->shouldReturn(4);
    }
    
    public function it_can_pass_puzzle2_fourth_example() {
        $input = [1, 2, 3, 1, 2, 3];
        
        $this->beConstructedWith($input, count($input) / 2);
        $this->__invoke();
        $this->getSummation()->shouldReturn(12);
    }
    
    public function it_can_pass_puzzle2_fifth_example() {
        $input = [1, 2, 1, 3, 1, 4, 1, 5];
        
        $this->beConstructedWith($input, count($input) / 2);
        $this->__invoke();
        $this->getSummation()->shouldReturn(4);
    }
}
