<html>
    <head>

        <title><?= _("Cart")?></title>
    </head>
    <body>
        <form method="post" action="">
            <?php
            echo "<h2>". _("Your Cart").":</h2><br>";

            echo "<a href='" . BASE . "/Buyer/index'>&#8592 ". _("Go Back to Main Page")."</a><br><br>";
            
            if (!$data['total'] == 0) {
                echo "<h3>". _("TOTAL COST").": <u>$" . $data['total'] . " CAD</u></h3><br>";
                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            } else {
                echo "<i>". _("Your cart is empty").".</i>";
            }

            foreach ($data['cart'] as $cart) {
                foreach ($data['products'] as $product) {
                    if ($cart->product_id == $product->product_id) {
                        foreach ($data['sellers'] as $sellers) {
                            if ($product->seller_id == $product->seller_id) {
                                echo "<img src='" . BASE . "/uploads/$product->filename' width='100' height='70'/><br><br>";
                                echo "<b><i>". _("Sold by").": </b>$sellers->brand_name</i><br><br>";
                                echo "<b>$product->caption</b> ";
                                echo "($product->description)<br>";
                                echo "$$product->price CAD<br>";
                                echo "[". _("QUANTITY").": $cart->product_quantity]<br>";
                                echo "<a href='" . BASE . "/Cart/removeFromCart/$product->product_id'>". _("REMOVE")."</a><br><br>";
                                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                            }
                        }
                    }
                }
            }
            
            if (!$data['total'] == 0) {
                echo "<br><br><b><a href='" . BASE . "/Cart/goToConfrimationPage'>". _("CHECKOUT")."</a></b>";
            }
            ?>
    </body>
</html>

