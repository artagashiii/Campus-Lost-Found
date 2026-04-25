<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Definojmë rrënjën e projektit që të mos kemi probleme me linket
$base_url = "/Campus-Lost-Found"; 
?>

<header>
    <nav class="navbar" style="display: flex; justify-content: space-between; padding: 15px; background-color: #333; color: white; align-items: center;">
        <div class="logo">
            <a href="<?php echo $base_url; ?>/index.php" style="color: white; text-decoration: none; font-weight: bold; font-size: 1.2rem;">Campus L&F</a>
        </div>
        <ul style="display: flex; list-style: none; gap: 20px; margin: 0; padding: 0;">
            <li><a href="<?php echo $base_url; ?>/index.php" style="color: white; text-decoration: none;">Ballina</a></li>
            
            <li><a href="<?php echo $base_url; ?>/pages/lost.php" style="color: white; text-decoration: none;">Të humbura</a></li>
            <li><a href="<?php echo $base_url; ?>/pages/found.php" style="color: white; text-decoration: none;">Të gjetura</a></li>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="<?php echo $base_url; ?>/pages/report.php" style="color: white; text-decoration: none; background: #8e961e; padding: 5px 10px; border-radius: 4px;">Raporto</a></li>
                <li><a href="<?php echo $base_url; ?>/pages/logout.php" style="color: #ff4d4d; text-decoration: none; border: 1px solid #ff4d4d; padding: 5px 10px; border-radius: 4px;">Dil</a></li>
            <?php else: ?>
                <li><a href="<?php echo $base_url; ?>/pages/login.php" style="color: white; text-decoration: none; border: 1px solid white; padding: 5px 10px; border-radius: 4px;">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>