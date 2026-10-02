<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        return view('home', [
            'title' => 'tasks for today',
            'tasks' => $taskModel->getTasksForToday(),
        ]);
    }
}
