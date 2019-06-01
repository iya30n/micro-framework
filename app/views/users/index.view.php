<?php require 'app/views/partials/header.php' ?>
<?php require 'app/views/partials/nav.php' ?>
<h2>all users</h2>
<ul>
    <?php foreach($users as $user): ?>
    <li><?= $user->name ?>
        <a href="/user/edit?id=<?=$user->id?>">edit</a>
        <a href="/user/delete?id=<?=$user->id?>">X</a>
    </li>
    <?php endforeach ?>
</ul>
<br>
<form action="/user/add" method="POST">
    <input type="text" name="name">
    <button type="submit">add user</button>
</form>
<?php require 'app/views/partials/footer.php' ?>
