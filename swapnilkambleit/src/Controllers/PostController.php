<?php
namespace App\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Helpers\Render; 
use App\Helpers\Flash;
use App\Helpers\Redirect;

class PostController
{
    private Posts $Posts;
    private Categories $Categories;
    public $uploadDir;

    public function __construct()
    {
        $this->Posts = new Posts();
        $this->Categories = new Categories();
        $this->uploadDir = $GLOBALS['UPLOAD_DIR'];
    }

    public function index()
    {
        $data['posts'] = $this->Posts->all();
        return Render::view('posts/index',$data);
    }
 
    public function create()
    { 
        $data = [];
        $data['categories'] = $this->Categories->all();
        return Render::view('posts/create', $data);
    }

    public function edit(int $id)
    { 
        $data = (array) $this->Posts->find($id);
        $data['categories'] = $this->Categories->all();
        return Render::view('posts/edit', $data);
    }

    public function store()
    {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $category_id = $_POST['category_id'] ?? '';
        $image = $_POST['image'] ?? '';
        $status = $_POST['status'] ?? ''; 

        if(isset($_FILES['image'])){
            $file = $_FILES['image'];
            $newFileUrl = $this->uploadDir .  $file['name'];
            $result = move_uploaded_file($file['tmp_name'], $newFileUrl);
            $image = $newFileUrl;
        } 

        $result = $this->Posts->create($category_id, 
            $title,
            $description, 
            $image, 
            $status);

        if($result){
            Flash::setFlash('success', 'Post Created Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('posts');
    }

    public function update(int $id)
    {
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? ''; 
        $category_id = $_POST['category_id'] ?? '';
        $status = $_POST['status'] ?? ''; 
        $image = $_POST['image'] ?? ''; 

        if(isset($_FILES['image'])) {
            $file = $_FILES['image'];
            $newFileUrl = $this->uploadDir .  $file['name'];
            $result = move_uploaded_file($file['tmp_name'], $newFileUrl);
            $image = $newFileUrl;
        } 

        $result = $this->Posts->update($id, 
            $category_id,
            $title,
            $description,
            $image,
            $status);

        if($result){
            Flash::setFlash('success', 'Post Updated Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('posts');
    }

    public function destroy(int $id)
    {
        $result = $this->Posts->delete($id);

        if($result){
            Flash::setFlash('success', 'Post Deleted Successfully!');
        } else {
            Flash::setFlash('error', 'Something went wrong, pease try again');
        }

        return Redirect::url('posts');
    }
     
}
