<?php

namespace App\controllers;

class ProductController extends \App\core\Controller {

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

    function add($seller_id) {
        if (isset($_POST["action"])) {
            $product = new \App\models\Product();
            $seller = new \App\models\Seller();

            $product = $product->find($product_id);
            $seller = $seller->find($product->product_id);

            $product->seller_id = $seller->seller_id;
            $product->caption = $_POST["caption"];
            $product->description = $_POST["description"];
            $product->filename = $_POST["filename"];
            $product->quantity = $_POST["quantity"];
            $product->price = $_POST["price"];

            $product->insert();
            // header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
        } else {
            // $product = new \App\models\Product();
            // $product = $product->findUserId($_SESSION['user_id']);
            // $this->view('Buyer/createBuyerProfile', $buyer);
        }
    }



    // function edit($profile_id) {
    //     $profile = new \App\models\Profile();
    //     $profile = $profile->find($profile_id);
    //     $user_id = $profile->user_id;

    //     if (isset($_POST["action"])) {
    //         $profile->profile_id = $profile_id;
    //         $profile->user_id = $user_id;
    //         $profile->first_name = $_POST["first_name"];
    //         $profile->middle_name = $_POST["middle_name"];
    //         $profile->last_name = $_POST["last_name"];

    //         $profile->update();
    //         header("location:" . BASE . "/Profile/index/$profile->profile_id");
    //     } else {
    //         $profile = new \App\models\Profile();
    //         $profile = $profile->find($profile_id);

    //         $user = new \App\models\User();
    //         $user = $user->find($_SESSION['username']);
    //         $this->view('Profile/editProfile', ['profile' => $profile, 'user' => $user]);
    //     }
    // }

    // function otherProfile($profile_id) {
    //     $friendProfile = new \App\models\Profile();
    //     $friendProfile = $friendProfile->find($profile_id);

    //     $otherUserProfile = new \App\models\Profile();
    //     $otherUserProfile = $otherUserProfile->getAllProfiles();

    //     $messages = new \App\models\Message();
    //     $messages = $messages->getAllPublicMessages($friendProfile->profile_id);

    //     $otherPictures = new \App\models\Picture();
    //     $otherPictures = $otherPictures->getAllPictures($friendProfile->profile_id);

    //     $picture_likes = new \App\models\PictureLike();
    //     $picture_likes = $picture_likes->findAllLikes();

    //     $this->view('Profile/otherWall', ['messages' => $messages, 'friendProfile' =>
    //         $friendProfile, 'otherProfile' => $otherUserProfile, 'otherPictures' =>
    //         $otherPictures, 'picture_likes' => $picture_likes]);
    // }

}

?>