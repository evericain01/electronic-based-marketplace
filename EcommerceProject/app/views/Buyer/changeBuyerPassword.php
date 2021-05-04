<html>
    <head>
        <title><?= _("Changing Password")?></title>
    </head>
    <body>
        <h4>Changing Password:</h4>
        <form method="post" action="">
            <label><?= _("Old Password")?>: <input type="password" name="oldPassword"/></label><br>
            <label><?= _("New Password")?>: <input type="password" name="newPassword"/></label><br>
            <label><?= _("ReType Password")?>: <input type="password" name="reTypePassword"/></label><br><br><br>
            <input type="submit" name="action" value="Submit changes" />
        </form>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel")?></a>
    </body>
</html>