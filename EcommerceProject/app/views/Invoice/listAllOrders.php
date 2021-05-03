<html>
    <head>
        <title>Orders</title>
    </head>
    <body>
        <h2>All Orders:</h2>
        <?php
        echo "<br><a href='" . BASE . "/Buyer/index'>&#8592 Go Back to Main Page</a><br><br><br>";


        if (empty($data["invoice"])) {
            echo "<i>You have no orders.</i>";
        }
        
        

        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id) {
                    echo "<b><u>Item Name:</u></b> $product->caption<br>";
                    echo "<b><u>Item Description:</u></b> $product->description<br>";
                    $quantity = $invoice->total / $product->price;
                    echo "<b><u>Quantity: </u>$quantity<b><br>";
                    echo "<b><u>Cost Per Item:</u></b> $product->price CAD<br>";
                    echo "<b><u>Total:</u></b> $invoice->total CAD<br>";
                    foreach ($data["sellers"] as $seller) {
                        if ($invoice->seller_id == $product->seller_id) {
                            echo "<b><u>Seller Name:</u> </b>$seller->first_name ";
                            echo "$seller->last_name<br>";
                            echo "<b><u>Seller Company:</u> </b>$seller->brand_name<br><br>";
                        }
                    }
                }
            }
            echo "DATE PURCHASED: $invoice->timestamp<br>";
            echo "EXPECTED DELIVERY DATE: $invoice->date_of_arrival<br><br>";

            if ($invoice->status == "Delivered") {
                $exist = false;
                $currentProductReviewID = null;
                
                foreach ($data["reviews"] as $review) {
                    if ($review->buyer_id == $data['buyer']->buyer_id && $review->product_id == $invoice->product_id) {
                        $exist = true;
                        $currentProductReviewID = $review->review_id;
                        break;
                    }
                }

                echo "STATUS: <span style='color:#398C0C;text-align:center;'> Delivered </span> &mdash; $invoice->date_of_arrival";
                if ($exist == true) {
                    echo "<br><a href='" . BASE . "/Review/edit/$currentProductReviewID'>Edit Review</a><br><br><br>";
                } else {
                    echo "<br><a href='" . BASE . "/Review/add/$invoice->product_id'>Leave a Review?</a><br><br><br>";
                }
            } else {
                echo "STATUS: <span style='color:#C77800;text-align:center;'> In Transit </span>";
                echo "<a href='" . BASE . "/Invoice/updateStatus/$invoice->invoice_id'>Recieved?</a><br>";
            }
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
        }
        ?>
    </body>
</html>
