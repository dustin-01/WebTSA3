<?= view('templates/header', ['title' => $title]) ?>
<h1>customers</h1>
<p><a href="/customers/new">new customer</a></p>
<table border="1" cellpadding="6">
    <tr><th>name</th><th>email</th><th></th></tr>
    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= esc($customer['full_name']) ?></td>
        <td><?= esc($customer['email']) ?></td>
        <td><a href="/customers/<?= esc($customer['id']) ?>/edit">edit</a></td>
    </tr>
    <?php endforeach ?>
</table>
<?= view('templates/footer') ?>
