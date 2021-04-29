<?php

namespace App\models;

class Product extends \App\core\Model {

    public $product_id;
    public $seller_id;
    public $caption;
    public $filename;
    public $description;
    public $quantity;
    public $price;

    public function __construct() {
        parent::__construct();
    }

    public function find($product_id) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetch();
    }

    // public function searchForSeller($keyword) {
    //     $stmt = self::$connection->prepare("SELECT * FROM profile WHERE first_name LIKE :first_name "
    //             . "OR last_name LIKE :last_name OR middle_name LIKE :middle_name");
    //     $keyword = "%$keyword%";
    //     $stmt->execute(['first_name' => $keyword, 'last_name' => $keyword, 'middle_name' => $keyword]);
    //     $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
    //     return $stmt->fetchAll();
    // }

    public function findSellerProducts($seller_id) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE seller_id = :seller_id");
        $stmt->execute(['seller_id' => $seller_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Seller");
        return $stmt->fetch();
    }

    public function searchProducts($caption) {
        $stmt = self::$connection->prepare("SELECT * FROM product WHERE caption = :caption");
        $stmt->execute(['caption' => $caption]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetch();
    }

    public function getAllProducts() {
        $stmt = self::$connection->query("SELECT * FROM product");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Product");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO product(seller_id, caption, filename, description, quantity, price) 
        VALUES (:seller_id, :caption, :filename, :description, :quantity, :price)");
        $stmt->execute(['seller_id' => $this->seller_id, 'caption' =>
            $this->caption, 'filename' => $this->filename, 'description' => $this->description,
            'quantity' => $this->quantity, 'price' => $this->price]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from product WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $this->product_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE profile SET seller_id=:seller_id, caption=:caption,
        filename=:filename, description=:description, quantity=:quantity, price=:price WHERE product_id=:product_id");
        $stmt->execute(['seller_id' => $this->seller_id, 'caption' => $this->caption, 'description' => $this->description, 'quantity' => $this->quantity,
        'price' => $this->price, 'product_id' => $this->product_id]);
    }

}
