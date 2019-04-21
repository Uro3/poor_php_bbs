<?php

function checkSession(bool $requireAuth) {
    session_start();
    $isLoggind = isset($_SESSION['userId']);
    if ($requireAuth && !$isLoggind) {
        header('Location: /signup');
    } else if (!$requireAuth && $isLoggind) {
        header('Location: /');
    }
}

function closeSession() {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 3600);
    session_destroy();
    header('Location: /signup');
}
