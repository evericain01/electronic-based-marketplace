<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">

        <?php
        foreach ($data["invoice"] as $invoice) {
            foreach ($data["product"] as $product) {
                echo "<label>$product->caption</label>";
                echo "<label>$product->description</label>";
                echo "<label>$product->price</label>";
                foreach ($data["seller"] as $seller) {
                    echo "<label>$seller->first_name</label>";
                    echo "<label>$seller->last_name</label>";
                }
            }
            echo "<label>$invoice->timestamp</label>";
            echo "<label>$invoice->date_of_arrival</label>";
        }
        ?>
    </body>
</html>

