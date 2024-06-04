<?php

class Controller_User extends Controller
{
    function __construct() {
        $this->model = new Model_User();
        $this->view = new View();
    }

    // function action_profile(){
    //     if(!empty($_POST)) {
    //         $user = [];
    //         $user["name"] = $_POST["name"];
    //         $user["date"] = $_POST["date"];
    //         $user["gender"] = $_POST["gender"];
    //         $user["login"] = $_POST["login"];
    //         $user["password"] = $_POST["password"];
    //         $user["email"] = $_POST["email"];
    //         $newUser = $this->model->updateUser($user);
    //         if($newUser > 0) {
    //             $this->view->generate("app/pages/User/success.php", "app/layouts/base.php");
    //         }
    //         else {
    //             $this->view->generate("app/pages/User/failed.php", "app/layouts/base.php");
    //         }
    //     }
    //     $this->view->generate("app/pages/User/profile.php", "app/layouts/home.php");
    // }
    function action_registration() {
        if (!empty($_POST) && !empty($_FILES)) {
            $user = [];
            $data=[];
            $data['success'] ="";
            $data['error']="";
            $user["username"] = $_POST["username"];
            $user["surname"] = $_POST["surname"];
            $user["birthday"] = $_POST["birthday"];
            $user["gender"] = $_POST["gender"];
            $user["email"] = $_POST["email"];
            $user["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $user["phone_number"] = $_POST["phone_number"];
            $user["role"] = $_POST["role"];
            
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
                    $upload_dir = 'image/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
    
                    // Create a unique image name and define upload path
                    $new_img_name = uniqid($user["username"], true) . '.' . $img_ex_to_lc;
                    $img_upload_path = $upload_dir . $new_img_name;
                    // Move the uploaded file to the desired directory
                    if (move_uploaded_file($tmp_name, $img_upload_path)) {
                        // Save the image path in the user array
                        $user["image"] = $new_img_name;
    
                        // Create user in the database
                        $newUser = $this->model->createUser($user);
    
                        if ($newUser > 0) {
                            $data['success'] ="Your account has been created successfully";
                            $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php",$data);
                            // header("Location: registration.php?success=Your account has been created successfully");
                            exit();
                        } else {
                            // Handle user creation failure
                            $data['error']="Something went wrong, please try again";
                            $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php",$data);
                        }
                    } else {
                        // Handle file move failure
                        $data['error'] = "Failed to upload image";
                        $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php",$data);
                    }
                } else {
                    // Handle invalid file type
                    $data['error'] = "You can't upload files of this type";
                    $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php",$data);
                }
            } else {
                // Handle image upload error
                $data['error'] = "Unknown error occurred!";
                $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php",$data['error']);
            }
        }
       
        else {
            // Handle empty POST or FILES
            $this->view->generate("app/pages/User/registration.php", "app/layouts/base.php");
        }
    }
    function action_profile()
    {
        $data["users"] = $this->model->getAllUsers();
        if (!empty($_POST)) {
            $user = [];
            $user["id"] = $_SESSION["user"]->id;
            $user["username"] = $_POST["username"];
            $user["surname"] = $_POST["surname"];
            $user["birthday"] = $_POST["birthday"];
            $user["email"] = $_POST["email"];
            $user["image"] = $_POST["image"];
            $user["phone_number"] = $_POST["phone_number"];
            $upload = $this->model->updateUser($user);
            if ($upload > 0) {

                $this->view->generate("app/pages/Home/index.php", "app/layouts/home.php", $data);
            }
        }
        $this->view->generate("app/pages/User/profile.php", "app/layouts/home.php", $data);
    }
    function action_logout() {
        session_destroy();

        header("Location: /exam/user/login");
        // $this->view->generate("app/pages/User/logout.php", "app/layouts/base.php");
    }
    function action_login() {
        if (!empty($_POST)) {
            $data = [];
            $user = [];
            $data['error']="";
            $user["email"] = $_POST["email"];
            $user["password"] = $_POST["password"];
    
            // Attempt to login the user
            $isAuth = $this->model->loginUser($user);
    
            if ($isAuth ) { 
    
                $this->view->generate("app/pages/Home/index.php", "app/layouts/home.php");
              
            } else {
                $data['error'] = "Incorrect username or password!";
                $this->view->generate("app/pages/User/login.php", "app/layouts/base.php", $data);
              
            }
        } else {
            $this->view->generate("app/pages/User/login.php", "app/layouts/base.php");
        }
    }
    

    function action_edit(){
        if (!empty($_POST)) {
            $user = [];
            $user["id"]=$_SESSION["id"];
            $user["name"] = $_POST["name"];
            $user["surname"] = $_POST["surname"];
            $user["birthday"] = $_POST["date"];
            $user["gender"] = $_POST["gender"];
            $user["email"] = $_POST["email"];
            $user["password"] = $_POST["password"];
        }
        if(empty($user['name'])){
            $em="Name is required";
            $this->view->generate("app/pages/User/login.php?error=$em", "app/layouts/base.php");
            exit;
        }
        else if(empty($user['surname'])){
            $em="Name is required";
            $this->view->generate("app/pages/User/login.php?error=$em", "app/layouts/base.php");
            exit;
        }
        else {

        }
    }
}