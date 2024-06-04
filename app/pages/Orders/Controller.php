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
   
   
}
