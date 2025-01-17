<?php
require_once __DIR__ . '/../config/config.php';

function renderNavbar() {
    ?>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="<?php echo HOME_URL; ?>" class="navbar-brand">
                <i class="fas fa-tv"></i> <?php echo SITE_TITLE; ?>
            </a>
            <button class="navbar-toggle" id="navbar-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-menu" id="navbar-menu">
                <li class="navbar-item"><a href="<?php echo LOGIN_URL; ?>"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li class="navbar-item"><a href="<?php echo REGISTER_URL; ?>"><i class="fas fa-user-plus"></i> Register</a></li>
            </ul>
        </div>
    </nav>
    <?php
}
?> 