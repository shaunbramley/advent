<?php

namespace Advent\Day4;

class Puzzle2
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
    
        echo 'Valid passphrase count: ' . $system->getNumberOfValidAnagramChecks() . PHP_EOL;
    }
}
