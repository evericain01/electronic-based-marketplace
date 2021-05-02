<html>
    <head>
        <title>Invoice</title>
    </head>
    <body>
        <h2>Invoice:</h2>
        <?php
        
        echo "<br><a href='" . BASE . "/Buyer/index'>&#8592 Go Back to Main Page</a><br><br><br>";
        
        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id) {
                    echo "<b><u>Item Name:</u></b> $product->caption<br>";
                    echo "<b><u>Item Description:</u></b> $product->description<br>";
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

            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
        }

        ?>
    </body>
</html>

