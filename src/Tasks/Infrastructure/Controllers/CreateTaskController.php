<?php

declare(strict_types=1);

namespace App\Tasks\Infrastructure\Controllers;

use App\Tasks\Application\UseCases\CreateTask;
use App\Tasks\Domain\Entities\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateTaskController extends AbstractController
{
    public function __construct(CreateTask $createTask)
    {
    }

    public function createTask(Task $task): void
    {
        $this->createTask($task);
    }

    public function index(): JsonResponse {
        return $this->json(['success' => true]);
    }
}
