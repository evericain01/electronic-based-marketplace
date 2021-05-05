<html>
    <head>
        <title><?= _("Register an account") ?></title>
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;;
                font-family: 'Roboto', sans-serif;
            }
        </style>
        
        <h1>Register an Account:</h1>
        
        <form method="post" action="">
            <label><?= _("Username") ?>:<br> <input type="text" name="username" placeholder="Username" /></label><br /><br>
            <label><?= _("Password") ?>:<br> <input type="password" name="password" placeholder="Password" /></label><br /><br>
            <label><?= _("Password confirmation") ?>:<br> <input type="password" name="password_confirm" placeholder="Re-type Password"/></label><br /><br>

            Select a type of account:
            <select name="user_role">
                <option value="seller"> <?= _("Seller") ?> </option>
                <option value="buyer"> <?= _("Buyer") ?> </option>
            </select> <br><br>

            <input type="submit" name="action" value="<?= _("Register") ?>" />

        </form>
        
        <a href="<?= BASE ?>/Default/login"><?= _("Already have an account") ?>? <?= _("Login") ?>.</a>
    </body>
</html>