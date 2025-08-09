<?php
namespace App\Helpers;

class Render
{
    public static function view(string $view, array $data = [])
    { 
        extract($data);
        require_once __DIR__ . "/../Views/{$view}.php";
    }
}
