<?php
session_start();
require_once 'components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jellyfin Home Hub</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php renderNavbar(); ?>

    <main class="main-wrapper">
        <div class="container">
            <h2 class="welcome-title"><?php echo WELCOME_MESSAGE; ?></h2>
        </div>
    </main>

    <script src="components/navbar.js"></script>
</body>
</html>
