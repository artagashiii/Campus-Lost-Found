<?php
session_start();

require_once __DIR__ . '/../classes/constants.php';

$error = '';

function isValidEmail($email) {
return preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email);
}

function isValidPassword($password) {
return preg_match('/^.{6,}$/', $password);
}

if (!isset($_SESSION['registered_users'])) {
$_SESSION['registered_users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm = trim($_POST['confirm_password'] ?? '');

if (!isValidEmail($email)) {
$error = 'Email i pavlefshëm.';
} elseif (!isValidPassword($password)) {
$error = 'Password duhet të ketë së paku 6 karaktere.';
} elseif ($password !== $confirm) {
$error = 'Password-at nuk përputhen.';
} else {

$exists = false;

foreach ($USERS as $user) {
if (strtolower($user['email']) === strtolower($email)) {
$exists = true;
break;
}
}

foreach ($_SESSION['registered_users'] as $user) {
if (strtolower($user['email']) === strtolower($email)) {
$exists = true;
break;
}
}

if ($exists) {
$error = 'Ky email ekziston tashmë.';
} else {

$newUser = [
'id' => count($USERS) + count($_SESSION['registered_users']) + 1,
'email' => $email,
'password' => $password, 
'role' => 'student'
];

$_SESSION['registered_users'][] = $newUser;

$_SESSION['user_id'] = $newUser['id'];
$_SESSION['user_email'] = $newUser['email'];
$_SESSION['user_role'] = $newUser['role'];

header('Location: ../index.php');
exit;
}
}
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Register | Campus Lost & Found</title>
<link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="auth-container">

<div class="auth-box">

<h1>Register</h1>

<?php if ($error): ?>
<div class="error-box">
<?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<form method="post" class="auth-form">

<label>Email</label>
<input type="email" name="email" required
value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

<label>Password</label>
<input type="password" name="password" required>

<label>Confirm Password</label>
<input type="password" name="confirm_password" required>

<button type="submit">Sign Up</button>

</form>

<p class="auth-links">
Keni account?
<a href="login.php">Login</a>
</p>

<p class="back-home">
<a href="../index.php">Kthehu në faqen kryesore</a>
</p>

</div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>