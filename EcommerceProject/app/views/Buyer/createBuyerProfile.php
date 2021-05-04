<html>
    <head>
        <title><?= _("Create Buyer Profile")?></title>
    </head>
    <body>
        <h4><?= _("Create Your Buyer Profile")?>:</h4>
 
        <form method="post" action="">
            <label><?= _("First Name")?>: <input type="text" name="first_name" /></label><br />
            <label><?= _("Last Name")?>: <input type="text" name="last_name" /></label><br />
            <label><?= _("Budget")?>: <input type="number" step="0.01" name="budget" /></label><br />

            <input type="submit" name="action" value="Submit changes" />

        </form>

    </body>
</html>