<?php
namespace App\Api;

use App\Models\Categories; 
use App\Helpers\Response; 

class CategoryController
{
    private Categories $categories; 

    public function __construct()
    {
        $this->categories = new Categories(); 
    }

    public function index()
    { 
        return Response::json($this->categories->all());
    }
 
    public function show(int $id)
    {
        return Response::json($this->categories->find($id));
    }

    public function store(array $data)
    {
        $result = $this->categories->create($data['title'],
            $data['description'],
            $data['image'],
            $data['status']);

        return Response::json(['created' => $result]);
    }

    public function update(int $id, array $data)
    { 
        $result = $this->categories->update($id, 
            $data['title'],
            $data['description'],
            $data['image'],
            $data['status']);
            
        return Response::json(['updated' => $result]);
    }

    public function destroy(int $id)
    {
        $result = $this->categories->delete($id);
        return Response::json(['deleted' => $result]);
    }
     
}
