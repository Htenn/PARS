<?php
    session_start();

    if (!isset($_SESSION['session'])) {
        header('location: login.php');
    }
    elseif (isset($_GET['logout'])) {
        // Unset all of the session variables.
        unset($_SESSION['session']);
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        header('location: index.php');
    }
?>