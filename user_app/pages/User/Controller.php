<?php

class Controller_User extends Controller
{
    function __construct() {
        $this->model = new Model_User();
        $this->view = new View();
    }
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
            $user["role"] = "customer";
            
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
                            $this->view->generate("user_app/pages/User/registration.php", "user_app/layouts/registration.php",$data);
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
            $this->view->generate("user_app/pages/User/registration.php", "user_app/layouts/registration.php");
        }
    }
    
    function action_logout() {
        session_destroy();
        header("Location: /user/user/login");
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
    
                $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php");
              
            } else {

                $data['error'] = "Incorrect username or password!";
                $this->view->generate("user_app/pages/User/login.php", "user_app/layouts/login.php", $data);
              
            }
        } else {
            $this->view->generate("user_app/pages/User/login.php", "user_app/layouts/login.php");
        }
    }
 
    
}