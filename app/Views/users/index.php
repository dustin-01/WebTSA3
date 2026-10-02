<?= view('templates/header', ['title' => $title]) ?>
<h1>user accounts</h1>
<p><a href="/users/new">new user</a></p>
<table border="1" cellpadding="6">
    <tr><th>avatar</th><th>username</th><th>full name</th><th>email</th><th></th></tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><img src="<?= base_url($user['avatar'] ? 'uploads/' . rawurlencode($user['avatar']) : 'placeholder.svg') ?>" width="50" height="50" alt="avatar"></td>
        <td><?= esc($user['username']) ?></td>
        <td><?= esc($user['full_name']) ?></td>
        <td><?= esc($user['email']) ?></td>
        <td><a href="/users/<?= esc($user['id']) ?>/edit">edit</a></td>
    </tr>
    <?php endforeach ?>
</table>
<?= view('templates/footer') ?>
