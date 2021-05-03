<html>
    <head>
        <title>Register an account</title>
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo $_GET['error'];
        }
        ?>
        <form method="post" action="">
            <label>Username: <input type="text" name="username" /></label><br />
            <label>Password: <input type="password" name="password" /></label><br />
            <label>Password confirmation: <input type="password" name="password_confirm" /></label><br />
            <label>Password: <input type="password" name="password" /></label><br /> <br />
            
            Select a type of account:
            <select name="user_role">
                <option value="seller"> Seller </option>
                <option value="buyer"> Buyer </option>
            </select> <br><br>

            <input type="submit" name="action" value="Register" />

        </form>
        <a href="<?= BASE ?>/Default/login">Already have an account? Login.</a>
    </body>
</html>