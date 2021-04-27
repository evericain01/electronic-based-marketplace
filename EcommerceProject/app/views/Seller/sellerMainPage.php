<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <?php
        echo "<br><h2>Welcome to your wall, " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "! </h2><br><br>";
        foreach ($data['product'] as $product) {
            if($product->seller_id == $data['seller']->seller_id) {
            echo "<label>$product->caption</label>";
            echo "<label>$product->description</label>";
            echo "<label>$product->price</label>";
            }
        }
        ?>
    </body>
</html>