<?php

namespace App\models;

class Buyer extends \App\core\Model {

    public $user_id;
    public $buyer_id;
    public $last_name;
    public $first_name;
    public $budget;

    public function __construct() {
        parent::__construct();
    }

    public function find($buyer_id) {
        $stmt = self::$connection->prepare("SELECT * FROM buyer WHERE buyer_id = :buyer_id");
        $stmt->execute(['buyer_id' => $buyer_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Buyer");
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

    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM buyer WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Buyer");
        return $stmt->fetch();
    }

    public function getAllBuyers() {
        $stmt = self::$connection->query("SELECT * FROM buyer");
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Buyer");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO profile(user_id, first_name, last_name, budget) 
        VALUES (:user_id, :first_name, :last_name, :budget)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' =>
            $this->first_name, 'last_name' => $this->last_name, 'budget' => $this->budget]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE from buyer WHERE buyer_id=:buyer_id");
        $stmt->execute(['buyer_id' => $this->buyer_id]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE profile SET first_name=:first_name, last_name=:last_name,
        budget=:budget WHERE buyer_id=:buyer_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
            'budget' => $this->budget, 'buyer_id' => $this->buyer_id]);
    }

}
