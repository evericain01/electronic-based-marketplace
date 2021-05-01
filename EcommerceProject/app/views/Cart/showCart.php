<html>
    <head>
        <title>Your Cart</title>
    </head>
    <body>
        <form method="post" action="">
            <?php
            echo "<br><h2>This is your cart, " . $data['buyer']->first_name .
            " " . $data['buyer']->last_name . "! </h2><br><br>";

            foreach ($data['cart'] as $cart) {
                foreach ($data['products'] as $product) {
                    if ($cart->product_id == $product->product_id) {
                        foreach ($data['sellers'] as $sellers) {
                            if ($product->seller_id == $product->seller_id) {
                                echo "<img src='" . BASE . "/uploads/$product->filename' width='250' height='200'/><br><br>";
                                echo "<label><b><i>Sold by: </b>$sellers->brand_name</i></label><br><br>";
                                echo "<label><b>$product->caption</b></label> ";
                                echo "<label>($product->description)</label><br>";
                                echo "<label>$$product->price CAD</label><br>";
                                echo "<label>[STOCK: $product->quantity]</label><br>";
                                echo "<a href='" . BASE . "/Cart/removeFromCart/$product->product_id'>REMOVE</a><br>";
                            }
                        }
                    }
                }
            }

            $buyer_id = $data['buyer']->buyer_id;
            echo "<a href='" . BASE . "/Cart/checkout/$buyer_id'>CHECKOUT</a><br><br><br><br>";

            echo "<a href='" . BASE . "/Buyer/index/$buyer_id'>Go back to main page</a><br><br><br><br>";
            ?>
    </body>
</html>

