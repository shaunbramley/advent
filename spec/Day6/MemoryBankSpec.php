<?php

namespace spec\Advent\Day6;

use Advent\Day6\MemoryBank;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MemoryBankSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MemoryBank::class);
    }

    public function it_reports_number_of_blocks() {
        $this->beConstructedWith(0);
        $this->getNumberOfBlocks()->shouldReturn(0);
    }

    public function it_can_clear_number_of_blocks() {
        $this->beConstructedWith(5);
        $this->getNumberOfBlocks()->shouldReturn(5);
        $this->clear();
        $this->getNumberOfBlocks()->shouldReturn(0);
    }

    public function it_can_add_blocks() {
        $this->getNumberOfBlocks(0);
        $this->addBlock(1)->getNumberOfBlocks()->shouldReturn(1);
    }


}
