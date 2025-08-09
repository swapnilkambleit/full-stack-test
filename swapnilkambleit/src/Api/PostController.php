<?php
namespace App\Api;
 
use App\Models\Posts;
use App\Helpers\Response;  

class PostController
{
    private Posts $posts;

    public function __construct()
    {
        $this->posts = new Posts(); 
    }

    public function index()
    { 
        return Response::json($this->posts->all());
    }
 
    public function show(int $id)
    {
        return Response::json($this->posts->find($id));
    }

    public function store(array $data)
    {
        $result = $this->posts->create($data['category_id'],
            $data['title'], 
            $data['description'],
            $data['image'],
            $data['status']);

        return Response::json(['created' => $result]);
    }

    public function update(int $id, array $data)
    { 
        $result = $this->posts->update($id, 
            $data['category_id'],
            $data['title'],
            $data['description'],
            $data['image'],
            $data['status']);
            
        return Response::json(['updated' => $result]);
    }

    public function destroy(int $id)
    {
        $result = $this->posts->delete($id);
        return Response::json(['deleted' => $result]);
    }
     
}
