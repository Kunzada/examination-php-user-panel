<?php

class Model_Home extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getData()
    {
        return false;
    }

    public function getAllCart(){

        $sql = "SELECT * FROM `shopping_cart`";
        return $this->db->getAll($sql);
    }
    public function deleteShopCart($id)
    {
        $sql = "DELETE FROM shopping_cart WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    public function getAllProduct()
    {
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }
    public function getAllWishList()
    {
        $sql = "SELECT * FROM wishlist";
        return $this->db->getAll($sql);
    }
    public function updateUser($data = [])
    {
        $sql = "UPDATE users SET image=:image ,username = :username, surname=:surname, email = :email,  birthday = :birthday, phone_number = :phone_number WHERE id = :id";
        $args = [
            "id" => $data["id"],
            "image" => $data["image"],
            "username" => $data["username"],
            "surname" => $data["surname"],
            "email" => $data["email"],
    
            "birthday" => $data["birthday"],
            "phone_number" => $data["phone_number"],


        ];

        return $this->db->update($sql, $args);
    }

    public function searchData($search_data){
        // $search_data=trim(strip_tags(stripcslashes((htmlspecialchars($search_data)))));

        $sql = "SELECT * FROM products WHERE name LIKE '%$search_data%' or brand LIKE '%$search_data%'";
        return $this->db->getAll($sql);
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->db->getAll($sql);
    }
    public function getAllComments()
    {
        $sql = "SELECT * FROM comments";
        return $this->db->getAll($sql);
    }
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
    public function getAllSubcategories()
    {
        $sql = "SELECT * FROM subcategories";
        return $this->db->getAll($sql);
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :productId";
        $args = [
            "productId" => $id
        ];
        return $this->db->getRow($sql, $args);
    }
    public function editProfile($id)
    {
    }
    public function addtoCart($id)
    {
    }
    public function deleteCart($id)
    {
    }
  
    public function deleteWishList($id)
    {
        $sql = "DELETE FROM wishlist WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
    public function createCart($data = [])
    {

        $sql = "INSERT INTO shopping_cart (user_id,product_id, quantity)
        VALUES (:user_id,:product_id, :quantity)";

        $args = [
            "user_id" => $data['user_id'],
            "product_id" => $data['product_id'],
            "quantity" => $data['quantity']

        ];

        return $this->db->insert($sql, $args);
    }
    public function createСomment($data = [])
    {

        $sql = "INSERT INTO comments (user_id,product_id, description,votes)
        VALUES (:user_id,:product_id, :description, :votes)";

        $args = [
            "user_id" => $data['user_id'],
            "product_id" => $data['product_id'],
            "description" => $data['description'],
            "votes" => $data['votes']

        ];

        return $this->db->insert($sql, $args);
    }
    public function countWishlist()
    {
        $sql = "SELECT COUNT(*) as count FROM wishlist";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
    public function countShoppingCart()
    {
        $sql = "SELECT COUNT(*) as count FROM shopping_cart";
        $args = [];
        return $this->db->getRow($sql, $args);
    }
   
    public function createWishlist($data = [])
    {
      
        $sql = "INSERT INTO wishlist (user_id,product_id)
        VALUES (:user_id,:product_id )";

        $args = [
            "user_id" => $data['user_id'],
            "product_id" => $data['product_id'],
        ];

        return $this->db->insert($sql, $args);
    }
}

// /user/
// /user/profile

// /user/auth
// /user/register