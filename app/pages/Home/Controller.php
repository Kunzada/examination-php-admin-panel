<?php

class Controller_Home extends Controller
{
    function __construct()
    {
        $this->model = new Model_Home();
        $this->view = new View();
    }
    function action_main(){
        $this->view->generate("app/pages/Home/main.php", "app/layouts/main.php");
    }

    function action_index()
    {
        $data["title"] = "Dashboard";
        $resultUsers = $this->model->countUsers();
        $resultCategories = $this->model->countCategories();
        $resultSubcategories = $this->model->countSubcategories();
        $resultProducts = $this->model->countProducts();
        $resultWishlists= $this->model->countWishlist();
        $resultComments= $this->model->countComments();


        $data["countUsers"] = isset($resultUsers->count) ? (int)$resultUsers->count : 0;
        $data["countCategories"] = isset($resultCategories->count) ? (int)$resultCategories->count : 0;
        $data["subcountCategories"] = isset($resultSubcategories->count) ? (int)$resultSubcategories->count : 0;
        $data["countWishlists"] = isset($resultWishlists->count) ? (int)$resultWishlists->count : 0;
        $data["countComments"] = isset($resultComments->count) ? (int)$resultComments->count : 0;
        $data["products"] = isset($resultProducts->count) ? (int)$resultProducts->count : 0;

        $data["users"] = $this->model->getAllUsers();

        if (isset($_POST['deletedid'])) {
            $userId = $_POST['deletedid'];
            $this->model->deleteUser($userId);

            // Refresh user data after deletion
            $data["countUsers"] = isset($resultUsers->count) ? (int)$resultUsers->count : 0;
            $data["countCategories"] = isset($resultCategories->count) ? (int)$resultCategories->count : 0;
            $data["users"] = $this->model->getAllUsers();
        }
        $this->view->generate("app/pages/Home/index.php", "app/layouts/home.php", $data);
    }
      
}
