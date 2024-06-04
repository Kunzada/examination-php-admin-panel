<?php

class Model_Categories extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getData()
    {
        return false;
    }

    
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
    public function createCategories($data = [])
    {
        $sql = "INSERT INTO categories (image,name) VALUES (:image, :name)";

        $args = [
            "image" => $data["image"],
            "name" => $data["name"],
        ];

        return $this->db->insert($sql, $args);
    } 

   
    public function getCategoriesById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :category_id";
        $args = [
            "category_id" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    public function updateCategories($category=[])
    {
    
        $sql = "UPDATE categories SET name = :name, image = :image WHERE id = :id";
        $args = [
            ':id' => $category['id'],
            ':name' => $category['name'],
            ':image' => $category['image'],
        ];
    
        return $this->db->update($sql, $args);
    }
    
    public function deleteCategories($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
   
}
