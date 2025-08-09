<?php
namespace App\Helpers;

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
Class Flash 
{

    public static function setFlash(string $type, string $message): void
    {
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * Display flash message and remove it from session
     */
    public static function showFlash(): void
    {
        if (!empty($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $type => $message) {
                $class = $type === 'success' ? 'flash-success' : 'flash-error';
                echo "<div class='{$class}'>" . htmlspecialchars($message) . "</div>";
            }
            unset($_SESSION['flash']);
        }
    }

}
