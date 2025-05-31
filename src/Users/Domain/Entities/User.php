<?php

namespace App\Users\Domain\Entities;

use App\Users\Domain\ValueObjects\EmailAddress;
use App\Users\Domain\ValueObjects\UserId;

readonly class User
{
    private function __construct(
        public UserId       $id,
        public string       $firstName,
        public string       $lastName,
        public EmailAddress $email
    )
    {
    }

    public static function create(string $id, string $firstName, string $lastName, string $emailAddress, ): static {
        return new self(UserId::fromString($id), $firstName, $lastName, EmailAddress::fromString($emailAddress));
    }
}
