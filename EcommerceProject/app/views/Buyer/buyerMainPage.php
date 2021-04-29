<html>
    <head>
        <title>Wall</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Search for product: <input type="text" name="keyword"/></label><br />
        </form>
        <?php
        $tabRepeat = str_repeat("&emsp;", 8);
        echo "<br><h2>Welcome to the Market, " . $data['buyer']->first_name .
        " " . $data['buyer']->last_name . "! </h2><br><br>$tabRepeat";
        
        echo "<a href='" . BASE . "/Default/editBuyerPassword'>Change Password </a>&#124;";
        
        echo "<a href='" . BASE . "/Default/logout'> Logout</a><br><br>";
        
        foreach ($data['products'] as $product) {
            echo "<label>$product->caption</label>";
            echo "<label>$product->description</label>";
            echo "<label>$product->price</label>";
        }
        ?>
    </body>
</html>