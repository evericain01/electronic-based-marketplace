<?php

namespace App\controllers;

class ReviewController extends \App\core\Controller {

    function addReview($product_id) {
        if (isset($_POST["action"])) {
            $review = new \App\models\Review();
            $buyer = new \App\models\Buyer();

            $buyer = $buyer->findUserId($_SESSION['user_id']);

            $review->buyer_id = $buyer->buyer_id;
            $review->product_id = $product_id;
            $review->budget = $_POST["text_review"];
            $review->last_name = $_POST["rate"];
            $review->insert();

            $sellers = new \App\models\Seller();
            $sellers = $sellers->getAllSellers();

            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $invoice = new \App\models\Invoice();
            $invoice = $invoice->getAllInvoiceOfBuyer($buyer->buyer_id);

            $this->view('Invoice/listAllOrders', ['products' => $products, 'sellers' => $sellers, 'invoice' => $invoice]);
        } else {
            $buyer = new \App\models\Buyer();
            $buyer = $buyer->findUserId($_SESSION['user_id']);
            $this->view('Buyer/index');
        }
    }

    function changeReview($review_id) {
        if (isset($_POST["action"])) {
            $review = new \App\models\Review();
            $buyer = new \App\models\Buyer();

            $buyer = $buyer->findUserId($_SESSION['user_id']);

            $review->buyer_id = $buyer->buyer_id;
            $review->product_id = $product_id;
            $review->budget = $_POST["text_review"];
            $review->last_name = $_POST["rate"];
            $review->update();

            $sellers = new \App\models\Seller();
            $sellers = $sellers->getAllSellers();

            $products = new \App\models\Product();
            $products = $products->getAllProducts();

            $invoice = new \App\models\Invoice();
            $invoice = $invoice->getAllInvoiceOfBuyer($buyer->buyer_id);

            $this->view('Invoice/listAllOrders', ['products' => $product, 'sellers' => $sellers, 'invoice' => $invoice]);
        } else {
            $review = new \App\models\Review();
            $review = $review->find($review_id);
            $this->view('Review/editReview', $review);
        }
    }

}

?>