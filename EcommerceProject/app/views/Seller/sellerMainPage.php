<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <style>
            h2 { 
                display: inline;
            }
        </style>
        <?php
        $tabRepeat = str_repeat("&emsp;", 8);
        echo "<h2>Welcome to your wall, " . $data['seller']->first_name .
        " " . $data['seller']->last_name . "! </h2>$tabRepeat";

        echo "<a href='" . BASE . "/Default/editSellerPassword'>Change Password </a>&#124;";
        
        echo "<a href='" . BASE . "/Default/logout'> Logout</a><br><br>";
        
        $seller_id = $data['seller']->seller_id;
        echo "<a href='" . BASE . "/Product/add/$seller_id'>Add a Product</a><br><br>";
        
        foreach ($data['products'] as $product) {
            if($product->seller_id == $data['seller']->seller_id) {
            echo "<img src='" . BASE . "/uploads/$product->filename' width='300' height='200'/><br><br>";
            echo "<label><b>$product->caption</b></label> ";
            echo "<label>(<i>$product->description</i>)</label><br>";
            echo "<label>$$product->price CAD</label><br><br><br><br>";
            }
        }
        ?>
    </body>
</html>