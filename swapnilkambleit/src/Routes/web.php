<?php
use App\Controllers\CategoryController;
use App\Controllers\PostController;
use App\Api\CategoryController as ApiCategoryController;
use App\Api\PostController as ApiPostController;
use App\Controllers\HomeController;

try {
    // Instantiate controllers
    $categories = new CategoryController();
    $posts = new PostController();
    
    $Apicategories = new ApiCategoryController();
    $Apiposts = new ApiPostController();

    $home = new HomeController();
    
    $sep = str_replace('public/index.php','', $_SERVER['PHP_SELF']);

    // Parse URI
    $thuri = explode($sep, $_SERVER['REQUEST_URI']); 
    
    $thuri = explode('/', $thuri[1] ?? '');

    if($thuri[0] == 'api') {
        $controller = 'api-'.$thuri[1] ?? '';
        $action     = $thuri[2] ?? '';
        $id         = $thuri[3] ?? ''; 
    } else {
        $controller = $thuri[0] ?? '';
        $action     = $thuri[1] ?? '';
        $id         = $thuri[2] ?? '';
    }

    switch ($controller) {

        case 'categories':
            match ($action) {
                ''         => $categories->index(),
                'show'     => $categories->show($id),
                'create'   => $categories->create(),
                'edit'     => $categories->edit((int)$id),
                'store'    => $categories->store(),
                'update'   => $categories->update((int)$id),
                'destroy'  => $categories->destroy((int)$id),
                default    => throw new Exception("Unknown action: {$action} in categories")
            };
            break;

        case 'posts':
            match ($action) {
                ''         => $posts->index(), 
                'create'   => $posts->create(),
                'edit'     => $posts->edit((int)$id),
                'store'    => $posts->store(),
                'update'   => $posts->update((int)$id),
                'destroy'  => $posts->destroy((int)$id),
                default    => throw new Exception("Unknown action: {$action} in posts")
            };
            break;

        case 'api-categories':
            match ($action) {
                ''         => $Apicategories->index(),
                'show'     => $Apicategories->show($id), 
                'store'    => $Apicategories->store(['title' => 'Test title', 'description' =>  'Test description', 'image' => '', 'status' => 'Enable' ]),
                'update'   => $Apicategories->update((int)$id), ['title' => 'Test title', 'description' =>  'update description', 'image' => '', 'status' => 'Enable'],
                'destroy'  => $Apicategories->destroy((int)$id),
                default    => throw new Exception("Unknown action: {$action} in categories")
            };
            break;

        case 'api-posts':
            match ($action) {
                ''         => $Apiposts->index(),  
                'show'     => $Apiposts->show($id), 
                'store'    => $Apiposts->store(['title' => 'Test title', 'description' =>  'Test description', 'image' => '', 'status' => 'Enable', 'category_id' => '1']),
                'update'   => $Apiposts->update((int)$id, ['title' => 'Test title', 'description' =>  'update description', 'image' => '', 'status' => 'Enable', 'category_id' => '2']),
                'destroy'  => $Apiposts->destroy((int)$id),
                default    => throw new Exception("Unknown action: {$action} in posts")
            };
            break;

        case '':
        case '/':
           $home->index();
            break;

        default:
            throw new Exception("Unknown controller: {$controller}");
    }

} catch (\Throwable $e) {

    // Log the error (optional)
    error_log($e->getMessage());

    // Send JSON error response
    http_response_code(500); 
    
    echo($e->getMessage());

}
