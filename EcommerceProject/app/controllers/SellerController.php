<?php

namespace App\controllers;

class SellerController extends \App\core\Controller {

    // function index() {
    //     if (isset($_POST["action"])) {
    //         $keyword = $_POST["keyword"];
    //         $profiles = new \App\models\Profile();
    //         $profiles = $profiles->searchForUser($keyword);
    //         if ($keyword == "") {
    //             echo "INVALID: Please input a first, middle or last name.<br><br>";
    //             echo "<a href='" . BASE . "/Profile/index/'>&#8592 Go back</a>";
    //         } else {
    //             $this->view('Profile/listOfProfiles', ['keyword' => $keyword, 'profiles' => $profiles]);
    //         }
    //     } else {
    //         $currentProfile = new \App\models\Profile();
    //         $currentProfile = $currentProfile->findUserId($_SESSION['user_id']);

    //         $otherUserProfile = new \App\models\Profile();
    //         $otherUserProfile = $otherUserProfile->getAllProfiles();

    //         $messages = new \App\models\Message();
    //         $messages = $messages->getAllMessages($currentProfile->profile_id);

    //         $pictures = new \App\models\Picture();
    //         $pictures = $pictures->getAllPictures($currentProfile->profile_id);

    //         $picture_likes = new \App\models\PictureLike();
    //         $picture_likes = $picture_likes->findAllLikes();

    //         $this->view('Profile/currentWall', ['messages' => $messages, 'profile' =>
    //             $currentProfile, 'otherProfile' => $otherUserProfile, 'pictures' =>
    //             $pictures, 'picture_likes' => $picture_likes]);
    //     }
    // }

    function createProfile() {
        if (isset($_POST["action"])) {
            $profile = new \App\models\Seller();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST["first_name"];
            $profile->brand_name = $_POST["brand_name"];
            $profile->last_name = $_POST["last_name"];
            $profile->insert();
            // header("location:" . BASE . "/Seller/index/$buyer->buyer_id");
        } else {
            $profile = new \App\models\Seller();
            $profile = $seller->findUserId($_SESSION['user_id']);
            // $this->view('Seller/createSellerProfile', $seller);
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
            // header("location:" . BASE . "/Seller/index/$seller->seller_id");
        } else {
            $seller = new \App\models\Seller();
            $seller = $seller->findUserId($_SESSION['user_id']);
            // $this->view('Seller/createSellerProfile', $seller);
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