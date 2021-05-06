<html>
    <head>
        <link rel="stylesheet" href="<?= BASE ?>/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title>Login validation</title>
    </head>
    <body>
        Validate your login by providing your 6-digit passcode. <br><br>
        <form method="post" action="">
            <label>Current code:<input type="text" name="currentCode" /></label><br><br>
            <input type="submit" name="action" class="btn btn-info" value="Verify code" />
        </form>
        <a href="<?= BASE ?>/Login/login">&#8592 Go Back to Login</a>
    </body>
</html>