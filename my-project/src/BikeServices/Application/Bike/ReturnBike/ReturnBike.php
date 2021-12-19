<?php

declare(strict_types = 1);

namespace App\BikeServices\Application\Bike\ReturnBike;

use App\BikeServices\Domain\ListBike\BikeRepository;

class ReturnBike
{
    private $repository;

    public function __construct(BikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $data): string
    {
        $rent = $this->repository->return($data);

        if (null === $rent) {
            throw new \Exception('No bikes.');
        }

        return $rent;
    }


}