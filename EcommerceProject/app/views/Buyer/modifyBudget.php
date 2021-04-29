<html>
    <head>
        <title>Update Wallet</title>
    </head>
    <body>
        <h4>Update Your Wallet:</h4>
        <form method="post" action="">
            <label>Wallet: <input type="number" step="0.01" name="budget" 
                                  value="<?= $data->budget ?>"/></label><br />
            <input type="submit" name="action" value="Submit changes" />

        </form>
            <a href="<?= BASE ?>/Buyer/index">Cancel</a>
    </body>
</html>