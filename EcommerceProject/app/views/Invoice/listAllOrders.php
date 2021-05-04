<html>
    <head>

        <title><?= _("Orders")?></title>
    </head>
    <body>
        <h2><?= _("All Orders")?>:</h2>
        <?php
        echo "<br><a href='" . BASE . "/Buyer/index'>&#8592 ". _("Go Back to Main Page")."</a><br><br><br>";


        if (empty($data["invoice"])) {
            echo "<i>". _("You have no orders").".</i>";
        }
        
        

        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id) {
                    echo "<b><u>". _("Item Name").":</u></b> $product->caption<br>";
                    echo "<b><u>". _("Item Description").":</u></b> $product->description<br>";
                    $quantity = $invoice->total / $product->price;
                    echo "<b><u>". _("Quantity").": </u>$quantity<b><br>";
                    echo "<b><u>". _("Cost Per Item").":</u></b> $product->price CAD<br>";
                    echo "<b><u>". _("Total").":</u></b> $invoice->total CAD<br>";
                    foreach ($data["sellers"] as $seller) {
                        if ($invoice->seller_id == $product->seller_id) {
                            echo "<b><u>". _("Seller Name").":</u> </b>$seller->first_name ";
                            echo "$seller->last_name<br>";
                            echo "<b><u>". _("Seller Company").":</u> </b>$seller->brand_name<br><br>";
                        }
                    }
                }
            }
            echo "". _("DATE PURCHASED").": $invoice->timestamp<br>";
            echo "". _("EXPECTED DELIVERY DATE").": $invoice->date_of_arrival<br><br>";

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

                echo _("STATUS").": <span style='color:#398C0C;text-align:center;'> Delivered </span> &mdash; $invoice->date_of_arrival";
                if ($exist == true) {
                    echo "<br><a href='" . BASE . "/Review/edit/$currentProductReviewID'>". _("Edit Review")."</a><br><br><br>";
                } else {
                    echo "<br><a href='" . BASE . "/Review/add/$invoice->product_id'>". _("Leave a Review")."?</a><br><br><br>";
                }
            } else {
                echo _("STATUS").": <span style='color:#C77800;text-align:center;'> ". _("In Transit")." </span>";
                echo "<a href='" . BASE . "/Invoice/updateStatus/$invoice->invoice_id'>". _("Recieved")."?</a><br>";
            }
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
        }
        ?>
    </body>
</html>
