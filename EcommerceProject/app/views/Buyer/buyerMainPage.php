<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Buyer Main Page") ?></title>
    </head>
    <body>

        <?php
        echo "<div class='homePageTitle'>" . _("Welcome to the Market") . ", " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </div>";

        echo "<div class='language'><a href='?lang=en'>" . _("English") . "</a> &#124; ";
        echo "<a href='?lang=fr'>" . _("French") . "</a></div><br><br>";

        echo "<a href='" . BASE . "/Default/logout' style='display:inline; float:right;'> &#124; " . _("Logout") . "</a>";
        echo "<a href='" . BASE . "/Default/editBuyerPassword' style='display:inline; float:right;'>" . _("Change Password") . " &#124;</a><br><br><br>";

        echo "<div class='search'> <form method='post' action=''>";
        echo "<label>" . _("Search for a product") . ": <input type='text' name='keyword'/> </label>";
        echo "<input type='submit' name='action' value='" . _("Search") . "s!'/>";
        echo "</form></div>";

        echo " <a href='" . BASE . "/Invoice/index' style='font-size: 20px; display:inline; float:right;'> &#124; " . _("View All Orders") . "</a>";
        echo " <a href='" . BASE . "/Cart/index' style='font-size: 20px; display:inline; float:right;'>" . _("View Your Cart") . " &#124;</a><br><br><br>";

        echo "<u><span style='font-size:30px; float:left;'>" . _("Wallet") . ":</span></u>" . "<b><span style='color:#189200; font-size:30px; float:left;'>&nbsp;$" . $data['buyer']->budget . "</b></span><br>";
        echo "<br><a href='" . BASE . "/Buyer/updateBudget' style='display:inline; float:left;'>[" . _("EDIT WALLET") . "] </a>";

        echo "<br><br>";

        echo "<h1>" . _("Electronics Catalog") . ":</h1><br><br>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'>";

        echo "<div class='row'>";
        foreach ($data['products'] as $product) {
            foreach ($data['sellers'] as $sellers) {
                if ($product->seller_id == $sellers->seller_id) {
                    if ($product->quantity >= 1) {
                        echo "<div class='column'>";
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                        echo "<label><b><i>" . _("Sold By") . ": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label><br> ";
                        echo "<label>($product->description)</label><br><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<label>[" . _("STOCK") . ": $product->quantity]</label><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id'>" . _("View Reviews") . "</a><br>";
                        echo "<a href='" . BASE . "/Cart/addToCart/$product->product_id'>" . _("ADD TO CART") . "</a><br><br>";
                        echo "</div>";
                    } else {
                        echo "<div class='column'>";
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                        echo "<label><b><i>" . _("Sold by") . ": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label><br> ";
                        echo "<label>($product->description)</label><br><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<span style='color:#C77800;text-align:center;'> " . _("No more stock of this product") . ".</span><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id'>" . _("View Reviews") . "</a><br>";
                        echo "</div>";
                    }
                }
            }
        } 
        echo "</div>";
        echo "<hr style='width:100%;text-align:left;margin-left:0'><br>";
        ?>
    </body>
</html>