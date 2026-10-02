<?= view('templates/header', ['title' => $title]) ?>
<h1><?= esc($title) ?></h1>
<form method="post" action="<?= $customer ? '/customers/' . esc($customer['id']) . '/update' : '/customers' ?>">
    <?= csrf_field() ?>
    <p>
        <label>full name<br><input type="text" name="full_name" value="<?= esc((service('request')->getPost('full_name') ?? ($customer['full_name'] ?? ''))) ?>"></label><br>
        <?= esc($errors['full_name'] ?? '') ?>
    </p>
    <p>
        <label>email<br><input type="email" name="email" value="<?= esc((service('request')->getPost('email') ?? ($customer['email'] ?? ''))) ?>"></label><br>
        <?= esc($errors['email'] ?? '') ?>
    </p>
    <button type="submit">save</button>
</form>
<p><a href="/customers">back</a></p>
<?= view('templates/footer') ?>
