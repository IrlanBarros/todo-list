<?php
    require_once '../app/controllers/UserController.php';
    $User = new UserController;
    $users = $User->getAllUsers();
    $user_found = $User->getUserById(1);

    // var_dump($user_found);
?>

<h1>Listagem de usuários:</h1>
<ul>
    <?php foreach($users as $user): ?>
    <li><?= $user['nome'] . ', ' . $user['email']; ?></li>
    <?php endforeach; ?>
</ul>

<h2><?= $user_found[0]['nome']; ?></h2>