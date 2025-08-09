<?php
namespace App\Controllers;

use App\Models\Categories;
use App\Helpers\Render; 
use App\Helpers\Flash;
use App\Helpers\Redirect;

class CategoryController
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
        $data['categories'] = $this->Categories->all();
        return Render::view('categories/index',$data);
    }
 
    public function create()
    { 
        $data = [];
        return Render::view('categories/create', $data);
    }

    public function edit(int $id)
    { 
        $data = (array) $this->Categories->find($id);
        return Render::view('categories/edit', $data);
    }

    public function store()
    {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = $_POST['image'] ?? '';
        $status = $_POST['status'] ?? ''; 

        if(isset($_FILES['image'])){
            $file = $_FILES['image'];
            $newFileUrl = $this->uploadDir .  $file['name'];
            $result = move_uploaded_file($file['tmp_name'], $newFileUrl);
            $image = $newFileUrl;
        } 

        $result = $this->Categories->create($title, 
            $description, 
            $image, 
            $status);

        if($result){
            Flash::setFlash('success', 'Category Created Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('categories');
    }

    public function update(int $id)
    {
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? ''; 
        $status = $_POST['status'] ?? ''; 
        $image = $_POST['image'] ?? ''; 

        if(isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $newFileUrl = $this->uploadDir .  $file['name'];
            $result = move_uploaded_file($file['tmp_name'], $newFileUrl);
            $image = $newFileUrl;
        } 

        $result = $this->Categories->update($id, 
            $title,
            $description,
            $image,
            $status);

        if($result){
            Flash::setFlash('success', 'Category Updated Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('categories');
    }

    public function destroy(int $id)
    {
        $result = $this->Categories->delete($id);

        if($result){
            Flash::setFlash('success', 'Category Deleted Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('categories');
    }
     
}
