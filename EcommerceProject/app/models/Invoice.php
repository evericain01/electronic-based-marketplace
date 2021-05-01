<?php

namespace App\models;

class Invoice extends \App\core\Model {

    public $seller_id;
    public $buyer_id;
    public $product_id;
    public $timestamp;
    public $date_of_arrival;
    public $invoice_id;

    public function __construct() {
        parent::__construct();
    }

    public function find($buyer_id, $seller_id, $product_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE buyer_id = :buyer_id AND
        seller_id = :seller_id AND product_id = :product_id");
        $stmt->execute(['buyer_id' => $buyer_id, 'seller_id' => $seller_id, 'product_id' => $product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
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

    public function findInvoiceId($invoice_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE invoice_id = :invoice_id");
        $stmt->execute(['invoice_id' => $invoice_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetch();
    }

    public function getAllInvoiceOfBuyer($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM invoice WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Invoice");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO invoice(buyer_id, seller_id, product_id, timestamp, date_of_arrival) 
        VALUES (:buyer_id, :seller_id, :product_id, UTC_TIMESTAMP, UTC_TIMESTAMP)");
        $stmt->execute(['buyer_id' => $this->buyer_id, 'seller_id' => $this->seller_id, 'product_id' => $this->product_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from invoice WHERE invoice_id=:invoice_id");
        $stmt->execute(['invoice_id' => $this->invoice_id]);
    }

    // public function update() {
    //     $stmt = self::$connection->prepare("UPDATE profile SET first_name=:first_name, last_name=:last_name,
    //     budget=:budget WHERE buyer_id=:buyer_id");
    //     $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
    //         'budget' => $this->budget, 'buyer_id' => $this->buyer_id]);
    // }
}
