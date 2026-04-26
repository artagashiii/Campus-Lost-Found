<?php
/* mungesa e databazes nuk na lejon
perdorimin e report.php sepse kam specifikuar qe duhet t'jete useri 
logged in per berjen e nje raporti */
session_start();
include __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../classes/Item.php';

// ky funksion dmth
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $status = $_POST['status'] ?? 'lost';

    if (!preg_match("/^[a-zA-Z\s]{3,30}$/", $title)) {
        $errors[] = "Titulli duhet të jetë vetëm shkronja (3-30 karaktere).";
    }

    if (!preg_match("/^[A-Z][a-zA-Z0-9\s]{2,50}$/", $location)) {
        $errors[] = "Lokacioni duhet të fillojë me shkronjë të madhe.";
    }

    if (empty($errors)) {
        $newReport = new ReportedItem(
            rand(100, 999), 
            $title, 
            $description, 
            $location, 
            $status, 
            $_SESSION['user_id']
        );

        // Mesazhi i suksesit (pasi nuk kemi databazë në Fazën I)
        $success = "Item '{$newReport->getTitle()}' u raportua me sukses!";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Raporto Item | Campus Lost & Found</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="auth-container">
        <div class="auth-box">
            <h1>Raporto Item</h1>

            <?php if ($success): ?>
                <div class="success-box" style="color: green; padding: 10px; border: 1px solid green;">
                    <?= htmlspecialchars($success) ?>
                </div>
                <p><a href="../index.php">Kthehu në fillim</a></p>
            <?php else: ?>

                <?php foreach ($errors as $error): ?>
                    <p class="error-box" style="color: red;"><?= $error ?></p>
                <?php endforeach; ?>

                <form method="POST" class="auth-form">
                    <label>Titulli i sendit:</label>
                    <input type="text" name="title" required>

                    <label>Lokacioni (p.sh. Laboratori 1):</label>
                    <input type="text" name="location" required>

                    <label>Përshkrimi:</label>
                    <textarea name="description" rows="4" required></textarea>

                    <label>Statusi:</label>
                    <select name="status">
                        <option value="lost">I humbur</option>
                        <option value="found">I gjetur</option>
                    </select>

                    <button type="submit">Dërgo Raportin</button>
                </form>
            <?php endif; ?>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
