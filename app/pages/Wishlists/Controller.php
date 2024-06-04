<?php

class Controller_Wishlists extends Controller
{
    function __construct()
    {
        $this->model = new Model_Wishlists();
        $this->view = new View();
    }
  
    public function action_wishlist(){
        $data["title"] = "Wishlist";
        $data["wishlists"] = $this->model->getAllWishlist();
        $data["products"]=$this->model->getAllProducts();
        $data["users"] = $this->model->getAllUsers();
        $this->view->generate("app/pages/Wishlists/wishlist.php", "app/layouts/home.php", $data);
    }
     
   
}
