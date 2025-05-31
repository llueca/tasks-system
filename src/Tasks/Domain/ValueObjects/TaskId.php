<?php

namespace App\Tasks\Domain\ValueObjects;

class TaskId
{
    private function __construct(public readonly string $id) {}
    public static function fromString(string $id): self {
        return new self($id);
    }
}
