<?php

namespace App\Users\Domain\Repositories;

use App\Users\Domain\Entities\User;
use App\Users\Domain\ValueObjects\EmailAddress;
use App\Users\Domain\ValueObjects\UserId;

interface UserRepository
{
    public function create(User $User, string $password): void;

    public function getById(UserId $id): User;

    public function getByEmail(EmailAddress $emailAddress): User;
}
