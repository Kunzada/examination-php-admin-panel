<?php

class Model_Home extends Model
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
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
    public function getAllComments(){
        $sql = "SELECT * FROM comments";

        return $this->db->getAll($sql);
    }
    public function getAllSubcategories()
    {
        $sql = "SELECT * FROM subcategories";
        return $this->db->getAll($sql);
    }
   
  
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    public function countUsers()
    {
        $sql = "SELECT COUNT(*) as count FROM users";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countCategories()
    {
        $sql = "SELECT COUNT(*) as count FROM categories";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countSubcategories()
    {
        $sql = "SELECT COUNT(*) as count FROM subcategories";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countProducts()
    {
        $sql = "SELECT COUNT(*) as count FROM products";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countWishlist()
    {
        $sql = "SELECT COUNT(*) as count FROM wishlist";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countComments()
    {
        $sql = "SELECT COUNT(*) as count FROM comments";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->db->getAll($sql);
    }
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }

}
