<?php

namespace App\controllers;

class SellerController extends \App\core\Controller {

    function index() {
        if (isset($_POST["action"])) {
            // $keyword = $_POST["keyword"];
            // $profiles = new \App\models\Profile();
            // $profiles = $profiles->searchForUser($keyword);
            // if ($keyword == "") {
            //     echo "INVALID: Please input a first, middle or last name.<br><br>";
            //     echo "<a href='" . BASE . "/Profile/index/'>&#8592 Go back</a>";
            // } else {
            //     $this->view('Profile/listOfProfiles', ['keyword' => $keyword, 'profiles' => $profiles]);
            // }
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
            $profile = new \App\models\Seller();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST["first_name"];
            $profile->brand_name = $_POST["brand_name"];
            $profile->last_name = $_POST["last_name"];
            $profile->insert();
            header("location:" . BASE . "/Seller/index/$seller->seller_id");
        } else {
            $profile = new \App\models\Seller();
            $profile = $seller->findUserId($_SESSION['user_id']);
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