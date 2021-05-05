<html>
    <head>
        <title><?= _("Log into an account") ?></title>
<!--        <link rel="stylesheet" href="/css/style.css" type="text/css">-->
    </head>
    <body>
        <h1>Electronics Marketplace</h1>
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            button {
                color: black;
                background-color: #2ED000;
                border-radius: 3px;
                width: 60px;
                height: 30px;
            }

            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }
            
        </style>
            <form method="post" action="">
                <label><?= _("Username") ?>: <br><input type="text" name="username" placeholder="Username" /></label><br /><br>
                <label><?= _("Password") ?>: <br><input type="password" name="password" placeholder="Password" /></label><br /><br>

                <button type="submit" name="action" value="Login">Login</button>

            </form>
            <a href="<?= BASE ?>/Default/register"><?= _("Register Here") ?>!</a>
    </body>
</html>