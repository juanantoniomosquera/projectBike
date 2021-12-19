<?php

declare(strict_types = 1);

namespace App\BikeServices\Infrastructure\Persistence;

interface Persistence
{
    public function list(): array;
}