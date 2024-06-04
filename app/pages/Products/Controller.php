<?php

class Controller_Products extends Controller
{
    function __construct()
    {
        $this->model = new Model_Products();
        $this->view = new View();
    }

    function action_products()
    {
        $data["title"] = "Products";
        $data["products"] = $this->model->getAllProducts();
        $data["subcategories"] = $this->model->getAllSubcategories();
        if (isset($_POST['productid'])) {
            $product = $_POST["productid"];
            $delete = $this->model->deleteProduct($product);
            if ($delete > 0) {
                header("Location: /exam/products/products");
                exit();
            }
        }
        $this->view->generate("app/pages/products/products.php", "app/layouts/home.php", $data);
    }

    public function action_update()
    {
        $data["title"] = "Update Products";
        $data["subcategories"] = $this->model->getAllSubcategories();
    
        if (isset($_POST['productid'])) {
            $product_id = $_POST["productid"];
            $data["product"] = $this->model->getProductsById($product_id);
    
            if (!empty($_POST) && isset($_POST["name"])) {
                $product = [];
                $product["id"] = $product_id;
                $product["name"] = htmlspecialchars($_POST["name"]);
                $product["description"] = htmlspecialchars($_POST["description"]);
                $product["price"] = htmlspecialchars($_POST["price"]);
                $product["subcategory_id"] = htmlspecialchars($_POST["subcategory_id"]);
                $product["discount"] = htmlspecialchars($_POST["discount"]);
                $product["stock_quantity"] = htmlspecialchars($_POST["stock_quantity"]);
                $product["brand"] = htmlspecialchars($_POST["brand"]);
    
                // Handling file upload
                if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/';
                    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $product["image"] = $uploadFile;
                    } else {
                        // Handle upload error
                        $product["image"] = $data["product"]->image;
                    }
                } else {
                    $product["image"] = $data["product"]->image;
                }
    
                $updatedProduct = $this->model->updateProducts($product);
                if ($updatedProduct > 0) {
                    header("Location: /exam/products/products");
                    exit();
                } else {
                    echo "Failed to update the product.";
                    var_dump($product);
                }
            }
        }
        $this->view->generate("app/pages/products/update.php", "app/layouts/home.php", $data);
    }
    
    // public function action_update()
    // {
    //     $data["title"] = "Update Categories";

    //     // Ensure category ID is set in POST request
    //     if (isset($_POST["productid"])) {
    //         $product_id = $_POST["productid"];
    //         $data["category"] = $this->model->getCategoriesById($category_id);

    //         // Check if form data is submitted
    //         if (!empty($_POST) && isset($_POST["name"]) && isset($_FILES["image"])) {
    //             $category = [];
    //             $category["id"] = $category_id;
    //             $category["name"] = htmlspecialchars($_POST["name"]);
    //             $category["image"] = htmlspecialchars($_FILES["image"]["name"]);

    //             // Move uploaded file to the desired directory if there's no error
    //             if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    //                 $target_dir = "uploads/";
    //                 $target_file = $target_dir . basename($_FILES["image"]["name"]);

    //                 // Optionally, you can add more checks here (e.g., file type, file size)

    //                 if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //                     // Update category in the database
    //                     $updatedCategory = $this->model->updateCategories($category);
    //                     if ($updatedCategory > 0) {
    //                         header("Location: /exam/categories/categories");
    //                         exit();
    //                     }
    //                 } else {
    //                     // Handle file upload error
    //                     $data["error"] = "Failed to move uploaded file.";
    //                 }
    //             } else {
    //                 // Handle file upload error
    //                 $data["error"] = "Error occurred during file upload.";
    //             }
    //         }
    //     } else {
    //         // Handle the case where category ID is not set in POST
    //         $data["error"] = "Category ID is missing.";
    //     }

    //     $this->view->generate("app/pages/Categories/update.php", "app/layouts/home.php", $data);
    // }
    function action_addProducts()
    {
        $data["title"] = "Add Products";
        $data["subcategories"] = $this->model->getAllSubcategories();
        if (isset($_POST['name'])) {

            $product = [];
            $product["name"] = htmlspecialchars($_POST["name"]);
            $product["description"] = htmlspecialchars($_POST["description"]);
            $product["price"] = htmlspecialchars($_POST["price"]);
            $product["subcategory_id"] = htmlspecialchars($_POST["subcategory_id"]);
            $product["image"] = htmlspecialchars($_FILES["image"]["name"]);
            $product["discount"] = htmlspecialchars($_POST["discount"]);
            $product["stock_quantity"] = htmlspecialchars($_POST["stock_quantity"]);
            $product["brand"] = htmlspecialchars($_POST["brand"]);

            $newProduct = $this->model->createProducts($product);
            if ($newProduct > 0) {
                header("Location: /exam/products/products");
                exit();
            } else {
            }
        } else {
            $this->view->generate("app/pages/products/addProducts.php", "app/layouts/home.php", $data);
        }
    }
}
