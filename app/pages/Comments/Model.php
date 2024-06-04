<?php

class Model_Comments extends Model
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

    public function getAllComments(){
        $sql = "SELECT * FROM comments";

        return $this->db->getAll($sql);
    }
    public function getAllSubcategories()
    {
        $sql = "SELECT * FROM subcategories";
        return $this->db->getAll($sql);
    }
    public function createComment($data = []){
      
        $sql = "INSERT INTO comments (user_id,product_id,description,votes) VALUES (:user_id, :product_id, :description, :votes)";
        $args = [
        "user_id" => $data["user_id"],
        "product_id" => $data["product_id"],
        "description" => $data["description"],
        "votes" => $data["votes"],
        ];
        return $this->db->insert($sql, $args);
    }
    public function deleteComment($id){
        $sql = "DELETE FROM comments WHERE id = ?";
        return $this->db->delete($sql, [$id]);
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
