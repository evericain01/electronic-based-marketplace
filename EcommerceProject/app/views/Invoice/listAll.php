<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">

        <?php
        foreach ($data["invoice"] as $invoice) {
            if ($invoice->buyer_id == $data["buyer"]->buyer_id) {
            foreach ($data["products"] as $product) {
                echo "<label>$product->caption</label>";
                echo "<label>$product->description</label>";
                echo "<label>$product->price</label>";
                foreach ($data["sellers"] as $seller) {
                    echo "<label>$seller->first_name</label>";
                    echo "<label>$seller->last_name</label>";
                }
            }
            echo "<label>$invoice->timestamp</label>";
            echo "<label>$invoice->date_of_arrival</label>";
            }
        }
        ?>
    </body>
</html>

