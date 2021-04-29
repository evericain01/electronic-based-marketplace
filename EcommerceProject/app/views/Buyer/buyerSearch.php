<html>
    <head>
        <title>Search Results</title>
    </head>
    <body>
        <?php
        echo '<b>Results for search, "<i>' . $data['keyword'] . '</i>":</b><br><br><br>';
        foreach ($data['products'] as $products) {
                echo "<img src='" . BASE . "/uploads/$products->filename' width='250' height='200'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[STOCK: $products->quantity]<br>";
                echo "<a href='" . BASE . "/Cart/addToCart/$products->product_id'>ADD TO CART</a><br><br><br><br>";
        }

        if (empty($products)) {
            echo 'No products contains the value, "' . $data['keyword'] . '". (Please input a valid product caption (name),)';
        }
        echo "<br><br><br>";
        ?>

        <a href="<?= BASE ?>/Buyer/index">&#8592 Go Back to Home Page</a>
    </body>
</html>


