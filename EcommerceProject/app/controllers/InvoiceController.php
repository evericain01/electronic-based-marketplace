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
    
        $this->view('Invoice/listAll', ['products' => $products, 'buyer' => $buyer, 'sellers' => $sellers,
        'invoice' => $invoices]);
    }
    
    function viewOrders() {
        $buyer = new \App\models\Buyer();
        $buyer = $buyer->findUserId($_SESSION['user_id']);

        $invoices = new \App\models\Invoice();
        $invoices = $invoices->getAllInvoiceOfBuyer($buyer->buyer_id);

        $sellers = new \App\models\Seller();
        $sellers = $sellers->getAllSellers();

        $products = new \App\models\Product();
        $products = $products->getAllProducts();
    
        $this->view('Invoice/listAllOrders', ['products' => $products, 'buyer' => $buyer, 'sellers' => $sellers,
        'invoice' => $invoices]);
    }

    function add($product_id) {
//        if (isset($_POST["action"])) {
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
            // } else {
            //     $invoice = new \App\models\Invoice();
            //     $invoice = $invoice->findUserId($_SESSION['user_id']);
            //     $this->view('Buyer/createBuyerProfile', $buyer);
            // }
//        }
    }

    function checkStatus($invoice_id) {
        
    }
}

?>