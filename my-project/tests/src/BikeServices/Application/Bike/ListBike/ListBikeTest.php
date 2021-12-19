<?php

namespace App\Tests\src\BikeServices\Application\Bike\ListBike;

use App\BikeServices\Application\Bike\ListBike\ListBike;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ListBikeTest extends KernelTestCase
{
    private $listBike;

    public function setUp(): void
    {
        self::bootKernel();

        $this->listBike = new ListBike(self::$container->get('App\BikeServices\Domain\ListBike\BikeRepository'));
    }

    public function testListBike(): void
    {
        $this->assertIsArray(
            $this->listBike->__invoke()
        );
    }
}