<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use DateTimeImmutable;

class TaskSystemSeeder extends Seeder
{
    public function run()
    {
        $today = new DateTimeImmutable('today');
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->truncate();
        $this->db->table('users')->truncate();

        $this->db->table('tasks')->insertBatch([
            ['title' => 'check class announcements', 'status' => 'completed', 'task_date' => $today->modify('-1 day')->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'organize project files', 'status' => 'completed', 'task_date' => $today->modify('-1 day')->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'finish the homepage', 'status' => 'in progress', 'task_date' => $today->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'review the task list', 'status' => 'pending', 'task_date' => $today->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'test all pages', 'status' => 'pending', 'task_date' => $today->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'update the readme', 'status' => 'pending', 'task_date' => $today->modify('+1 day')->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'upload the project', 'status' => 'pending', 'task_date' => $today->modify('+1 day')->format('Y-m-d'), 'created_at' => $createdAt],
            ['title' => 'check the hosted site', 'status' => 'pending', 'task_date' => $today->modify('+1 day')->format('Y-m-d'), 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username' => 'dustin',
            'full_name' => 'Dustin',
            'email' => 'dustin@example.com',
            'created_at' => $createdAt,
        ]);
    }
}
