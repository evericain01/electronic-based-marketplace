<html>
    <head>
        <title><?= _("Buyer Main Page")?></title>
    </head>
    <body>
        <style>
            h1, h2, h3{ 
                display: inline;
            }
        </style>

        <?php
        echo "<h1>". _("Welcome to the Market").", " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </h1>";

        echo "<a href='" . BASE . "/Default/logout' style='display:inline; float:right;'> &#124; ". _("Logout")."</a>";
        echo "<a href='" . BASE . "/Default/editBuyerPassword' style='display:inline; float:right;'>". _("Change Password")." &#124;</a><br><br><br>";
        echo "<h3><u>". _("Wallet").":</u> " . "<b><span style='color:#189200;text-align:center;'>$" . $data['buyer']->budget . "</b></h3></span>";
        echo " &mdash;";
        echo " <a href='" . BASE . "/Buyer/updateBudget' style='font-size: 15px;'>[". _("EDIT WALLET")."] </a>";
        echo " <a href='" . BASE . "/Invoice/index' style='font-size: 20px; display:inline; float:right;'> &#124; ". _("View All Orders")."</a>";
        echo " <a href='" . BASE . "/Cart/index' style='font-size: 20px; display:inline; float:right;'>". _("View Your Cart")." &#124;</a><br>";
        echo "<br><br>";

        echo "<form method='post' action=''>";
        echo "<label>". _("Search for a product").": <input type='text' name='keyword'/> </label>";
        echo "<input type='submit' name='action' value='Search!'/><br><br>";
        echo "</form>";

        echo "<h3>". _("Viewing all products available").":</h3><br><br><br>";
        echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";


        foreach ($data['products'] as $product) {
            foreach ($data['sellers'] as $sellers) {
                if ($product->seller_id == $product->seller_id) {
                    if ($product->quantity >= 1) {
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                        echo "<label><b><i>". _("Sold by").": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label> ";
                        echo "<label>($product->description)</label><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<label>[". _("STOCK").": $product->quantity]</label><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id'>". _("View Reviews")."</a><br>";
                        echo "<a href='" . BASE . "/Cart/addToCart/$product->product_id'>". _("ADD TO CART")."</a><br><br>";
                        echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                    } else {
                        echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                        echo "<label><b><i>". _("Sold by").": </b>$sellers->brand_name</i></label><br><br>";
                        echo "<label><b>$product->caption</b></label> ";
                        echo "<label>($product->description)</label><br>";
                        echo "<label>$$product->price CAD</label><br>";
                        echo "<span style='color:#C77800;text-align:center;'> ". _("No more stock of this product").".</span><br>";
                        echo "<a href='" . BASE . "/Review/index/$product->product_id'>". _("View Reviews")."</a><br>";
                        echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                    }
                }
            }
        }
        ?>
    </body>
</html>