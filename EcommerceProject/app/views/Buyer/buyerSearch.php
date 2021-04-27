<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <?php
        foreach ($data as $product) {
            echo "<label>$product->caption</label>";
            echo "<label>$product->description</label>";
            echo "<label>$product->price</label>";
        }
        ?>
    </body>
</html>