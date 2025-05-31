<?php

namespace App\Tasks\Application\UseCases;

use App\Tasks\Domain\Entities\Task;
use App\Tasks\Domain\Repositories\TasksRepository;

readonly class CreateTask
{
    public function __construct(private TasksRepository $repository) {}
    public function __invoke(Task $task): void
    {
        $this->repository->create($task);
    }
}
