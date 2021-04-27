<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <?php
        echo "<br><h2>Welcome to your wall, " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </h2><br><br>";
        foreach ($data['product'] as $product) {
            echo "<label>$product->caption</label>";
            echo "<label>$product->description</label>";
            echo "<label>$product->price</label>";
        }
        ?>
    </body>
</html>

