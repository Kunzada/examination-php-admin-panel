<?php

class Model_Subcategories extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getData()
    {
        return false;
    }

    public function getItems()
    {
        return $this->db->getAll("SELECT * FROM products");
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM products WHERE productId = :productId";
        $args = [
            "productId" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    public function getAllSubcategories()
    {
        $sql = "SELECT * FROM subcategories";
        return $this->db->getAll($sql);
    }
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
    public function createSubcategories($data = [])
    {
        $sql = "INSERT INTO subcategories (category_id,name) VALUES (:category_id, :name)";

        $args = [
            "category_id" => $data["category_id"],
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
    public function updateSubcategories($category=[])
    {
        $sql = "UPDATE subcategories SET name = :name WHERE id = :id";
        $args = [
            ':id' => $category['id'],
            ':name' => $category['name'],
        ];
    
        return $this->db->update($sql, $args);
    }
    public function getSubcategoriesById($id)
    {
        $sql = "SELECT * FROM subcategories WHERE id = :subcategory_id";
        $args = [
            "subcategory_id" => $id
        ];
        return $this->db->getRow($sql, $args);
    }

    public function deleteSubcategories($id)
    {
        $sql = "DELETE FROM subcategories WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    

}
