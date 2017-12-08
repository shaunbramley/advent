<?php

namespace spec\Advent\Day8;

use Advent\Day8\Cpu;
use Advent\Day8\Instruction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CpuSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Cpu::class);
    }

    function it_can_process_instructions() {
        $this->process(new Instruction('b inc 5 if a > 1'));
        $this->getLargestValueInAnyRegister()->shouldReturn(0);

        $this->process(new Instruction('a inc 1 if b < 5'));
        $this->getLargestValueInAnyRegister()->shouldReturn(1);

        $this->process(new Instruction('c dec -10 if a >= 1'));
        $this->getLargestValueInAnyRegister()->shouldReturn(10);

        $this->process(new Instruction('c inc -20 if c == 10'));
        $this->getLargestValueInAnyRegister()->shouldReturn(1);
    }

    public function it_can_track_highest_value_ever_held() {
        $this->process(new Instruction('b inc 5 if a > 1'));
        $this->getLargestValueEncountered()->shouldReturn(0);

        $this->process(new Instruction('a inc 1 if b < 5'));
        $this->getLargestValueEncountered()->shouldReturn(1);

        $this->process(new Instruction('c dec -10 if a >= 1'));
        $this->getLargestValueEncountered()->shouldReturn(10);

        $this->process(new Instruction('c inc -20 if c == 10'));
        $this->getLargestValueEncountered()->shouldReturn(10);
    }
}
