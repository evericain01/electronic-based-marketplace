<?php

namespace App\controllers;

class CartController extends \App\core\Controller {

    function index() {
        $cart = new \App\models\Cart();
        $buyer = new \App\models\Buyer();
        $products = new \App\models\Product();

        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $buyer = $buyer->find($buyer->buyer_id);
        $cart = $cart->getAllCartProducts($buyer->buyer_id);
        $products = $products->getAllProducts();

        $this->view('Cart/showCart', ['buyer' => $buyer, 'products' => $products, 'sellers' => $sellers]);
    }

    function addToCart($product_id) {
        $product = new \App\models\Product();
        $product = $product->find($product_id);
        if ($product->quantity > 0) {
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);

            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $product = new \App\models\Product();
            $product = $product->find($product_id);

            $sellers = new \App\models\Seller();
            $sellers = $sellers->getAllSellers();

            $cart = new \App\models\Cart();
            $cart->product_id = $product_id;
            $cart->buyer_id = $buyer->buyer_id;

            $product->quantity -= 1;

            $product->update();
            $cart->insert();
        } else {
            $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products' => $products, 'sellers' => $sellers]);
            echo "No more stock of this product";
        }
        $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products' => $products, 'sellers' => $sellers]);
    }

    function removeFromCart($product_id) {
//        if (isset($_POST["action"])) {


        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->find($product->product_id);
        var_dump($product);
        $product->quantity += 1;

        $cart = new \App\models\Cart();
        $cart = $cart->find($buyer->buyer_id, $product->product_id);

        $product->update();
        $cart->delete();
        header("location:" . BASE . "/Buyer/index/$buyer->buyer_id");
//        } else {
//            $cart = new \App\models\Cart();
//            $buyer = new \App\models\Buyer();
//            $buyer = $buyer->findUserId($_SESSION['user_id']);
//            $cart = $cart->find($buyer->buyer_id, $product->product_id);
//            $this->view('Buyer/buyerMainPage', $buyer);
//        }
    }

    function checkout($buyer_id) {
        $cart = new \App\models\Cart();
        $cart = $cart->getAllCartProducts($buyer_id);

        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->getAllProducts();

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $total = 0;

        foreach ($cart as $carts) {
            foreach ($product as $products) {
                if ($carts->product_id == $products->product_id) {
                    $total += $products->price;
                    break;
                }
            }
        }

        var_dump($buyer->budget);
        var_dump($total);

        if ($buyer->budget >= $total) {
            foreach ($cart as $carts) {
                foreach ($product as $products) {
                    if ($carts->product_id == $products->product_id) {
                        $invoice = new \App\models\Invoice();
                        $invoice->add($products->product_id);
                    }
                }
            }
            $buyer->budget -= $total;

            $buyer->update();
            $cart->checkout();

            $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products' => $product, 'sellers' => $sellers]);
        } else {
            $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products' => $product, 'sellers' => $sellers]);
            echo "Money on account is not enough";
        }
    }

}

?>