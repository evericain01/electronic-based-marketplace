<?php

namespace App\controllers;

class DefaultController extends \App\core\Controller {

    function index() {
        $this->view('Default/index');
    }

    function register() {
        if (isset($_POST['action'])) {
            //if the passwords match
            if ($_POST['password'] == $_POST['password_confirm']) {
                $user = new \App\models\User();
                $user->username = $_POST['username'];
                $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $result = $user->insert(); //handle the true/false as needed here...
                if ($result == false) {
                    header('location:' . BASE . '/Default/register?error=Passwords do not match!'); //reload
                    return;
                }
                //log in automatically after registration
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;

                if (isset($_POST['twofasetup'])) {
                    header('location:' . BASE . '/Default/twofasetup');
                } else
                // header('location:' . BASE . '/Default/chooseProfile');
                    $this->view('Default/chooseProfile');
            } else
                header('location:' . BASE . '/Default/register?error=Passwords do not match!'); //reload
        } else {
            $this->view('Login/Register');
        }
    }

//done after user has logged in
    #[\App\core\LoginFilter]
    function twofasetup() {
        if (isset($_POST['action'])) {
            //if the passwords match
            $currentcode = $_POST['currentCode'];
            if (\App\core\TokenAuth::verify($_SESSION['secretkey'], $currentcode)) {
                //the user has verified their proper 2-factor authentication setup
                $user = new \App\models\User();
                $user->user_id = $_SESSION['user_id'];
                $user->secret_key = $_SESSION['secretkey'];
                $user->update2fa();
                header('location:' . BASE . '/Profile/createProfile');
            } else
                header('location:' . BASE . '/Default/twofasetup?error=token not verified!'); //reload
        } else {
            $secretkey = \App\core\TokenAuth::generateRandomClue();
            $_SESSION['secretkey'] = $secretkey;
            $url = \App\core\TokenAuth::getLocalCodeUrl($_SESSION['username'], 'thedomain.com', $secretkey, 'TheNameOfYourApplication');
            $this->view('Login/twofasetup', $url);
        }
    }

    function editBuyerPassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo "Password Successfully Changed!<br><br>";
                        echo "<a href = '" . BASE . "/Buyer/index' >&#8592 Go Back to Home Page</a>";
                    } else {
                        echo "Password does not match.<br><br>";
                        echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 Go Back to Change Password</a>";
                    }
                } else {
                    echo "Invalid old password.<br><br>";
                    echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 Go Back to Change Password</a>";
                }
            } else {
                echo "Input a new password.<br><br>";
                echo "<a href = '" . BASE . "/Default/editBuyerPassword' >&#8592 Go Back to Change Password</a>";
            }
        } else {
            $this->view('Buyer/changeBuyerPassword');
        }
    }

    function editSellerPassword() {
        $user = new \App\models\User();
        $user = $user->find($_SESSION['username']);

        if (isset($_POST["action"])) {
            if ($_POST["oldPassword"] != "") {
                if (password_verify($_POST['oldPassword'], $user->password_hash)) {

                    if ($_POST['newPassword'] == $_POST['reTypePassword']) {
                        $user->password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                        $user->update($_SESSION['username']);
                        echo "Password Successfully Changed!<br><br>";
                        echo "<a href = '" . BASE . "/Seller/index' >&#8592 Go Back to Home Page</a>";
                    } else {
                        echo "Password does not match.<br><br>";
                        echo "<a href = '" . BASE . "/Default/editSellerPassword' >&#8592 Go Back to Change Password</a>";
                    }
                } else {
                    echo "Invalid old password.<br><br>";
                    echo "<a href = '" . BASE . "/Default/editSellerPassword' >&#8592 Go Back to Change Password</a>";
                }
            } else {
                echo "Input a new password.<br><br>";
                echo "<a href = '" . BASE . "/Default/editSellerPassword' >&#8592 Go Back to Change Password</a>";
            }
        } else {
            $this->view('Seller/changeSellerPassword');
        }
    }

    // Use: /Default/makeQRCode?data=protocol://address
    function makeQRCode() {
        $data = $_GET['data'];
        \QRcode::png($data);
    }

    function login() {
        if (isset($_POST['action'])) {
            $user = new \App\models\User();
            $user = $user->find(
            $_POST['username']);

            if ($user != null && password_verify($_POST['password'], $user->password_hash)) {
                if ($user->secret_key == null) {
                    $_SESSION['user_id'] = $user->user_id;
                    $_SESSION['username'] = $user->username;
                    $this->view('Default/chooseLogin');
//                    header('location:' . BASE . '/Default/chooseLogin');
                } else {
                    $_SESSION['temp_user_id'] = $user->user_id;
                    $_SESSION['temp_username'] = $user->username;
                    $_SESSION['temp_secret_key'] = $user->secret_key
                    ;
                    header('location:' . BASE . '/Default/validateLogin');
                }
            } else
                header('location:' . BASE . '/Default/login?error=Username/password mismatch!');
        } else {
            $this->view('Login/login');
        }
    }

    function validateLogin() {
        if (isset(
         $_POST['action'])) {
            $currentcode = $_POST['currentCode'];
            if (\App\core\TokenAuth::verify($_SESSION['temp_secret_key'], $currentcode)) {
                $_SESSION['user_id'] = $_SESSION['temp_user_id'];
                $_SESSION['username'] = $_SESSION['temp_username'];
                $_SESSION['temp_secret_key'] = '';
                header('location:' . BASE . '/Default/chooseLogin');
            } else {
                session_destroy();
                header('location:' . BASE . '/Default/login?error=Username/password mismatch!');
            }
        } else {
            $this->view('Login/validateLogin');
        }
    }

    function logout() {
        session_destroy();
        header('location:' . BASE . '/');
    }

}

?>