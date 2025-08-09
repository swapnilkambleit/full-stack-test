<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Posts
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $dbQuery = $this->db->query("SELECT * FROM posts");
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        $dbQuery = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $dbQuery->execute([$id]);
        $data = $dbQuery->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    public function create(string $category_id, string $title, string $description, string $image, string $status)
    {
        $dbQuery = $this->db->prepare("INSERT INTO posts (category_id, title, description, image, status) VALUES (?, ?, ?, ?, ?)");
        return $dbQuery->execute([$category_id, $title, $description, $image, $status]);
    } 

    public function update(int $id, int $category_id, string $title, string $description, string $image, string $status)
    {
        $dbQuery = $this->db->prepare("UPDATE posts SET category_id = ?, title = ?, description = ?, image = ?, status = ? WHERE id = ?");
        return $dbQuery->execute([$category_id, $title, $description, $image, $status, $id]);
    }

    public function delete(int $id)
    {
        $dbQuery = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $dbQuery->execute([$id]);
    }
}
