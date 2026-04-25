<?php

session_start();

require_once __DIR__ . '/classes/constants.php';
require_once __DIR__ . '/classes/User.php';

$user = null;

if (isset($_SESSION['user_id'])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Lost & Found | Gjej dhe Raporto Sendet</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<?php include __DIR__ . "/includes/header.php"; ?>

<main class="hero">

    <div class="hero-content">
        <h1>Campus Lost & Found</h1>

        <p class="hero-subtitle">
            Gjej ose raporto sendet e humbura në kampus në mënyrë të shpejtë dhe të lehtë.
        </p>

        <?php if (!empty($user)): ?>
            <p class="welcome">
                Mirësevini, 
                <strong><?= htmlspecialchars($user->getEmail()) ?></strong>
            </p>

            <div class="hero-buttons">
                <a href="pages/lost.php" class="btn primary">Shiko të humburat</a>
                <a href="pages/found.php" class="btn secondary">Shiko të gjeturat</a>

                <?php if ($user->isStudent()): ?>
                    <a href="pages/report.php" class="btn accent">Raporto item</a>
                <?php endif; ?>
                <a href="pages/logout.php" class="btn danger" onclick="return confirm('A jeni të sigurt që doni të dilni?')"> Dil </a>

            </div>

        <?php else: ?>
            <div class="hero-buttons">
                <a href="pages/login.php" class="btn primary">Login</a>
                <a href="pages/lost.php" class="btn secondary">Shiko items</a>
            </div>

        <?php endif; ?>
    
    </div>

</main>

<?php include __DIR__ . "/includes/footer.php"; ?>

</body>
</html>