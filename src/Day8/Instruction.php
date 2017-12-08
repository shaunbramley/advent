<?php

namespace Advent\Day8;

class Instruction
{
    private $instruction;

    public function __construct(string $instruction)
    {
        $this->instruction = $instruction;
    }

    public function __toString() : string {
        return $this->instruction;
    }

    public function getComparison() : string
    {
        return explode(' if ', $this->instruction)[1];
    }

    public function getComparisonOperator() : string {
        return explode(' ', $this->getComparison())[1];
    }

    public function getComparisonOperands() : array {
        return [
            explode(' ', $this->getComparison())[0],
            (int) explode(' ', $this->getComparison())[2]
        ];
    }

    public function getAction() : string
    {
        return explode(' if ', $this->instruction)[0];
    }

    public function getActionOperator() : string {
        return explode(' ', $this->getAction())[1];
    }

    public function getActionOperands() : array {
        return [
            explode(' ', $this->getAction())[0],
            (int) explode(' ', $this->getAction())[2]
        ];
    }

}
