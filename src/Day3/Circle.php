<?php

namespace Advent\Day3;

class Circle
{
    private $layer = 0;
    private $numberFirstInLayer = 0;
    private $numberOfNumbersInLayer = 0;

    public function findCoordinateOfNumber(int $number) : Coordinate {
        $layer = $this->calculateNumberOfLayers($number);

        $numberOnASide = $this->getNumbersOnSideOfLayer($layer);

        $numberDifference = $number - $this->numberFirstInLayer;

        $coordinate = $this->getCoordinateOfFirstNumberInLayer($layer);

        if (($numberDifference > 0) && ($numberDifference < ($numberOnASide))) {
            return $coordinate->move(0, $numberDifference);
        }
        if (($numberDifference > 0) && ($numberDifference < ($numberOnASide * 2))) {
            return $coordinate->move( -($numberDifference % $numberOnASide) -1, $numberOnASide - 1);
        }
        if (($numberDifference > 0) && ($numberDifference < ($numberOnASide * 3))) {
            return $coordinate->move(-$numberOnASide, ($numberOnASide - 1) - (($numberDifference % $numberOnASide) + 1));
        }
        if (($numberDifference > 0) && ($numberDifference < ($numberOnASide * 4))) {
            return $coordinate->move((-$numberOnASide + ($numberDifference % $numberOnASide) + 1), -1);
        }
        return $coordinate;
    }

    private function getNumbersOnSideOfLayer(int $layer) : int {
        if (0 === $layer) {
            return 0;
        }
        return (8 * $layer) / 4;
    }

    private function calculateNumberOfLayers(int $number) : int {
        $this->layer = 0;
        $this->numberFirstInLayer = 1;
        $this->numberOfNumbersInLayer = 1;
        if($number > 1) {
            do {
                ++$this->layer;
                $this->numberFirstInLayer += $this->numberOfNumbersInLayer;
                $this->numberOfNumbersInLayer = 8 * $this->layer;
            } while (($this->numberFirstInLayer + $this->numberOfNumbersInLayer) <= $number );
        }
        return $this->layer;
    }

    private function getCoordinateOfFirstNumberInLayer(int $layer) : Coordinate {
        if ($layer === 0 ) {
            return new Coordinate(0,0);
        }
        return new Coordinate($layer, (-$layer + 1));
    }
}
