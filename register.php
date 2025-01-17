<?php
require_once 'config/config.php';
require_once 'components/navbar.php';

$errors = [];
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($username) < MIN_USERNAME_LENGTH) {
        $errors[] = MSG_USERNAME_LENGTH;
    }
    if (strlen($password) < MIN_PASSWORD_LENGTH) {
        $errors[] = MSG_PASSWORD_LENGTH;
    }

    if (empty($errors)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_USER_CREATE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $data = array(
            'Name' => $username,
            'Password' => $password
        );

        $headers = array(
            'X-MediaBrowser-Token: ' . JELLYFIN_API_KEY,
            'Content-Type: application/json'
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $message = MSG_REGISTER_SUCCESS;
        } else {
            $message = MSG_REGISTER_ERROR;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registracija - Jellyfin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php renderNavbar(); ?>

    <div class="main-wrapper">
        <div class="container">
            <div class="logo-container">
                <i class="fas fa-tv header-icon"></i>
            </div>
            <h2>Create New Account</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="message error">
                    <?php foreach($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($message)): ?>
                <div class="message <?php echo ($httpCode === 200) ? 'success' : 'error'; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="username" name="username" required 
                               minlength="3" placeholder="Enter username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" required 
                               minlength="6" placeholder="Enter password">
                    </div>
                </div>

                <button type="submit">
                    <i class="fas fa-user-plus"></i> Register
                </button>
            </form>
        </div>
    </div>

    <script src="components/navbar.js"></script>
</body>
</html> 