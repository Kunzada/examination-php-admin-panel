<?php

class Controller_Subcategories extends Controller
{
    function __construct()
    {
        $this->model = new Model_Subcategories();
        $this->view = new View();
    }
    public function action_subcategories()
    {
        $data["title"] = "Subcategories";
        $data["subcategories"] = $this->model->getAllSubcategories();
        $data["categories"] = $this->model->getAllCategories();

        if (isset($_POST['subcategoryid'])) {
            $categoryId = $_POST['subcategoryid'];

            $deleted = $this->model->deleteSubcategories($categoryId);

            if ($deleted > 0) {
                header("Location: /exam/Subcategories/subcategories");
                exit();
            } else {
                $data["error"] = "Failed to delete category.";

                $this->view->generate("app/pages/Subcategories/subcategories.php", "app/layouts/home.php", $data);
                exit();
            }
        }
        $this->view->generate("app/pages/Subcategories/subcategories.php", "app/layouts/home.php", $data);
    }
    public function action_addSubcategories(){
        $data["title"] = "Add Subcategories";
        $data["categories"] = $this->model->getAllCategories();
        if (!empty($_POST['name']) && !empty($_POST['category_id'])) {
            $subcategories = [];
            $subcategories['name'] = htmlspecialchars($_POST['name']);
            $subcategories['category_id'] = $_POST['category_id'];
            $insert = $this->model->createSubcategories($subcategories);
            if ($insert > 0) {
                header("Location: /exam/Subcategories/subcategories");
                exit(); // Terminate script execution after redirection
            } else {
                $data["error"] = "Failed to add subcategory.";

            }
        }
        $this->view->generate("app/pages/Subcategories/addSubcategories.php", "app/layouts/home.php", $data);
    }

    // public function action_update()
    // {
    //     $data["title"] = "Update subcategory";

    //     // Ensure subcategory ID is set in POST request
    //     if (isset($_POST["subcategoryid"])) {
    //         $subcategory_id = $_POST["subcategoryid"];
    //         $data["subcategory"] = $this->model->getSubcategoriesById($subcategory_id);

    //         // Check if form data is submitted
    //         if (!empty($_POST["name"])) {
    //             $subcategories = [];
    //             $subcategories["id"] = $subcategory_id;
    //             $subcategories["name"] = htmlspecialchars($_POST["name"]);

    //             // Update subcategory in the database
    //             $update = $this->model->updateSubcategories($subcategories);
    //             if ($update > 0) {
    //                 header("Location: /exam/subcategories/subcategories");
    //                 exit(); // Terminate script execution after redirection
    //             } else {
    //                 $data["error"] = "Failed to update subcategory.";
    //             }
    //         } else {
    //             $data["error"] = "Name field is required.";
    //         }
    //     } else {
    //         $data["error"] = "Subcategory ID is missing.";
    //     }

    //     $this->view->generate("app/pages/Subcategories/update.php", "app/layouts/home.php", $data);
    // }
    // public function action_update()
    // {
    //     $data["title"] = "Update Categories";
    
    //     // Ensure subcategory ID is set in POST request
    //     if (isset($_POST["subcategoryid"])) {
    //         $subcategory_id = $_POST["subcategoryid"];
    //         $data["subcategory"] = $this->model->getSubcategoriesById($subcategory_id);
    
    //         // Check if form data is submitted
    //         if (!empty($_POST["name"])) {
    //             $subcategory = [];
    //             $subcategory["id"] = $subcategory_id;
    //             $subcategory["name"] = htmlspecialchars($_POST["name"]);
    
    //             // Update subcategory in the database
    //             $updatedSubcategory = $this->model->updateSubcategories($subcategory);
    //             if ($updatedSubcategory > 0) {
    //                 header("Location: /exam/subcategories/subcategories");
    //                 exit();
    //             }
    //             else{
    //                 header("Location: /exam/subcategories/subcategories");

    //             }
    //         }
    //     } 
    
    //     $this->view->generate("app/pages/Subcategories/update.php", "app/layouts/home.php", $data);
    // }
    
}
