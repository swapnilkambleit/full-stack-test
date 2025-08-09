<?php
namespace App\Controllers;

use App\Models\Categories;
use App\Helpers\Render; 
use App\Helpers\Flash;
use App\Helpers\Redirect;

class HomeController
{
    private Categories $Categories;
    public $uploadDir;

    public function __construct()
    {
        $this->Categories = new Categories();
        $this->uploadDir = $GLOBALS['UPLOAD_DIR'];
    }

    public function index()
    { 
        return Render::view('home/index' );
    }
  
}
