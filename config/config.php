<?php
// Site Configuration
define('SITE_TITLE', 'JellyFin');
define('WELCOME_MESSAGE', 'Welcome to <strong>' . SITE_TITLE . '</strong>');

// API Configuration
define('JELLYFIN_HOST', 'tv.yourdomain.com');
define('JELLYFIN_API_KEY', 'your-api-key');

// URLs
define('LOGIN_URL', 'tv.yourdomain.com');
define('REGISTER_URL', 'register.php');
define('HOME_URL', 'index.php');

// API Endpoints
define('API_USER_CREATE', JELLYFIN_HOST . '/Users/New');
define('API_USER_LOGIN', JELLYFIN_HOST . '/Users/AuthenticateByName');

// Messages
define('MSG_REGISTER_SUCCESS', 'Registration successful! You can now log in to Jellyfin.');
define('MSG_REGISTER_ERROR', 'Registration failed. Please try again.');
define('MSG_USERNAME_LENGTH', 'Username must be at least 3 characters long.');
define('MSG_PASSWORD_LENGTH', 'Password must be at least 6 characters long.');

// Validation
define('MIN_USERNAME_LENGTH', 3);
define('MIN_PASSWORD_LENGTH', 6);
?> 