<?php

namespace App\BikeServices\Domain\ListBike;

interface BikeRepository
{
    public function list(): ?array;

    public function rent(array $data): ?string;

    public function return(array $data): ?string;
}