<?php
session_start();

require_once __DIR__ . '/../classes/constants.php';
require_once __DIR__ . '/../classes/User.php';

$error = '';

function isValidEmail($email) {
    return preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email);
}

function isValidPassword($password) {
    return preg_match('/^.{6,}$/', $password);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!isValidEmail($email)) {
        $error = 'Email i pavlefshëm.';
    } elseif (!isValidPassword($password)) {
        $error = 'Password duhet të ketë së paku 6 karaktere.';
    } else {

        $foundUser = null;

        if (!isset($_SESSION['registered_users'])) {
    $_SESSION['registered_users'] = [];
}

$allUsers = array_merge($USERS, $_SESSION['registered_users']);
        $allUsers = array_merge($USERS, $_SESSION['registered_users']);
        foreach ($allUsers as $userData) {
           if (strtolower($userData['email']) === strtolower($email)) {

            if (password_verify($password, $userData['password']) || $userData['password'] === $password ) 
            {
                $foundUser = $userData;
                break;
            }
            }
        }

        if ($foundUser) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $foundUser['id'];
            $_SESSION['user_email'] = $foundUser['email'];
            $_SESSION['user_role'] = $foundUser['role'];

            setcookie(
                'last_login',
                date('Y-m-d H:i:s'),
                time() + 60 * 60 * 24 * 30,
                '/'
            );

            header('Location: ../index.php');
            exit;

        } else {
            $error = 'Email ose password i gabuar.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Campus Lost & Found</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="auth-container">

    <div class="auth-box">

        <h1>Login</h1>

        <?php if ($error): ?>
            <div class="error-box">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post" class="auth-form">

            <label>Email</label>
            <input 
                type="email"
                name="email"
                required
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
            >

            <label>Password</label>
            <input 
                type="password"
                name="password"
                required
            >

            <button type="submit">Login</button>

        </form>

        <p class="auth-links">
            Nuk keni account?
            <a href="register.php">Regjistrohu</a>
        </p>

        <p class="back-home">
            <a href="../index.php">← Kthehu në faqen kryesore</a>
        </p>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>