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
