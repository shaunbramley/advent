<?php

namespace spec\Advent\Day2;

use Advent\Day2\Spreadsheet;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Advent\Day2\Row;

class SpreadsheetSpec extends ObjectBehavior
{
    function let() {

        $row1 = new Row([ 5, 1, 9, 5]);
        $row2 = new Row([ 7, 5, 3]);
        $row3 = new Row([ 2, 4, 6, 8]);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(Spreadsheet::class);
    }
    
    function it_can_add_rows(Row $row1) {
        
        $this->beConstructedWith();
        $this->getNumberOfRows()->shouldReturn(0);
        
        $this->addRow($row1)->getNumberOfRows()->shouldReturn(1);
        $this->addRow($row1)->getNumberOfRows()->shouldReturn(2);
    }
    
    function it_can_calculate_checksum_for_first_row() {
        $this->beConstructedWith();
        
        $this->addRow(new Row([ 5, 1, 9, 5]))->getCheckSum()->shouldReturn(8);
    }
    function it_can_calculate_checksum_for_second_row() {
        $this->beConstructedWith();
        
        $this->addRow(new Row([ 7, 5, 3]))->getCheckSum()->shouldReturn(4);
    }
    
    function it_can_calculate_checksum_for_third_row() {
        $this->beConstructedWith();
        
        $this->addRow(new Row([ 2, 4, 6, 8]))->getCheckSum()->shouldReturn(6);
    }
    
    function it_can_calculate_checksum_for_all_rows_added() {
        $this->beConstructedWith();
        
        $this
            ->addRow(new Row([ 5, 1, 9, 5]))
            ->addRow(new Row([ 7, 5, 3]))
            ->addRow(new Row([ 2, 4, 6, 8]))
            ->getCheckSum()
            ->shouldReturn(18);
    }
    
    function it_can_calculate_divisor_checksum_for_all_rows_added() {
        $this->beConstructedWith();
        $this
            ->addRow(new Row([5, 9, 2, 8]))
            ->addRow(new Row([9, 4, 7, 3]))
            ->addRow(new Row([3, 8, 6, 5]))
            ->getDivisorChecksum()
            ->shouldReturn(9)
        ;
    }
}
