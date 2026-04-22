<?php

session_start();
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/constants.php';
require_once __DIR__ . '/../includes/IdObjec.php';
require_once __DIR__ . '/../classes/User.php';

$user = null;
if (isset($_SESSION['user_id'])) {
    // dummy data me vone zv me db
    foreach ($USERS as $u) {
        if ($u['id'] == $_SESSION['user_id']) {
            $user = new User($u['id'], $u['email'], $u['role']);
            break;
        }
    }
}
?>




<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Campus Lost & Found</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <main>
        <h1>Campus Lost & Found</h1>

        <?php if ($user): ?>
            <p>Miresevini, <strong><?= $user->getEmail() ?></strong> (<?= $user->getRole() ?>)</p>

            <p>
                <a href="lost.php">Shiko elemente te humbura</a> |
                <a href="found.php">Shiko elemente te gjetura</a> |
                <?php if ($user->isStudent()): ?>
                    <a href="report.php">Raporto item te humbur</a>
                <?php endif; ?>
            </p>
        <?php else: ?>
            <p>Logohuni që të raportoni apo kërkoni elemente.</p>
            <a href="login.php">Login</a>
        <?php endif; ?>

        <?php if (isset($_COOKIE['last_login'])): ?>
            <p><small>U loguat së fundi në: <?= $_COOKIE['last_login'] ?></small></p>
        <?php endif; ?>
    </main>

    <?php include "../includes/footer.php"; ?>
</body>
</html>
