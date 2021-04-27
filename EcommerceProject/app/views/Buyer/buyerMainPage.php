<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Search for product: <input type="text" name="keyword"/></label><br />
        </form>
        <?php
        echo "<br><h2>Welcome to your wall, " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </h2><br><br>";
        foreach ($data['products'] as $product) {
            echo "<label>$product->caption</label>";
            echo "<label>$product->description</label>";
            echo "<label>$product->price</label>";
        }
        ?>
    </body>
</html>