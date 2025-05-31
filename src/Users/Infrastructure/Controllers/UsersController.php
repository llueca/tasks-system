<?php

namespace App\Users\Infrastructure\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UsersController extends AbstractController
{

    public function index(): JsonResponse
    {
        return $this->json([
            'hello' => 'world',
        ]);
    }

    public function register(): void
    {

    }
}
