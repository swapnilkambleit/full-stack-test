<?php 
namespace App\Helpers;

class Redirect
{
    public static function url(string $url)
    {
        $newUrl = $GLOBALS['APP_URL'] . $url;
        if (!headers_sent()) {
            header("Location: {$newUrl}", true );
            exit;
        } else {
            echo "<script>window.location.href='" . htmlspecialchars($newUrl) . "';</script>";
            exit;
        }
    }
}
 