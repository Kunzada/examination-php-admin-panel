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
                            header("Location: /exam/home/categories"); // Redirect to categories page after successful creation
                            exit();
                        } else {
                            echo "Something went wrong, please try again";
                            $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php");
                        }
                    } else {
                        echo  "Failed to upload image";
                        $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php");
                    }
                } else {
                    // Handle invalid file type
                    echo  "You can't upload files of this type";
                    $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php");
                }
            } else {
                // Handle image upload error
                echo  "Unknown error occurred!";
                $this->view->generate("app/pages/Home/action_updateCategories.php", "app/layouts/home.php");
            }
        } else {

            $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php", $data);
        }
    }
    public function action_updateCategories()
    {
        $data["title"] = "Update Categories";
    
        if (isset($_POST["category_id"])) {
            $category_id = $_POST["category_id"];
            $data["category"] = $this->model->getCategoriesById($category_id);
    
            if (!empty($_POST["name"]) && !empty($_FILES['image'])) {
                $category = [];
                $category["id"] = $category_id; // Include category ID for the update
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
                        // Create a unique image name and define upload path
                        $upload_dir = 'uploads/categories/';
                        if (!is_dir($upload_dir)) {
                            mkdir($upload_dir, 0777, true);
                        }
    
                        // Create a unique image name and define upload path
                        $new_img_name = uniqid("category_", true) . '.' . $img_ex_to_lc;
                        $img_upload_path = $upload_dir . $new_img_name;
    
                        if (move_uploaded_file($tmp_name, $img_upload_path)) {
                            $category["image"] = $new_img_name;
                            $updatedCategory = $this->model->updateCategories($category);
    
                            if ($updatedCategory) {
                                header("Location: /exam/home/categories");
                                exit();
                            } else {
                                $_SESSION['error'] = "Something went wrong, please try again";
                            }
                        } else {
                            $_SESSION['error'] = "Failed to upload image";
                        }
                    } else {
                        $_SESSION['error'] = "You can't upload files of this type";
                    }
                } else {
                    $_SESSION['error'] = "Unknown error occurred!";
                }
            } else {
                $_SESSION['error'] = "No data received!";
            }
        } else {
            $_SESSION['error'] = "Invalid category ID!";
            header("Location: /exam/home/categories");
            exit();
        }
    
        $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php", $data);
    }
    
    

public function action_categories()
{
    $data["title"] = "Categories";
    $data["categories"] = $this->model->getAllCategories();

    if (isset($_POST['categoryid'])) {
        $categoryId = $_POST['categoryid'];
        $action = $_POST['action'];

        if ($action === 'delete') {
            $this->model->deleteCategories($categoryId);
            header("Location: /exam/home/categories");
            exit();
        } elseif ($action === 'update') {
            $data["category_id"] = $categoryId;
            $data["category"] = $this->model->getCategoriesById($categoryId); // Fetch category details
            $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php", $data);
            exit();
        } elseif ($action === 'add') {
            $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php", $data);
            exit();
        }
    }

    $this->view->generate("app/pages/Home/categories.php", "app/layouts/home.php", $data);
}

   
    public function action_subCategories()
    {
        $data["title"] = "Subcategories";
        $data["subcategories"] = $this->model->getAllSubcategories();
        $data["categories"] = $this->model->getAllCategories();
    
        if (!empty($_POST['subcategoryid']) && !empty($_POST['category_id'])) {
            $subcategoryId = $_POST['subcategoryid'];
            $categoryId = $_POST['category_id']; // Corrected variable name
            $action = $_POST['action'];
            
            // Fetch category details based on the submitted category ID
    
            if ($action === 'delete') {
                $this->model->deleteSubcategories($subcategoryId);
                header("Location: /exam/home/categories");
                exit();
            } elseif ($action === 'update') {
                $data["subcategory_id"] = $subcategoryId; // Corrected variable name
                // $data["subcategory"] = $this->model->getSubcategoriesById($subcategoryId); // Fetch subcategory details
                $this->view->generate("app/pages/Home/addCategories.php", "app/layouts/home.php", $data);
                exit();
            } elseif ($action === 'add') {
                $this->view->generate("app/pages/Home/subcategories.php", "app/layouts/home.php", $data);
                exit();
            }
        }
    
        $this->view->generate("app/pages/Home/subcategories.php", "app/layouts/home.php", $data);
    }
    
    public function action_orders()
    { $data["title"] = "Orders";
        $this->view->generate("app/pages/Home/orders.php", "app/layouts/home.php", $data);

    }
    public function action_products(){
        $data["title"] = "Products";
        $this->view->generate("app/pages/Home/products.php", "app/layouts/home.php", $data);

    }
    public function action_wishlist(){
        $data["title"] = "Wishlist";
        $this->view->generate("app/pages/Home/wishlist.php", "app/layouts/home.php", $data);
    }
    public function action_shopping_cart(){
        $data["title"] = "Wishlist";
        $this->view->generate("app/pages/Home/shopping_cart.php", "app/layouts/home.php", $data);
    }
    public function action_addresses(){
        $data["title"] = "Addresses";
        $this->view->generate("app/pages/Home/addresses.php", "app/layouts/home.php", $data);
    }
    function action_orderDetails()
    {
        $data["title"] = "Addresses";
        $this->view->generate("app/pages/Home/orderDetails.php", "app/layouts/home.php", $data);
        // $result = $this->model->getById($id);
        // $data = [];
        // $data["title"] = $result->productName;
        // $data["item"] = $result;
        // $this->view->generate("app/pages/Items/details.php", "app/layouts/items.php", $data);
    }
    function action_payment(){
        $data["title"] = "Payment";
        $this->view->generate("app/pages/Home/payment.php", "app/layouts/home.php", $data);
    }
    function action_comments(){
        $data["title"] = "Comments";
        $data["comments"]= $this->model->getAllComments();
        $data["users"] = $this->model->getAllUsers();
        $data["products"]=$this->model->getAllProducts();
        if (!empty($_POST['commentid']) && !empty($_POST['commentid'])) {
            $commentId = $_POST['commentid'];

            $action = $_POST['action'];
            
            // Fetch category details based on the submitted category ID
    
            if ($action === 'delete') {
                $this->model->deleteComment($commentId);
                header("Location: /exam/home/comments");
             
            } elseif ($action === 'update') {
                // $data["subcategory_id"] = $subcategoryId; // Corrected variable name
                // $data["subcategory"] = $this->model->getSubcategoriesById($subcategoryId); // Fetch subcategory details
                $this->view->generate("app/pages/Home/addComment.php", "app/layouts/home.php", $data);
                exit();
            } elseif ($action === 'add') {
                $this->view->generate("app/pages/Home/addComment.php", "app/layouts/home.php", $data);
                exit();
            }
        }
    
        $this->view->generate("app/pages/Home/comments.php", "app/layouts/home.php", $data);
    }
    public function action_addComments()
    {
        $data["title"] = "Add Categories";
        $data["products"]=$this->model->getAllProducts();
        $data["comments"]= $this->model->getAllComments();

        if (!empty($_POST)) {
            $user = [];
            $user["user_id"] =$_SESSION["user"]->id;
            $user["product_id"] = $_POST["product_id"];
            $user["votes"]=$_POST["votes"];
            $user["description"] = $_POST["description"];
            $newComment = $this->model->createComment($user);
            if ($newComment > 0) {
                $this->view->generate("app/pages/Home/comments.php", "app/layouts/base.php");
           
            } else {
                // Handle user creation failure
                // $data['error']="Something went wrong, please try again";
                $this->view->generate("app/pages/Home/addComment.php", "app/layouts/base.php",$data);
            }
        } else {

            $this->view->generate("app/pages/Home/addComment.php", "app/layouts/home.php", $data);
        }
    }
}
