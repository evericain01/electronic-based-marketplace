<html>
    <head>
        <title><?= _("Update Wallet") ?></title>
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

        <h3><?= _("Update Your Wallet") ?>:</h3><br>
        <form method="post" action="">
            <label><?= _("Wallet") ?>:<br><input type="number" step="0.01" name="budget" 
                                              value="<?= $data->budget ?>"/></label><br /><br>
            <input type="submit" name="action" value="Submit changes" />

        </form>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel") ?></a>
    </body>
</html>