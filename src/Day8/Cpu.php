<?php

namespace Advent\Day8;

class Cpu
{
    private $registers;
    private $highestValue;

    public function __construct() {
        $this->registers = [];
        $this->highestValue = 0;

        $this->operators = [
            '<' => 'isLessThan',
            '>' => 'isGreaterThan',
            '>=' => 'isGreaterThanOrEqual',
            '<=' => 'isLessThanOrEqual',
            '==' => 'isEqual',
            '!=' => 'isNotEqual',
        ];
    }

    public function process(Instruction $instruction) {

        if($this->comparison($instruction)) {

            // comparison was true.  perform an action.
            $this->action($instruction);

            if ($this->getLargestValueInAnyRegister() > $this->highestValue) {
                $this->highestValue = $this->getLargestValueInAnyRegister();
            }
        }
    }

    private function action(Instruction $instruction) {
        if (!$this->doesRegisterExist($instruction->getActionOperands()[0])) {
            $this->addNewRegister($instruction->getActionOperands()[0]);
        }

        $a = $this->registers[$instruction->getActionOperands()[0]];
        $b = $instruction->getActionOperands()[1];

        $method = $instruction->getActionOperator();

        $a->$method($b);

    }


    private function comparison(Instruction $instruction) {
        // if the register being used does not exist create it.
        if (!$this->doesRegisterExist($instruction->getComparisonOperands()[0])) {
            $this->addNewRegister($instruction->getComparisonOperands()[0]);
        }

        $a = $this->registers[$instruction->getComparisonOperands()[0]];
        $b = $instruction->getComparisonOperands()[1];
        $method = $this->operators[$instruction->getComparisonOperator()];

        return $a->$method($b);
    }

    private function addNewRegister($register) {
        $this->registers[$register] = new Register();
        //print_r($this->registers);
    }

    private function doesRegisterExist($register) : bool {
        return array_key_exists($register, $this->registers);
    }

    public function getLargestValueInAnyRegister() : int
    {
        $arr = [];
        array_walk($this->registers, function(Register $register) use (&$arr) {
            $arr[] = $register->getValue();
        });

        return max($arr);
    }

    public function getLargestValueEncountered() : int {
        return $this->highestValue;
    }
}
