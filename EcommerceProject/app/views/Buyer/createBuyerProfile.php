<html>
    <head>
        <title><?= _("Create Buyer Profile") ?></title>
    </head>
    <body>
        <h3><?= _("Create Your Buyer Profile") ?>:</h3>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }
        </style>

        <form method="post" action="">
            <label><?= _("First Name") ?>:<br> <input type="text" name="first_name" placeholder="First Name"/></label><br /> <br>
            <label><?= _("Last Name") ?>:<br> <input type="text" name="last_name" placeholder="Last Name"/></label><br /> <br>
            <label><?= _("Budget") ?>:<br> <input type="number" step="0.01" name="budget" placeholder="Budget"/></label><br /> <br>

            <input type="submit" name="action" value="Submit changes" />

        </form>

    </body>
</html>