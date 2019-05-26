<?php require 'views/partials/header.php' ?>
<?php require 'views/partials/nav.php' ?>
<h2>users</h2>
<ul>
    <?php foreach($users as $user): ?>
    <li><?= $user->name ?></li>
    <?php endforeach ?>
</ul>
<br>
<form action="/user/add" method="POST">
    <input type="text" name="name">
    <button type="submit">add user</button>
</form>
<?php require 'views/partials/footer.php' ?>
