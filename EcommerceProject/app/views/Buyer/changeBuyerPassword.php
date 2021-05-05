<html>
    <head>
        <title><?= _("Changing Password") ?></title>
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }
        </style>

        <h3><?= _("Changing Password") ?>:</h3>
        <br>
        <form method="post" action="">
            <label><?= _("Old Password") ?>:<br> <input type="password" name="oldPassword"/></label><br><br>
            <label><?= _("New Password") ?>:<br> <input type="password" name="newPassword"/></label><br><br>
            <label><?= _("ReType Password") ?>:<br> <input type="password" name="reTypePassword"/></label><br><br><br>
            <input type="submit" name="action" value="<?= _("Submit changes") ?>" />
        </form>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel") ?></a>
    </body>
</html>