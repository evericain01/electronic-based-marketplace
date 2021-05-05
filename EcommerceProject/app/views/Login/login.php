<html>
    <head>
        <title><?= _("Log into an account") ?></title>

        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">

    </head>
    <body>
        <?php
        if (isset($_GET['error']))
            echo $_GET['error'];
        ?>

        <h1>Electronics Marketplace</h1>
        <form method="post" action="">
            <label><?= _("Username") ?>: <br><input type="text" name="username" placeholder="Username" /></label><br /><br>
            <label><?= _("Password") ?>: <br><input type="password" name="password" placeholder="Password" /></label><br /><br>

            <button type="submit" name="action" value="Login">Login</button><br><br>

            <a href='?lang=en'><?= _("English") ?></a> &#124;
            <a href='?lang=fr'><?= _("French") ?></a> <br /><br>

        </form>
        <a href="<?= BASE ?>/Default/register"><?= _("Register Here") ?>!</a>
    </body>
</html>