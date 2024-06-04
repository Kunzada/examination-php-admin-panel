<?php

class Model_ShoppingCart extends Model
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
    public function getAllShoppingCart(){
        $sql = "SELECT * FROM shopping_cart";
        return $this->db->getAll($sql);

    }
}
