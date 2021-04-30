<?php

namespace App\models;

class Cart extends \App\core\Model {

    public $buyer_id;
    public $product_id;

    public function __construct() {
        parent::__construct();
    }

    public function getAllCartProducts($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM cart WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $buyer_id]);
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

   public function checkout($buyer_id) {
        $stmt = self::$connection->prepare("DELETE from cart WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $this->buyer_id]);
    }

}
