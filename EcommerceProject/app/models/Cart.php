<?php

namespace App\models;

class Cart extends \App\core\Model {

    public $buyer_id;
    public $product_id;

    public function __construct() {
        parent::__construct();
    }

    // public function find($buyer_id) {
    //     $stmt = self::$connection->prepare("SELECT * FROM buyer WHERE buyer_id = :buyer_id");
    //     $stmt->execute(['buyer_id' => $buyer_id]);
    //     $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Buyer");
    //     return $stmt->fetch();
    // }

    // public function searchForSeller($keyword) {
    //     $stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name LIKE :first_name "
    //             . "OR last_name LIKE :last_name OR middle_name LIKE :middle_name");
    //     $keyword = "%$keyword%";
    //     $stmt->execute(['first_name' => $keyword, 'last_name' => $keyword, 'middle_name' => $keyword]);
    //     $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
    //     return $stmt->fetchAll();
    // }

    // public function findUserId($user_id) {
    //     $stmt = self::$connection->prepare("SELECT * FROM buyer WHERE user_id = :user_id");
    //     $stmt->execute(['user_id' => $user_id]);
    //     $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Buyer");
    //     return $stmt->fetch();
    // }

    public function getAll($buyer_id) {
        $stmt = self::$connection->query("SELECT * FROM cart WHERE buyer_id=:buyer_id");
        $stmt->execute(['buyer_id' => $this->buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Cart");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO cart(buyer_id, product_id) 
        VALUES (:buyer_id, product_id)");
        $stmt->execute(['buyer_id' => $this->buyer_id, 'product_id' =>
            $this->product_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from cart WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $this->product_id]);
    }

    public function checkout() {
        $stmt = self::$connection->query("DELETE from cart");
    }

}
