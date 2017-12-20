<?php

namespace Advent\Day3;

class Coordinate
{
    private $x;
    private $y;

    public function __construct(int $x = 0, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() : int { return $this->x; }
    public function getY() : int { return $this->y; }

    public function getDifference(Coordinate $coord) : Coordinate {
        return new Coordinate($this->diffX($coord), $this->diffY($coord));
    }

    public function getDistance(Coordinate $coord) : int {
        return abs($this->diffX($coord) + $this->diffY($coord));
    }

    private function diffX(Coordinate $coord) : int {
        return $coord->getX() - $this->getX();
    }

    private function diffY(Coordinate $coord) : int {
        return $coord->getY() - $this->getY();
    }

    public function move(int $x, int $y) : Coordinate {
        return new Coordinate($this->x + $x, $this->y + $y);
    }
}
