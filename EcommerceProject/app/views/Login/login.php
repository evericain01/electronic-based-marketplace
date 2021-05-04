<html>
    <head>
    
        <title><?= _("Log into an account")?></title>
    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>
        <form method="post" action="">
            <label><?= _("Username")?>: <input type="text" name="username" /></label><br />
            <label><?= _("Password")?>: <input type="password" name="password" /></label><br />

            <input type="submit" name="action" value="Login" />

        </form>
        <a href="<?= BASE ?>/Default/register"><?= _("Register Here")?>!</a>
    </body>
</html>