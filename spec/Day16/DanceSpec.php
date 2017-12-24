<?php

namespace spec\Advent\Day16;

use Advent\Day16\Dance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DanceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Dance::class);
    }

    function it_can_read_the_order() {
        $this->beConstructedWith(range('a', 'e'));
        $this->getOrder()->shouldReturn('abcde');
    }

    function it_can_perform_a_spin() {
        $this->beConstructedWith(range('a', 'e'));
        $this->getOrder()
             ->shouldReturn('abcde')
        ;
        $this->spin(1)
             ->getOrder()
             ->shouldReturn('eabcd')
        ;
    }

    function it_can_perform_an_exchange() {
        $this->beConstructedWith(range('a', 'e'));
        $this->spin(1)
             ->exchange(3, 4)
             ->getOrder()
             ->shouldReturn('eabdc')
        ;
    }

    function it_can_perform_a_swap() {
        $this->beConstructedWith(range('a', 'e'));
        $this->spin(1)
             ->exchange(3, 4)
             ->swap('e', 'b')
             ->getOrder()
             ->shouldReturn('baedc');
    }

    function it_can_interpret_a_spin() {
        $this->beConstructedWith(range('a', 'e'));
        $this->move('s1')
             ->getOrder()
             ->shouldReturn('eabcd');
    }

    function it_can_interpret_an_exchange() {
        $this->beConstructedWith(range('a', 'e'));
        $this->move('s1')
             ->move('x3/4')
             ->getOrder()
             ->shouldReturn('eabdc');
    }

    function it_can_interpret_a_swap() {
        $this->beConstructedWith(range('a', 'e'));
        $this->move('s1')
             ->move('x3/4')
             ->move('pe/b')
             ->getOrder()
             ->shouldReturn('baedc')
        ;
    }
}
