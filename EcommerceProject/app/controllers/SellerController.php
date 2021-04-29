<?php

namespace App\controllers;

class SellerController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {
            $keyword = $_POST["keyword"];
            $products = new \App\models\Product();
            $products = $products->searchProducts($keyword);
            if ($keyword == "") {
                echo "INVALID: Please input a first, middle or last name.<br><br>";
                echo "<a href='" . BASE . "/Seller/index/'>&#8592 Go back</a>";
            } else {
                $this->view('Seller/searchProducts', ['keyword' => $keyword, 'products' => $products]);
            }
        } else {
            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $seller = new \App\models\Seller();
            $seller = $seller->findUserId($_SESSION['user_id']);

            $this->view('Seller/sellerMainPage', ['products' => $products, 'seller' => $seller]);
        }
    }

    function createProfile() {
        if (isset($_POST["action"])) {
            $seller = new \App\models\Seller();
            $seller->user_id = $_SESSION['user_id'];
            $seller->first_name = $_POST["first_name"];
            $seller->brand_name = $_POST["brand_name"];
            $seller->last_name = $_POST["last_name"];
            $seller->insert();
            header("location:" . BASE . "/Seller/index/$seller->seller_id");
        } else {
            $seller = new \App\models\Seller();
            $seller = $seller->findUserId($_SESSION['user_id']);
            $this->view('Seller/createSellerProfile', $seller);
        }
    }

    function editProfile() {
        if (isset($_POST["action"])) {
            $seller = new \App\models\Seller();
            $seller->user_id = $_SESSION['user_id'];
            $seller->first_name = $_POST["first_name"];
            $seller->budget = $_POST["brand"];
            $seller->last_name = $_POST["last_name"];
            $seller->insert();
            header("location:" . BASE . "/Seller/index/$seller->seller_id");
        } else {
            $seller = new \App\models\Seller();
            $seller = $seller->findUserId($_SESSION['user_id']);
            $this->view('Seller/editSeller', $seller);
        }
    }
}

?>