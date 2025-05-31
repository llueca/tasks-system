<?php

namespace App\Users\Infrastructure\Requests;

use Symfony\Component\Validator\Constraints as Assert;

class RegisterUserRequest
{
    public function __construct(

        #[Assert\NotBlank]
        #[Assert\Email]
        public readonly ?string $email,

        #[Assert\NotBlank]
        #[Assert\Length(min: 12, max: 64)]
        public readonly ?string $password,


        #[Assert\NotBlank]
        #[Assert\Length(min: 3, max: 64)]
        public readonly string $firstName,


        #[Assert\NotBlank]
        #[Assert\Length(min: 3, max: 64)]
        public readonly string $lastName,
    )
    {
    }
}
