<?php

class Controller_Payment extends Controller
{
       function action_payment(){
        $data["title"] = "Payment";
        $this->view->generate("app/pages/Payment/payment.php", "app/layouts/home.php", $data);
    }
   
   
}
