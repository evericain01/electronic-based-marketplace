<html>
    <head><title>Confirmation Page</title>
    </head>
    <body>
        <h2>Confirm Payment:</h2>
        
        <?php
        $buyer_id = $data['buyer']->buyer_id;
        echo "<br><b><a href='" . BASE . "/Cart/checkout/$buyer_id'>YES!</a></b>";
        echo "<br><br><b><a href='" . BASE . "/Cart/index'>NO.</a></b>";
        ?>
        
    </body>
</html>
