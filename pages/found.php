<?php
// /pages/found.php

session_start();
require_once __DIR__ . '/../includes/constants.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Item.php';

// header dhe navbar
include "../includes/header.php";

$user = null;
if (isset($_SESSION['user_id'])) {
    foreach ($USERS as $u) {
        if ($u['id'] == $_SESSION['user_id']) {
            $user = new User($u['id'], $u['email'], $u['role']);
            break;
        }
    }
}

// filtrim i elementeve të gjetura
$foundItems = [];
foreach ($ITEMS as $item) {
    if ($item['status'] === 'found') {
        $foundItems[] = $item;
    }
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Elemente të gjetura</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php include "../includes/header.php"; ?>

    <main>
        <h1>Elemente të gjetura</h1>

        <?php if (!$user): ?>
            <p>Logohuni që të shikoni listën e elementeve të gjetura.</p>
            <a href="login.php">Login</a>
        <?php elseif (empty($foundItems)): ?>
            <p>Nuk ka elemente të gjetura të regjistruara në sistem.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($foundItems as $item): ?>
                    <li>
                        <strong><?= $item['title'] ?></strong>
                        <p><?= $item['description'] ?></p>
                        <small>Lokacioni: <?= $item['location'] ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <p><a href="index.php">Kthehu në faqen kryesore</a></p>
    </main>

    <?php include "../includes/footer.php"; ?>
</body>
</html>