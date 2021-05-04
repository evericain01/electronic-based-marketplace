<html>

    <head>
        <title><?= _("Create Seller Profile")?></title>
    </head>
    <body>
        <h4><?= _("Create Your Seller Profile")?>:</h4>
 
        <form method="post" action="">
            <label><?= _("First Name")?>: <input type="text" name="first_name" /></label><br />
            <label><?= _("Last Name")?>: <input type="text" name="last_name" /></label><br />
            <label><?= _("Company/Brand Name")?>: <input type="text" name="brand_name" /></label><br />

            <input type="submit" name="action" value="<?= _("Submit changes")?>" />

        </form>

    </body>
</html>