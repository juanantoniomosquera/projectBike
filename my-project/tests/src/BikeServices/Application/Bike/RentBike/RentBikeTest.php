<?php

namespace App\Tests\src\BikeServices\Application\Bike\RentBike;

use App\BikeServices\Application\Bike\RentBike\RentBike;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RentBikeTest extends KernelTestCase
{
    private $rentBike;

    public function setUp(): void
    {
        self::bootKernel();

        $this->rentBike = new RentBike(self::$container->get('App\BikeServices\Domain\ListBike\BikeRepository'));
    }

    public function testRentBike(): void
    {
        //TODO testear que obtengo un http 200
        $this->assertIsArray(
            $this->rentBike->__invoke()
        );
    }
}