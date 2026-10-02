<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    public function getTasksForToday(): array
    {
        return $this->where('task_date', date('Y-m-d'))
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    public function getAllTasks(): array
    {
        return $this->orderBy('task_date', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();
    }
}
