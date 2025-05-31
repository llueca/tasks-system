<?php

namespace App\Users\Application\UseCases;

use App\Users\Domain\Entities\User;
use App\Users\Domain\Repositories\UserRepository;

readonly class RegisterUser
{
    public function __construct(private UserRepository $userRepository) {

    }

    public function __invoke(User $user, string $password): void {
        $this->userRepository->create($user, $password);
    }
}
