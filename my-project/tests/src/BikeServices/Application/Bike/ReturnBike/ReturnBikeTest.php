<?php

namespace App\Tests\src\BikeServices\Application\Bike\ReturnBike;

use App\BikeServices\Application\Bike\ReturnBike\ReturnBike;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ReturnBikeTest extends KernelTestCase
{
    private $returnBike;

    public function setUp(): void
    {
        self::bootKernel();

        $this->returnBike = new ReturnBike(self::$container->get('App\BikeServices\Domain\ListBike\BikeRepository'));
    }

    public function testRentBike(): void
    {
        //TODO testear que obtengo un http 200
        $this->assertIsArray(
            $this->returnBike->__invoke()
        );
    }
}