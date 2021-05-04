<html>
    <head>
        <title><?= _("Invoice")?></title>
    </head>
    <body>
        <h2><?= _("Invoice")?>:</h2>

        <?php
        echo "<br><a href='" . BASE . "/Buyer/index'>&#8592 ". _("Go Back to Main Page")."</a><br><br><br>";

        $date = new DateTime(null, new DateTimeZone("America/Toronto"));
        $result = $date->format('Y-m-d H:i:s');
        
        foreach ($data["invoice"] as $invoice) {
            foreach ($data["products"] as $product) {
                if ($invoice->product_id == $product->product_id && $invoice->timestamp == $result) {
                   
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
                    echo _("DATE PURCHASED").": $invoice->timestamp<br>";

                    echo _("EXPECTED DELIVERY DATE").": $invoice->date_of_arrival<br><br>";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                }
            }
            
        }
        ?>
    </body>
</html>

