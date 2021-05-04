<html>

    <head>
        <title><?= _("Create Profile")?></title>
    </head>
    <body>
        <h4><?= _("Create Your Profile")?>:</h4>
 
        <form method="post" action="">
            <label><?= _("First Name")?>: <input type="text" name="first_name" value="<?= $data->first_name ?>"/></label><br />
            <label><?= _("Middle Name")?>: <input type="text" name="middle_name" value="<?= $data->brand_name ?>"/></label><br />
            <label><?= _("Last Name")?>: <input type="text" name="brand_name" value="<?= $data->last_name ?>"/></label><br />

            <input type="submit" name="action" value="<?= _("Submit changes")?>" />

        </form>

    </body>
</html>