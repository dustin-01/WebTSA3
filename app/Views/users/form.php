<?= view('templates/header', ['title' => $title]) ?>
<h1><?= esc($title) ?></h1>
<form method="post" enctype="multipart/form-data" action="<?= $user ? '/users/' . esc($user['id']) . '/update' : '/users' ?>">
    <?= csrf_field() ?>
    <p>
        <label>username<br><input type="text" name="username" value="<?= esc((service('request')->getPost('username') ?? ($user['username'] ?? ''))) ?>"></label><br>
        <?= esc($errors['username'] ?? '') ?>
    </p>
    <p>
        <label>full name<br><input type="text" name="full_name" value="<?= esc((service('request')->getPost('full_name') ?? ($user['full_name'] ?? ''))) ?>"></label><br>
        <?= esc($errors['full_name'] ?? '') ?>
    </p>
    <p>
        <label>email<br><input type="email" name="email" value="<?= esc((service('request')->getPost('email') ?? ($user['email'] ?? ''))) ?>"></label><br>
        <?= esc($errors['email'] ?? '') ?>
    </p>
    <?php if ($user): ?>
    <p>
        <label>avatar (JPG or PNG, up to 2MB)<br><input type="file" name="avatar" accept="image/jpeg,image/png"></label><br>
        <?= esc($errors['avatar'] ?? '') ?>
    </p>
    <?php endif ?>
    <button type="submit">save</button>
</form>
<p><a href="/users">back</a></p>
<?= view('templates/footer') ?>
