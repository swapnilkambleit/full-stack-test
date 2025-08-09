<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Categories
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        $dbQuery = $this->db->query("SELECT * FROM categories");
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id)
    {
        $dbQuery = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $dbQuery->execute([$id]);
        $data = $dbQuery->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    public function create(string $title, string $description, string $image, string $status)
    {
        $dbQuery = $this->db->prepare("INSERT INTO categories (title, description, image, status) VALUES (?, ?, ?, ?)");
        return $dbQuery->execute([$title, $description, $image, $status]);
    }

    public function update(int $id, string $title, string $description, string $image, string $status)
    {
        $dbQuery = $this->db->prepare("UPDATE categories SET title = ?, description = ?, image = ?, status = ? WHERE id = ?");
        return $dbQuery->execute([$title, $description, $image, $status, $id]);
    }

    public function delete(int $id)
    {
        $dbQuery = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        return $dbQuery->execute([$id]);
    }
}