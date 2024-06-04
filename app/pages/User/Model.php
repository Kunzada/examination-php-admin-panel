<?php

class Model_User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData()
    {
        return false;
    }

    public function loginUser($data = [])
    {
     
        $sql = "SELECT* FROM users WHERE email = :email AND password = getPassword(:password, salt);";
        $args = [
            "email" => $data["email"],
            "password" => $data["password"]
        ];
        if ($this->db->rowCount($sql, $args) == 1) {
            $_SESSION["user"] = $this->db->getRow($sql, $args);
            return true;
        } else {
            return false;
        }
    }
    

    public function createUser($data = [])
    {
        $sql = "INSERT INTO users
            (image,username, surname,
            email, password,
            birthday, gender,phone_number,role)
        VALUES (:image, :username, :surname,
            :email, :password,
            :birthday, :gender, :phone_number, :role)";

        $args = [
            "image" => $data["image"],
            "username" => $data["username"],
            "surname" => $data["surname"],
            "email" => $data["email"],
            "password" => $data["password"],
            "birthday" => $data["birthday"],
            "gender" => $data["gender"],
            "phone_number" => $data["phone_number"],
            "role" => $data["role"]
        ];

        return $this->db->insert($sql, $args);
    }
  
    public function deleteUser($id)
    {
    }
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $args = [
            "id" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->db->getAll($sql);
    }
    public function updateUser($data = [])
    {
        $sql = "UPDATE users SET image=:image ,username = :username, surname=:surname, email = :email,  birthday = :birthday, phone_number = :phone_number WHERE id = :id";
        $args = [
            "id" => $data["id"],
            "image" => $data["image"],
            "username" => $data["username"],
            "surname" => $data["surname"],
            "email" => $data["email"],
    
            "birthday" => $data["birthday"],
            "phone_number" => $data["phone_number"],


        ];

        return $this->db->update($sql, $args);
    }
}

// /user/
// /user/profile

// /user/auth
// /user/register