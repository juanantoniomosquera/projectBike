<?php

namespace App\BikeServices\Application\Bike\ListBike;

use App\BikeServices\Domain\ListBike\BikeRepository;

final class ListBike
{
    private $repository;

    public function __construct(BikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        $bikes = $this->repository->list();

        if (null === $bikes) {
            throw new \Exception('No bikes.');
        }

        return $bikes;
    }
}