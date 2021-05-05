<html>
    <head>

        <title><?= _("Cart") ?></title>
    </head>
    <body>
        <form method="post" action="">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
                body {
                    text-align: center;
                    background-color: #BFBFBF;
                    font-family: 'Roboto', sans-serif;
                }

                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
                h4 {
                    text-align: left;
                }
                
            </style>

            <?php
            echo "<h1>" . _("Your Cart") . ":</h1><br>";

            if (!$data['total'] == 0) {
                echo "<h3>" . _("TOTAL COST") . ": <u>$" . $data['total'] . " CAD</u></h3><br>";
                echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
            } else {
                echo "<i>" . _("Your cart is empty") . ".</i>";
            }

            foreach ($data['cart'] as $cart) {
                foreach ($data['products'] as $product) {
                    if ($cart->product_id == $product->product_id) {
                        foreach ($data['sellers'] as $sellers) {

                            if ($product->seller_id == $sellers->seller_id) {
                                echo "<table style='width:75%'>";
                                echo "<tr><th>Image</th><th>Sold By</th><th>Product Name</th><th>Description</th><th>Price</th><th>Quantity</th><th></th></tr>";
                                echo "<tr><td><img src='" . BASE . "/uploads/$product->filename' width='100' height='70'/><br><br></td>";
                                echo "<td><b><i>$sellers->brand_name</i><br><br></td>";
                                echo "<td><b>$product->caption</b></td> ";
                                echo "<td>($product->description)<br></td>";
                                echo "<td>$$product->price CAD<br></td>";
                                echo "<td>$cart->product_quantity<br></td>";
                                echo "<td><a href='" . BASE . "/Cart/removeFromCart/$product->product_id'>" . _("REMOVE") . "</a><br><br></tr>";
                                echo "</table><br><br>";
                            }
                        }
                    }
                }
            }

            echo "<h4><a href='" . BASE . "/Buyer/index'>&#8592 " . _("Go Back to Main Page") . "</a></h4>";
            if (!$data['total'] == 0) {
                echo "<h2><b><a href='" . BASE . "/Cart/goToConfrimationPage'>" . _("CHECKOUT") . "</a></b></h2>";
            }
            ?>


    </body>
</html>

