<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Seller Main Page") ?></title>

    </head>

    <body>
        <?php
        
        echo "<div class='homePageTitle'>" . _("Welcome") . ", " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "!</div>";
        
        echo "<div class='language'><a href='?lang=en'>" . _("English") . "</a> &#124; ";
        echo "<a href='?lang=fr'>" . _("French") . "</a></div><br><br>";


        echo "<a href='" . BASE . "/Default/logout'style='float:right;'> &#124; " . _("Logout") . "</a>";
        echo "<a href='" . BASE . "/Default/editSellerPassword' style='float:right;'>" . _("Change Password") . " &#124;</a>";

        $seller_id = $data['seller']->seller_id;
        echo "<a href='" . BASE . "/Product/add/$seller_id' style='display:inline; float:left;'>" . _("ADD A PRODUCT") . "</a><br><br>";

        echo "<h3><i>" . _("Company Name") . ": " . $data['seller']->brand_name . "</i></h3>";

        echo "<br><h1>" . _("Your products on sale") . ":</h1><br>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'>";


        echo "<div class='row'>";
        foreach ($data['products'] as $product) {
            if ($product->seller_id == $data['seller']->seller_id) {
                echo "<div class='column'>";
                echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                echo "<label><b>$product->caption</b></label><br>";
                echo "<label>($product->description)</label><br><br>";
                echo "<label>$$product->price CAD</label><br>";
                echo "<label>[" . _("STOCK") . ": $product->quantity]</label><br>";
                echo "<a href='" . BASE . "/Review/reviewSellerIndex/$product->product_id'>" . _("View Reviews") . "</a><br>";
                echo "<a href='" . BASE . "/Product/edit/$product->product_id'>" . _("MODIFY") . "</a> &#124 ";
                echo "<a href='" . BASE . "/Product/delete/$product->product_id'>" . _("REMOVE") . "</a><br><br>";
                echo "</div>";
            }
        }
        echo "</div>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        ?>
    </body>
</html>