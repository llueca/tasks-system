<?php

namespace App\Users\Domain\ValueObjects;

class EmailAddress
{
    private function __construct(private string $email) {}

    public static function fromString(string $email): self {
        return new self($email);
    }

    public function __toString(): string {
        return $this->email;
    }
}
