<?php
namespace App\Helpers;

class Response
{
    public static function json($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
