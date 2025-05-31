<?php

namespace App\Tasks\Domain\Entities;

use App\Tasks\Domain\ValueObjects\TaskId;
use DateTimeImmutable;

class Task
{
    public function __construct(
        public readonly TaskId $id,
        public readonly string $name,
        public readonly DateTimeImmutable $createdAt,
        public readonly DateTimeImmutable $updatedAt
    )
    {
    }
}
