<?php
namespace App\Helpers;

class View
{
    public static function set(string $view, array $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../Views/{$view}.php";
    }
}
