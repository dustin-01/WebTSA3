<?= view('templates/header', ['title' => $title]) ?>

<h1>tasks for today</h1>

<?php if ($tasks === []): ?>
    <p>no tasks for today</p>
<?php else: ?>
    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>task</th>
                <th>status</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

<?= view('templates/footer') ?>
