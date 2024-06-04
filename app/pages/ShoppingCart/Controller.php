<?php

class Controller_ShoppingCart extends Controller
{
    function __construct()
    {
        $this->model = new Model_ShoppingCart();
        $this->view = new View();
    }
 

    public function action_shoppingCart(){
        $data["title"] = "Shopping Cart";
        $data["products"] = $this->model->getAllProducts();
        $data["users"]= $this->model->getAllUsers();
        $data["carts"] = $this->model->getAllShoppingCart();
        $this->view->generate("app/pages/ShoppingCart/shopping_cart.php", "app/layouts/home.php", $data);
    }
  
   
}
