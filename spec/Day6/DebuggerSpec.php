<?php

namespace spec\Advent\Day6;

use Advent\Day6\Debugger;
use Advent\Day6\MemoryBank;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DebuggerSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith([
            new MemoryBank(0),
            new MemoryBank(2),
            new MemoryBank(7),
            new MemoryBank(0),
        ]);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Debugger::class);
    }

    function it_can_find_largest_memory_bank()
    {
        $this->getLargestMemoryBankPointer()->shouldReturn(2);
    }

    function it_can_reallocate_the_largest() {
        $this->reallocate();

        // 2 4 1 2
        $this->getLargestMemoryBankPointer()->shouldReturn(1);
        $this->getMemoryBank($this->getLargestMemoryBankPointer())->getNumberOfBlocks()->shouldReturn(4);
        $this->getBanksSizeAsString()->shouldReturn('2 4 1 2');
    }

    function it_can_find_infinite_loop() {
        $this->getBanksSizeAsString()->shouldReturn('0 2 7 0');
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('2 4 1 2');
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('3 1 2 3');
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('0 2 3 4');
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('1 3 4 1');
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('2 4 1 2');
        $this->hasCurrentStateBeenSeenBefore()->shouldReturn(true);
        $this->getDistributionCount()->shouldReturn(5);

    }

    function it_can_state_number_of_cycles_within_infinite_loop() {
        $this->reallocate();
        $this->reallocate();
        $this->reallocate();
        $this->reallocate();
        $this->reallocate();
        $this->getBanksSizeAsString()->shouldReturn('2 4 1 2');
        $this->hasCurrentStateBeenSeenBefore()->shouldReturn(true);
        $this->getDistributionCount()->shouldReturn(5);
        $this->getNumberOfCyclesWithinInfiniteLoop()->shouldReturn(4);

    }
}
