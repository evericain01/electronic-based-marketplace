<html>

    <head><title>Confirmation Page")?></title>
    </head>
    <body>
        <h1><?= _("Confirm Payment") ?>?</h1>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }

        </style>

        <?php
        $buyer_id = $data['buyer']->buyer_id;
        echo "<br><h2><b><a href='" . BASE . "/Cart/checkout/$buyer_id'>" . _("YES") . "!</a></b></h2>";
        echo "<h2><b><a href='" . BASE . "/Cart/index'>" . _("NO") . ".</a></b></h3>";
        ?>

    </body>
</html>
