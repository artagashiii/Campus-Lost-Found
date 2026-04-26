<?php

if (!isset($base_url)) {
    $base_url = "/Campus-Lost-Found";
}
?>

<footer style="background-color: #333; color: white; padding: 40px 20px; font-family: sans-serif; margin-top: 50px;">
    <div style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 30px;">
        
        <div style="flex: 1; min-width: 250px;">
            <h3 style="color: #a2bb26; margin-bottom: 15px;">Campus Lost & Found</h3>
            <p style="font-size: 0.9rem; line-height: 1.6; color: #ccc;">
                Platforma zyrtare për menaxhimin e sendeve të humbura në kampus. 
                Ndihmoni komunitetin duke raportuar çdo send që gjeni.
            </p>
        </div>

        <div style="flex: 1; min-width: 150px;">
            <h4 style="color: #a2bb26; margin-bottom: 15px;">Linqe të shpejta</h4>
            <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem;">
                <li style="margin-bottom: 8px;"><a href="<?php echo $base_url; ?>/index.php" style="color: #ddd; text-decoration: none;">Ballina</a></li>
                <li style="margin-bottom: 8px;"><a href="<?php echo $base_url; ?>/pages/lost.php" style="color: #ddd; text-decoration: none;">Të humbura</a></li>
                <li style="margin-bottom: 8px;"><a href="<?php echo $base_url; ?>/pages/found.php" style="color: #ddd; text-decoration: none;">Të gjetura</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li style="margin-bottom: 8px;"><a href="<?php echo $base_url; ?>/pages/report.php" style="color: #ddd; text-decoration: none;">Raporto një send</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div style="flex: 1; min-width: 200px;">
            <h4 style="color: #a2bb26; margin-bottom: 15px;">Na kontaktoni</h4>
            <p style="font-size: 0.9rem; color: #ccc; margin: 5px 0;">📧 support@campus-lf.edu</p>
            <p style="font-size: 0.9rem; color: #ccc; margin: 5px 0;">📍 Zyra e Shërbimit Studentor</p>
            <p style="font-size: 0.9rem; color: #ccc; margin: 5px 0;">🕒 Hën - Pre: 08:00 - 16:00</p>
        </div>

    </div>

    <div style="text-align: center; border-top: 1px solid #444; margin-top: 30px; padding-top: 20px; font-size: 0.8rem; color: #888;">
        <p>&copy; <?php echo date("Y"); ?> Campus Lost & Found. Punuar me ❤️ për studentët.</p>
    </div>
</footer>
