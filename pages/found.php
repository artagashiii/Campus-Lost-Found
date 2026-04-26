<?php
session_start();
include_once __DIR__ . '/../includes/header.php';

require_once __DIR__ . '/../classes/constants.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Item.php';

$user = null;

if (isset($_SESSION['user_id'])) {
    $user = new User(
        $_SESSION['user_id'],
        $_SESSION['user_email'],
        $_SESSION['user_role']
    );
}

$foundItems = array_filter($ITEMS, function ($item) {
    return $item['status'] === 'found';
});
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Gjëra të Gjetura</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="bg-static">



<main class="container">

    <h1>Gjëra të Gjetura</h1>

    <?php if (empty($foundItems)): ?>
        <p>Nuk ka gjëra të gjetura aktualisht.</p>

    <?php else: ?>

        <div class="items-grid">

            <?php foreach ($foundItems as $item): ?>
                <div class="item-card">

                    <h3><?= htmlspecialchars($item['title']) ?></h3>

                    <p><?= htmlspecialchars($item['description']) ?></p>

                    <p>
                        <strong>Lokacioni:</strong>
                        <?= htmlspecialchars($item['location']) ?>
                    </p>

                    <?php if (!empty($item['date'])): ?>
                        <p>
                            <strong>Data:</strong>
                            <?= htmlspecialchars($item['date']) ?>
                        </p>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        </div>

    <?php endif; ?>

   <p class="back-home">
        <div class="hero-buttons">
        <a href="../index.php" class="btn accent">Kthehu në faqen kryesore</a>
        </div>
    </p>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>