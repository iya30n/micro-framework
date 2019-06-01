<?php require 'app/views/partials/header.php' ?>
<?php require 'app/views/partials/nav.php' ?>
<h2>edit users</h2>
<form action="/user/update" method="POST">
    <input type="text" name="name" value="<?= $user->name ?>">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <button type="submit">update user</button>
</form>
<?php require 'app/views/partials/footer.php' ?>
