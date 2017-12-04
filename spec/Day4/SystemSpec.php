<?php

namespace spec\Advent\Day4;

use Advent\Day4\System;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Advent\Day4\Passphrase;

class SystemSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(System::class);
    }
    
    function it_has_zero_items_in_password_list_at_creation() {
        $this->beConstructedWith();
        $this->getNumberOfPassphrases()->shouldReturn(0);
    }
    
    function it_has_zero_valid_passphrases_at_creation() {
        $this->beConstructedWith();
        $this->getNumberOfValidPassphrases()->shouldReturn(0);
    }
    
    function it_can_correctly_calculate_number_of_valid_passphrases() {
        $this->beConstructedWith();
        $this->getNumberOfValidPassphrases()->shouldReturn(0);
        
        $this->add(new Passphrase('aa bb cc dd ee'))->getNumberOfValidPassPhrases()->shouldReturn(1);
        $this->add(new Passphrase('aa bb cc dd aa'))->getNumberOfValidPassPhrases()->shouldReturn(1);
        $this->add(new Passphrase('aa bb cc dd aaa'))->getNumberOfValidPassPhrases()->shouldReturn(2);
    }
    
    function it_can_correctly_calculate_number_of_valid_passphrases_by_anagram() {
        $this->beConstructedWith();
        $this->getNumberOfValidPassphrases()->shouldReturn(0);
        
        $this->add(new Passphrase('abcde fghij'))->getNumberOfValidAnagramChecks()->shouldReturn(1);
        $this->add(new Passphrase('abcde xyz ecdab'))->getNumberOfValidAnagramChecks()->shouldReturn(1);
        $this->add(new Passphrase('a ab abc abd abf abj'))->getNumberOfValidAnagramChecks()->shouldReturn(2);
        $this->add(new Passphrase('iiii oiii ooii oooi oooo'))->getNumberOfValidAnagramChecks()->shouldReturn(3);
        $this->add(new Passphrase('oiii ioii iioi iiio'))->getNumberOfValidAnagramChecks()->shouldReturn(3);
    }
}
