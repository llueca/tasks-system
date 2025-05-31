<?php

namespace App\Tasks\Domain\Repositories;

use App\Tasks\Domain\Entities\Task;

interface TasksRepository
{
    public function create(Task $task): void;
}
