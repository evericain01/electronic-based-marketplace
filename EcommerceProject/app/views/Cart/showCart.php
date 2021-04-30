<html>
    <head>
        <title>Your Cart</title>
    </head>
    <body>
        <form method="post" action="">
            <?php
            echo "<br><h2>This is your cart, " . $data['buyer']->first_name .
            " " . $data['buyer']->last_name . "! </h2><br><br>";
            foreach ($data['products'] as $product) {
                foreach ($data['sellers'] as $sellers) {
                    if ($product->seller_id == $product->seller_id) {
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='250' height='200'/><br><br>";
                        echo "<label><b><i>Sold by: </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label> ";
                        echo "<label>($product->description)</label><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<label>[STOCK: $product->quantity]</label><br>";
                        echo "<a href='" . BASE . "/Cart/addToCart/$product->product_id'>ADD TO CART</a><br><br><br><br>";
                    }
                }
            }
            ?>
    </body>
</html>

