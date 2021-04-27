<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">
        <?php
            echo "<br><h2>This is your cart, " . $data['buyer']->first_name .
                " " . $data['buyer']->last_name . "! </h2><br><br>";
            foreach ($data["product"] as $product) {
                echo "<label>$product->caption</label>";
                echo "<label>$product->description</label>";
                echo "<label>$product->price</label>";
        }
        ?>
    </body>
</html>

