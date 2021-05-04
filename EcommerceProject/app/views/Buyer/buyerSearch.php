<html>
    <head>

        <title><?= _("Search Results")?></title>
    </head>
    <body>
        <?php
        echo '<b>". _("Results for search").", "<i>' . $data['keyword'] . '</i>":</b><br><br><br>';
        foreach ($data['products'] as $products) {
                echo "<img src='" . BASE . "/uploads/$products->filename' width='120' height='90'/><br><br>";
                echo "<b>$products->caption</b> ";
                echo "(<i>$products->description</i>)<br>";
                echo "$$products->price CAD<br>";
                echo "[". _("STOCK").": $products->quantity]<br>";
                echo "<a href='" . BASE . "/Cart/addToCart/$products->product_id'>". _("ADD TO CART")."</a><br><br><br><br>";
        }

        if (empty($products)) {
            echo _("No products contains the value").",   $data[keyword]. "._("(Please input a valid product caption (name),)");
        }
        echo "<br>";
        ?>

        <a href="<?= BASE ?>/Buyer/index">&#8592 <?= _("Go Back to Home Page")?></a>
    </body>
</html>


