<html>
    <head>
        <title>Buyer Main Page</title>
    </head>
    <body>
        <style>
            h2, h3{ 
                display: inline;
            }
        </style>

        <?php
        echo "<h2>Welcome to the Market, " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </h2>";

        echo "<a href='" . BASE . "/Default/logout' style='display:inline; float:right;'> &#124; Logout</a>";
        echo "<a href='" . BASE . "/Default/editBuyerPassword' style='display:inline; float:right;'>Change Password &#124;</a><br><br>";
        echo "<b>Wallet:</b> " . "$" . $data['buyer']->budget;
        echo " <a href='" . BASE . "/Buyer/updateBudget' style='font-size: 13px;'>[EDIT WALLET] </a>";
        echo " <a href='" . BASE . "/Invoice/index' style='font-size: 20px; display:inline; float:right;'> &#124; View All Orders</a>";
        echo " <a href='" . BASE . "/Cart/index' style='font-size: 20px; display:inline; float:right;'>View Your Cart &#124;</a><br>";
        echo "<br><br>";

        echo "<form method='post' action=''>";
        echo "<label>Search for a product: <input type='text' name='keyword'/> </label>";
        echo "<input type='submit' name='action' value='Search!'/><br><br>";
        echo "</form>";
        
        echo "<h3>Viewing all products available:</h3><br><br><br>";
        echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";

        
        foreach ($data['products'] as $product) {
            foreach ($data['sellers'] as $sellers) {
                if ($product->seller_id == $product->seller_id) {
                    echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                    echo "<label><b><i>Sold by: </b>$sellers->brand_name</i></label><br><br>";
                    echo "<label><b>$product->caption</b></label> ";
                    echo "<label>($product->description)</label><br>";
                    echo "<label>$$product->price CAD</label><br>";
                    echo "<label>[STOCK: $product->quantity]</label><br>";
                    echo "<a href='" . BASE . "/Cart/addToCart/$product->product_id'>ADD TO CART</a><br><br>";
                    echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
                }
            }
        }
        ?>
    </body>
</html>