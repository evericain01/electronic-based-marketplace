<?php

namespace App\controllers;

class CartController extends \App\core\Controller {

    function index($buyer_id) {
        $cart = new \App\models\Cart();
        $buyer = new \App\models\Buyer();
        $products = new \App\models\Product();

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $buyer = $buyer->find($buyer_id);
        $cart = $cart->getAllCartProducts($buyer->buyer_id);
        $products = $products->getAllProductsWithId($cart->buyer_id);

        $this->view('Cart/showCart', ['buyer' => $buyer, 'products' => $products, 'sellers' => $sellers]);
    }

    function addToCart($product_id) {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();            
            $cart->product_id = $product_id;
            $cart->buyer_id = $buyer->buyer_id;
            $cart->insert();
            header("location:" . BASE . "/Buyer/index");
        } else {
            $this->view('Buyer/buyerMainPage', $buyer);
        }
    }

    function removeFromCart($product_id) {
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();
            $cart = $cart->find($product_id);

            $product = new \App\models\Product();
            $product = $product->find($product->product_id);
            $product->quanity += 1;

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

    function checkout($buyer_id) {
        if (isset($_POST["action"])) {
            $cart = new \App\models\Cart();
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $cart = $cart->getAllProducts($buyer_id);
            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $total = 0;

            foreach ($cart as $cart) {
                foreach ($products as $products) {
                    if ($cart->product_id == $products->product_id) {
                        $total += $products->price;
                        $products->quantity -= 1;
                    }
                }
            }

            if ($buyer->budget >= total) {
                foreach ($cart as $cart) {
                    foreach ($products as $products) {
                        if ($cart->product_id == $products->product_id) {
                            $invoice = new \App\models\Invoice();
                            $invoice->add($products->product_id);
                        }
                    }
                }
                $buyer->budget = $buyer->budget - total;
                $buyer->update();
                $cart->checkout();
                header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
            } else {
                header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
                echo "Money on account is not enough";
            }
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