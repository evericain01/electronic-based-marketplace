<?php

namespace App\controllers;

class InvoiceController extends \App\core\Controller {

    function index() {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $invoices = new \App\models\Invoice();
        $invoices = $invoices->getAllInvoiceOfBuyer($buyer->buyer_id);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $products = new \App\models\Product();
        $products = $products->getAllProducts();
        
        $review = new \App\models\Review();
        $review = $review->getAllReviewsOfBuyer($buyer->buyer_id);

        $this->view('Invoice/listAllOrders', ['products' => $products, 'buyer' => $buyer, 'sellers' => $sellers,
            'invoice' => $invoices, 'reviews' => $review]);
    }

    function add($product_id) {
        $invoice = new \App\models\Invoice();
        $buyer = new \App\models\Buyer();
        $product = new \App\models\Product();
        $seller = new \App\models\Seller();

        $product = $product->find($product_id);
        $seller = $seller->find($product->product_id);
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $invoice->buyer_id = $buyer->buyer_id;
        $invoice->seller_id = $seller->seller_id;
        $invoice->product_id = $product->product_id;
        $invoice->date_of_arrival = dateHelper();

        $invoice->insert();
    }

}

?>