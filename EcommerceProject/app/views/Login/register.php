<html>
    <head>
        <title><?= _("Register an account")?></title>
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        }
        ?>
        <form method="post" action="">
            <label><?= _("Username")?>: <input type="text" name="username" /></label><br />
            <label><?= _("Password")?>: <input type="password" name="password" /></label><br />
            <label><?= _("Password confirmation")?>: <input type="password" name="password_confirm" /></label><br />
            <label><?= _("Password")?>: <input type="password" name="password" /></label><br /> <br />
            
            Select a type of account:
            <select name="user_role">
                <option value="seller"> <?= _("Seller")?> </option>
                <option value="buyer"> <?= _("Buyer")?> </option>
            </select> <br><br>

            <input type="submit" name="action" value="<?= _("Register")?>" />

        </form>
        <a href="<?= BASE ?>/Default/login"><?= _("Already have an account")?>? <?= _("Login")?>.</a>
    </body>
</html>