<?php

namespace App\controllers;

class CartController extends \App\core\Controller {

    function index() {
        // if (isset($_POST["action"])) {
        //     $keyword = $_POST["keyword"];
        //     $profiles = new \App\models\Profile();
        //     $profiles = $profiles->searchForUser($keyword);
        //     if ($keyword == "") {
        //         echo "INVALID: Please input a first, middle or last name.<br><br>";
        //         echo "<a href='" . BASE . "/Profile/index/'>&#8592 Go back</a>";
        //     } else {
        //         $this->view('Profile/listOfProfiles', ['keyword' => $keyword, 'profiles' => $profiles]);
        //     }
        // } else {
        //     $currentProfile = new \App\models\Profile();
        //     $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

        //     $otherUserProfile = new \App\models\Profile();
        //     $otherUserProfile = $otherUserProfile->getAllProfiles();

        //     $messages = new \App\models\Message();
        //     $messages = $messages->getAllMessages($currentProfile->profile_id);

        //     $pictures = new \App\models\Picture();
        //     $pictures = $pictures->getAllPictures($currentProfile->profile_id);

        //     $picture_likes = new \App\models\PictureLike();
        //     $picture_likes = $picture_likes->findAllLikes();

        //     $this->view('Profile/currentWall', ['messages' => $messages, 'profile' =>
        //         $currentProfile, 'otherProfile' => $otherUserProfile, 'pictures' =>
        //         $pictures, 'picture_likes' => $picture_likes]);
        // }
    }

    function addToCart($product_id) {
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $cart->product_id = $product_id;
            $cart->buyer_id = $buyer->buyer_id;
            $cart->insert();
            header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            $cart = new \App\models\Buyer();
            $cart = $buyer->findUserId($_SESSION['user_id']);
            $this->view('Buyer/buyerMainPage', $buyer);
        }
    }

    function removeFromCart($product_id) {
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();
            $cart = $cart->find($product_id);
            $cart->delete();
            header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            $cart = new \App\models\Cart();
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $cart = $cart->findCart($buyer->buyer_id);
            $this->view('Buyer/buyerMainPage', $buyer);
        }
    }

    function checkout($product_id) {
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();
            $cart = $cart->find($product_id);
            $cart->checkout();
            header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            $cart = new \App\models\Cart();
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $cart = $cart->findCart($buyer->buyer_id);
            $this->view('Buyer/buyerMainPage', $buyer);
        }
    }
}

?>