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

        $this->view('Cart/showCart', ['cart' => $cart, 'buyer' => $buyer, 'products'
            => $products, 'sellers' => $sellers]);
    }

    function addToCart($product_id) {
        $product = new \App\models\Product();
        $product = $product->find($product_id);

        $products = new \App\models\Product();
        $products = $products->getAllProducts();

        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $cart = new \App\models\Cart();
        $cart = $cart->find($buyer->buyer_id, $product_id);

        if ($cart === false) {
            var_dump($product_id);
            if ($product->quantity > 0) {
                $newCart = new \App\models\Cart();
                
                $newCart->product_id = $product_id;
                $newCart->buyer_id = $buyer->buyer_id;

                $product->quantity -= 1;
                $product->update();

                $newCart->product_quantity = 1;
                $newCart->insert();
            } else {
                $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products'
                    => $products, 'sellers' => $sellers]);
                echo "No more stock of this product";
            }
        } else {
            if ($product->quantity > 0) {
                $product->quantity -= 1;
                $cart->product_quantity += 1;
                
                $product->update();
                $cart->update();
            } else {
                $this->view('Buyer/buyerMainPage', ['buyer' => $buyer, 'products'
                    => $products, 'sellers' => $sellers]);
                echo "No more stock of this product";
            }
        }
        header("location:" . BASE . "/Buyer/index");
    }

    function removeFromCart($product_id) {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $product = new \App\models\Product();
        $product = $product->find($product_id);

        $cart = new \App\models\Cart();

        $cart = $cart->find($buyer->buyer_id, $product_id);

        if ($cart->product_quantity > 1) {
            $cart->product_quantity -= 1;
            $product->quantity += 1;
            
            $cart->update();
            $product->update();
        } else {
            $product->quantity += 1;
            $cart->delete();
            $product->update();
        }

        header("location:" . BASE . "/Cart/index");
    }

    function dateHelper() {
        date_default_timezone_set('Montreal/Canada');
        $diff1Week = new DateInterval('P1W');
        $current = new DateTime('d-m-y h:i:s');
        $date_of_arrival = $current . add($diff1Week);
        return $date_of_arrival;
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
        
        if ($buyer->budget >= $total) {
            foreach ($cart as $carts) {
                foreach ($product as $products) {
                    if ($carts->product_id == $products->product_id) {
                        $invoice = new \App\models\Invoice();
                        $currentProduct = new \App\models\Product();
                        $seller = new \App\models\Seller();

                        $currentProduct = $currentProduct->find($products->product_id);
                        $seller = $seller->find($products->product_id);

                        $invoice->buyer_id = $buyer->buyer_id;
                        $invoice->seller_id = $seller->seller_id;
                        $invoice->product_id = $currentProduct->product_id;
                        $invoice->date_of_arrival = $this->dateHelper();

                        $invoice->insert();
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