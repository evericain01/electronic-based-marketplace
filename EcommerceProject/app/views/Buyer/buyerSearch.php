<html>
    <head>

        <title><?= _("Search Results") ?></title>
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }

            .search {
                text-align: left;
            }
        </style>


        <?php
        echo "<h2><b>" . _("Results for search") . ", <i>" . $data['keyword'] . "</i>:</b></h2><br><br><br>";
        foreach ($data['products'] as $products) {

            if ($products->quantity >= 1) {
                echo "<div class='search'>";
                echo "<img src='" . BASE . "/uploads/$products->filename' width='120' height='90'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[" . _("STOCK") . ": $products->quantity]<br>";
                echo "<a href='" . BASE . "/Cart/addToCart/$products->product_id'>" . _("ADD TO CART") . "</a><br><br><br><br>";
                echo "</div>";
            } else {
                echo "<div class='search'>";
                echo "<img src='" . BASE . "/uploads/$products->filename' width='120' height='90'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[" . _("STOCK") . ": $products->quantity]<br>";
                echo "<span style='color:#C77800;text-align:center;'> " . _("No more stock of this product") . ".</span><br>";
                echo "</div>";
            }
        }

        if (empty($products)) {
            echo _("No products contains the value") . ",   $data[keyword]. " . _("(Please input a valid product caption (name),)");
        }
        echo "<br>";
        ?>

        <a href="<?= BASE ?>/Buyer/index">&#8592 <?= _("Go Back to Home Page") ?></a>
    </body>
</html>


