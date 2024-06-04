<?php

class Model_Wishlists extends Model
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
    public function getAllWishlist(){
        $sql = "SELECT * FROM wishlist";
        return $this->db->getAll($sql);

    }

}
