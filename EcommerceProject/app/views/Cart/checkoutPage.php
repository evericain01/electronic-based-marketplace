<html>

    <head><title>Confirmation Page")?></title>
    </head>
    <body>
        <h2><?= _("Confirm Payment")?>:</h2>
        
        <?php
        $buyer_id = $data['buyer']->buyer_id;
        echo "<br><b><a href='" . BASE . "/Cart/checkout/$buyer_id'>". _("YES")."!</a></b>";
        echo "<br><br><b><a href='" . BASE . "/Cart/index'>". _("NO").".</a></b>";
        ?>
        
    </body>
</html>
