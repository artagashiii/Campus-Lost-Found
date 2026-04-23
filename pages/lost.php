<?php

session_start();

require_once __DIR__ . '/../classes/constants.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Item.php';

$user = null;

if (isset($_SESSION['user_id'])) {
    foreach ($USERS as $u) {
        if ($u['id'] == $_SESSION['user_id']) {
            $user = new User($u['id'], $u['email'], $u['role']);
            break;
        }
    }
}

$lostItems = [];

foreach ($ITEMS as $item) {
    if ($item['status'] === 'lost') {
        $lostItems[] = $item;
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Elemente të humbura</title>


    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main>
        <h1>Elemente të humbura</h1>

        <?php if (!$user): ?>
            <p>Logohuni që të shikoni listën e elementeve të humbura.</p>
            <a href="login.php">Login</a>

        <?php elseif (empty($lostItems)): ?>
            <p>Nuk ka elemente të humbura të regjistruara në sistem.</p>

        <?php else: ?>
            <ul>
                <?php foreach ($lostItems as $item): ?>
                    <li>
                        <strong><?= $item['title'] ?></strong>
                        <p><?= $item['description'] ?></p>
                        <small>Lokacioni: <?= $item['location'] ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <p>
            <a href="../index.php">Kthehu në faqen kryesore</a>
        </p>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>