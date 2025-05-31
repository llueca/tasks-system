<?php

namespace App\Users\Infrastructure\Controllers;

use App\Users\Application\UseCases\RegisterUser;
use App\Users\Domain\Entities\User;
use App\Users\Infrastructure\Requests\RegisterUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use App\Security\EmailVerifier;

class RegisterUserController extends AbstractController
{
    public function __construct(private readonly RegisterUser $registerUser, EmailVerifier $emailVerifier)
    {
    }

    public function register(string $id, #[MapRequestPayload] RegisterUserRequest $request): Response {
        $user = User::create($id, $request->firstName, $request->lastName, $request->email );
        ($this->registerUser)($user, $request->password);

        return new Response(status: Response::HTTP_NO_CONTENT);
    }
}
