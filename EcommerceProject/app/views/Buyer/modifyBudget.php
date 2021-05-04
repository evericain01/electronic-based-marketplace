<html>
    <head>
        <title><?= _("Update Wallet")?></title>
    </head>
    <body>
        <h4><?= _("Update Your Wallet")?>:</h4>
        <form method="post" action="">
            <label><?= _("Wallet")?>: <input type="number" step="0.01" name="budget" 
                                  value="<?= $data->budget ?>"/></label><br />
            <input type="submit" name="action" value="Submit changes" />

        </form>
            <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel")?></a>
    </body>
</html>