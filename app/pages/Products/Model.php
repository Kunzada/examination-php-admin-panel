<?php

class Model_Products extends Model
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

    public function getAllProducts(){
        return $this->db->getAll("SELECT * FROM products");

    }
    public function getAllSubcategories(){
        return $this->db->getAll("SELECT * FROM subcategories");
        
    }
    public function getProductsById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :productId";
        $args = [
            "productId" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    public function updateProducts($product=[])
    {
        $sql = "UPDATE products SET name = :name, image_url = :image_url, description = :description, price = :price, discount = :discount, stock_quantity = :stock_quantity, brand = :brand, subcategory_id = :subcategory_id WHERE id = :id";
        $args = [
            ':name' => $product['name'],
            ':image_url' => $product['image'],
            ':description' => $product['description'],
            ':price' => $product['price'],
            ':discount' => $product['discount'],
            ':stock_quantity' => $product['stock_quantity'],
            ':brand' => $product['brand'],
            ':subcategory_id' => $product['subcategory_id'],
            ':id' => $product['id']
        ];
    
        return $this->db->update($sql, $args);
    }
    
    
    public function createProducts($data = [])
    {
        $sql = "INSERT INTO products (image_url,name,description,price,discount,stock_quantity,brand,subcategory_id) VALUES (:image_url, :name, :description, :price, :discount, :stock_quantity, :brand, :subcategory_id)";

        $args = [
            "image_url" => $data["image"],
            "name" => $data["name"],
            "description" => $data["description"],
            "price" => $data["price"],
            "discount" => $data["discount"],
            "stock_quantity" => $data["stock_quantity"],
            "brand" => $data["brand"],
            "subcategory_id" => $data["subcategory_id"],

        ];

        return $this->db->insert($sql, $args);
    } 
   
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    
   
   
}

