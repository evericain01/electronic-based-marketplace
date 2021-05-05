<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Create Seller Profile") ?></title>
    </head>
    <body>
        <h3><?= _("Create Your Seller Profile") ?>:</h3>

        <form method="post" action="">
            <label><?= _("First Name") ?>:<br> <input type="text" name="first_name" placeholder="First Name" /></label><br /> <br>
            <label><?= _("Last Name") ?>:<br> <input type="text" name="last_name" placeholder="Last Name"/></label><br /> <br>
            <label><?= _("Company/Brand Name") ?>:<br> <input type="text" name="brand_name" placeholder="Company/Brand Name"/></label><br /> <br>

            <input type="submit" name="action" value="<?= _("Submit changes") ?>" />

        </form>

    </body>
</html>