<?= view('templates/header', ['title' => $title]) ?>

<h1>profile</h1>

<?php if ($user === null): ?>
    <p>no user found</p>
<?php else: ?>
    <p>username: <?= esc($user['username']) ?></p>
    <p>full name: <?= esc($user['full_name']) ?></p>
    <p>email: <?= esc($user['email']) ?></p>
    <p>joined: <?= esc($user['created_at']) ?></p>
<?php endif ?>

<?= view('templates/footer') ?>
