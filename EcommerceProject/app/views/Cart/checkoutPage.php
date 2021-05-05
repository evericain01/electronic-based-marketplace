<html>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
    <head><title>Confirmation Page")?></title>
    </head>
    <body>
        <h1><?= _("Confirm Payment") ?>?</h1>

        <?php
        $buyer_id = $data['buyer']->buyer_id;
        echo "<br><h2><b><a href='" . BASE . "/Cart/checkout/$buyer_id'>" . _("YES") . "!</a></b></h2>";
        echo "<h2><b><a href='" . BASE . "/Cart/index'>" . _("NO") . ".</a></b></h3>";
        ?>

    </body>
</html>
