<?php

namespace Advent\Day4;

use Advent\Day4\Passphrase;
use Advent\Day4\System;


class Puzzle1
{
    public function __invoke() {
    
        $system = new System();
    
        $input = file(__DIR__ . '/../../input/day_4.txt');
    
        foreach($input as $key => $value) {
            echo "Passphrase $key: " . $value . PHP_EOL;
            $phrase = new Passphrase(trim($value));
            echo "Passphrase $key is valid: " . $phrase->isValid() . PHP_EOL;
            
            $system->add($phrase);
        }
    
        echo 'Valid passphrase count: ' . $system->getNumberOfValidPassphrases() . PHP_EOL;
    }
}
