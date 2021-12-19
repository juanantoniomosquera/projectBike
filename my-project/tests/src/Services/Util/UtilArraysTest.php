<?php

use PHPUnit\Framework\TestCase;
use App\Services\Util\UtilArrays;

class UtilArraysTestTest extends TestCase
{
    private $utilArrays;

    public function setUp(): void
    {
        $this->utilArrays = new UtilArrays();
    }

    public function testSortArrayByCriterion(): void
    {
        $array = [
            ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
        ];
        $sortCriterion = ['age' => 'DESC', 'scoring' => 'DESC'];

        $this->assertIsArray(
            $this->utilArrays->sortArrayByCriterion($array, $sortCriterion)
        );
    }
}