<?php

class Controller_Home extends Controller
{
    function __construct()
    {
        $this->model = new Model_Home();
        $this->view = new View();
    }
    function action_index()
    {
        $resultWishlist = $this->model->countWishlist();
        $resultCart = $this->model->countShoppingCart();


        $data["cntwishlist"] = isset($resultWishlist->count) ? (int)$resultWishlist->count : 0;
        $data["cntcart"] = isset($resultCart->count) ? (int)$resultCart->count : 0;
        $data["products"] = $this->model->getAllProduct();
        if (!empty($_POST["product_id"])) {
            $wishlist = [];
            $wishlist["user_id"] = $_SESSION["user"]->id;
            $wishlist["product_id"] = $_POST["product_id"];
            $add_new_wishlist = $this->model->createWishlist($wishlist);

            if ($add_new_wishlist > 0) {

                $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php");
            }
        }else {
            $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
        }
    }
    function action_search()
    {
        if (isset($_POST["search_data"])) {
            $posts= $this->model->searchData($_POST["search_data"]);
            $data["products"] = $posts;
            $this->view->generate("user_app/pages/Home/search.php", "user_app/layouts/home.php", $data);
        }
        else{
            $this->view->generate("user_app/pages/Home/search.php", "user_app/layouts/home.php");
        }
        // $search_data =$_POST["search_data"];
        // $search = $this->model->searchData( $search_data);

        // if (!empty($search)) {
        //     $data["products"] = $search;
        //     $this->view->generate("user_app/pages/Home/search.php", "user_app/layouts/home.php", $data);
        // } else {
        //     // Handle no search results
        //     $data["error"] = "No products found for the search criteria.";
        //     $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
        
        // }
        // $data["products"] = $_POST["products"];
        // $this->view->generate("user_app/pages/Home/search.php", "user_app/layouts/home.php");

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
                
                $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
            }
        }
        $this->view->generate("user_app/pages/Home/profile.php", "user_app/layouts/home.php", $data);
    }
    function action_shoppingCart()
    {

        $data["products"] = $this->model->getAllProduct();
        $data["shoppingCarts"] = $this->model->getAllCart();
        if (!empty($_POST)) {
            $this->model->deleteShopCart($_POST["id"]);
            $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
        }
        $this->view->generate("user_app/pages/Home/shoppingCart.php", "user_app/layouts/home.php", $data);
    }
    function action_wishlist()
    {

        $data["products"] = $this->model->getAllProduct();
        $data["wishlists"] = $this->model->getAllWishList();
        if (!empty($_POST)) {
            $this->model->deleteWishlist($_POST["id"]);
            $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
        }
        $this->view->generate("user_app/pages/Home/wishlist.php", "user_app/layouts/home.php", $data);
    }
    function action_details($id)
    {
        $data["products"] =$this->model->getAllProduct();
        $result = $this->model->getProductById($id);
        $data["product"] = $result;
        $data["comments"] = $this->model->getAllComments();
        $data["users"] = $this->model->getAllUsers();
        if (!empty($_POST["product_id"]) && !empty($_POST["quantity"])) {

            $cart["user_id"] = $_SESSION["user"]->id;
            $cart["product_id"] = $_POST["product_id"];
            $cart["quantity"] = $_POST["quantity"];
            $add_new_cart = $this->model->createCart($cart);
            if ($add_new_cart > 0) {

                $this->view->generate("user_app/pages/Home/index.php", "user_app/layouts/home.php", $data);
            }
        } elseif (!empty($_POST["product_id"]) && !empty($_POST["product_id"]) && !empty($_POST["description"]) && !empty($_POST["votes"])) {

            $comment = [];
            $comment["user_id"] = $_POST["user_id"];
            $comment["product_id"] = $_POST["product_id"];
            $comment["description"] = $_POST["description"];
            $comment["votes"] = $_POST["votes"];
            // Create a unique image name and define upload path
            $add_new_comment = $this->model->createСomment($comment);


            if ($add_new_comment > 0) {

                $this->view->generate("user_app/pages/Home/details.php", "user_app/layouts/home.php", $data);
            }
        } else {
            // Handle empty POST or FILES
            $this->view->generate("user_app/pages/Home/details.php", "user_app/layouts/home.php", $data);
        }
    }
}
