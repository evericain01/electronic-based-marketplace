<html>
    <head>
        <title>Cart</title>
    </head>
    <body>
        <form method="post" action="">
            <?php
            echo "<h2>Your Cart:</h2><br>";
            
            echo "<h3>TOTAL COST: <u>$" . $data['total'] . " CAD</u></h3><br>";
            
            $buyer_id = $data['buyer']->buyer_id;
            echo "<b><a href='" . BASE . "/Cart/checkout/$buyer_id'>CHECKOUT YOUR ITEMS</a></b><br><br><br>";

            
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            
            foreach ($data['cart'] as $cart) {
                foreach ($data['products'] as $product) {
                    if ($cart->product_id == $product->product_id) {
                        foreach ($data['sellers'] as $sellers) {
                            if ($product->seller_id == $product->seller_id) {
                                echo "<img src='" . BASE . "/uploads/$product->filename' width='100' height='70'/><br><br>";
                                echo "<b><i>Sold by: </b>$sellers->brand_name</i><br><br>";
                                echo "<b>$product->caption</b> ";
                                echo "($product->description)<br>";
                                echo "$$product->price CAD<br>";
                                echo "[QUANTITY: $cart->product_quantity]<br>";
                                echo "<a href='" . BASE . "/Cart/removeFromCart/$product->product_id'>REMOVE</a><br><br>";
                                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                            }
                        }
                    }
                }
            }
            echo "<br><br><a href='" . BASE . "/Buyer/index/$buyer_id'>&#8592 Go Back to Main Page</a><br><br><br><br>";
            ?>
    </body>
</html>

