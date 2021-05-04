<html>
    <head>
        <title><?= _("Seller Main Page")?></title>
    </head>
    <body>
        <style>
            h1, h2, h3{ 
                display: inline;
            }
        </style>
        <?php
        
        echo "<h1>". _("Welcome").", " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "! <h3>(<i><u>Company Name: " . $data['seller']->brand_name . "</u></i>)</h3></h1>";

        echo "<a href='" . BASE . "/Default/logout'style='display:inline; float:right;'> &#124; ". _("Logout")."</a>";
        echo "<a href='" . BASE . "/Default/editSellerPassword' style='display:inline; float:right;'>". _("Change Password")." &#124;</a><br><br>";
        
        $seller_id = $data['seller']->seller_id;
        echo "<br><a href='" . BASE . "/Product/add/$seller_id'>". _("ADD A PRODUCT")."</a><br><br>";
        
        echo "<br><h3>". _("Here are your prodcuts on sale").":</h3><br><br><br>";
        echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
    
        foreach ($data['products'] as $product) {
            if ($product->seller_id == $data['seller']->seller_id) {
                echo "<img src='" . BASE . "/uploads/$product->filename' width='130' height='90'/><br><br>";
                echo "<label><b>$product->caption</b></label> ";
                echo "<label>($product->description)</label><br>";
                echo "<label>$$product->price CAD</label><br>";
                echo "<label>[". _("STOCK").": $product->quantity]</label><br>";
                echo "<a href='" . BASE . "/Review/reviewSellerIndex/$product->product_id'>". _("View Reviews")."</a><br>";
                echo "<a href='" . BASE . "/Product/edit/$product->product_id'>". _("EDIT")."</a> &#124 ";
                echo "<a href='" . BASE . "/Product/delete/$product->product_id'>". _("REMOVE")."</a><br><br>";
                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            }
        }
        ?>
    </body>
</html>