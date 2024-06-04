<?php

class Controller_Categories extends Controller
{
    function __construct()
    {
        $this->model = new Model_Categories();
        $this->view = new View();
    }


    public function action_addCategories()
    {
        $data["title"] = "Add Categories";

        if (!empty($_POST) && !empty($_FILES)) {
            $category = [];

            $category["name"] = $_POST["name"];

            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            // Check for image upload errors
            if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_exs = ['jpg', 'jpeg', 'png'];
                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $upload_dir = 'uploads/categories/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $new_img_name = uniqid("category_", true) . '.' . $img_ex_to_lc;
                    $img_upload_path = $upload_dir . $new_img_name;
                    if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        $category["image"] = $new_img_name;

                        $newCategory = $this->model->createCategories($category);

                        if ($newCategory > 0) {
                            header("Location: /exam/Categories/categories"); // Redirect to categories page after successful creation
                            exit();
                        } else {
                            echo "Something went wrong, please try again";
                            $this->view->generate("app/pages/Categories/addCategories.php", "app/layouts/home.php");
                        }
                    } else {
                        echo  "Failed to upload image";
                        $this->view->generate("app/pages/Categories/addCategories.php", "app/layouts/home.php");
                    }
                } else {
                    // Handle invalid file type
                    echo  "You can't upload files of this type";
                    $this->view->generate("app/pages/Categories/addCategories.php", "app/layouts/home.php");
                }
            } else {
                // Handle image upload error
                echo  "Unknown error occurred!";
                $this->view->generate("app/pages/Categories/action_updateCategories.php", "app/layouts/home.php");
            }
        } else {

            $this->view->generate("app/pages/Categories/addCategories.php", "app/layouts/home.php", $data);
        }
    }
    public function action_update()
{
    $data["title"] = "Update Categories";

    // Ensure category ID is set in POST request
    if (isset($_POST["categoryid"])) {
        $category_id = $_POST["categoryid"];
        $data["category"] = $this->model->getCategoriesById($category_id);

        // Check if form data is submitted
        if (!empty($_POST) && isset($_POST["name"]) && isset($_FILES["image"])) {
            $category = [];
            $category["id"] = $category_id;
            $category["name"] = htmlspecialchars($_POST["name"]);
            $category["image"] = htmlspecialchars($_FILES["image"]["name"]);

            // Move uploaded file to the desired directory if there's no error
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                // Optionally, you can add more checks here (e.g., file type, file size)

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Update category in the database
                    $updatedCategory = $this->model->updateCategories($category);
                    if ($updatedCategory > 0) {
                        header("Location: /exam/categories/categories");
                        exit();
                    }
                } else {
                    // Handle file upload error
                    $data["error"] = "Failed to move uploaded file.";
                }
            } else {
                // Handle file upload error
                $data["error"] = "Error occurred during file upload.";
            }
        }
    } else {
        // Handle the case where category ID is not set in POST
        $data["error"] = "Category ID is missing.";
    }

    $this->view->generate("app/pages/Categories/update.php", "app/layouts/home.php", $data);
}

    
    

public function action_categories()
{
    $data["title"] = "Categories";
    $data["categories"] = $this->model->getAllCategories();

    if(isset($_POST['categoryid'])) {
        $categoryId = $_POST['categoryid'];

        $deleted = $this->model->deleteCategories($categoryId);

        if($deleted > 0) {
            header("Location: /exam/categories/categories");
            exit();
        }
        else{
            $data["error"] = "Failed to delete category.";
            
            $this->view->generate("app/pages/Categories/categories.php", "app/layouts/home.php", $data);
            exit();
        }

       
    
    }

    $this->view->generate("app/pages/Categories/categories.php", "app/layouts/home.php", $data);
}

   
}
