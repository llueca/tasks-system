<?php

namespace App\Tasks\Infrastructure\Repositories;

use App\Tasks\Domain\Entities\Task;
use App\Tasks\Domain\ValueObjects\TaskId;

class TasksRepository implements \App\Tasks\Domain\Repositories\TasksRepository
{
    public function create(Task $task): void
    {

    }

    public function get(TaskId $id): Task
    {

    }
}
