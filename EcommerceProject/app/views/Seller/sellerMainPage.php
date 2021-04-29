<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <style>
            h2, h3{ 
                display: inline;
            }
        </style>
        <?php
        $tabRepeat = str_repeat("&emsp;", 8);
        echo "<h2>Welcome, " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "! <h3>(<u>Company Name: " . $data['seller']->brand_name . "</u></h3>)</h2>$tabRepeat";

echo "<a href='" . BASE . "/Default/logout'style='display:inline; float:right;'> Logout</a>";
        echo "<a href='" . BASE . "/Default/editSellerPassword' style='display:inline; float:right;'>Change Password &#124;</a><br><br>";
        
        $seller_id = $data['seller']->seller_id;
        echo "<br><a href='" . BASE . "/Product/add/$seller_id'>ADD A PRODUCT</a><br><br>";
        
        echo "<br><h3>Here are your prodcuts on sale:</h3><br><br><br>";
    
        foreach ($data['products'] as $product) {
            if ($product->seller_id == $data['seller']->seller_id) {
                echo "<img src='" . BASE . "/uploads/$product->filename' width='250' height='200'/><br><br>";
                echo "<label><b>$product->caption</b></label> ";
                echo "<label>(<i>$product->description</i>)</label><br>";
                echo "<label>$$product->price CAD</label><br>";
                echo "<label>[STOCK: $product->quantity]</label><br>";
                echo "<a href='" . BASE . "/Product/edit/$product->product_id'>EDIT</a> &#124 ";
                echo "<a href='" . BASE . "/Product/delete/$product->product_id'>DELETE</a><br><br><br><br>";
            }
        }
        ?>
    </body>
</html>