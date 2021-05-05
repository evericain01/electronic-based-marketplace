<html>
    <head>
        <title><?= _("Choose Language") ?></title>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
        body {
            text-align: center;
            background-color: #BFBFBF;
            font-family: 'Roboto', sans-serif;
        }

    </style>
    
    <body>
        <label><?= _("Thank you for coming back. What language would you prefer") ?>? </label><br /> <br/>
        
        <a href='?lang=en'><?= _("English") ?></a> &#124;
        <a href='?lang=fr'><?= _("French") ?></a> <br /><br><br>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Proceed") ?>&rarr;</a> <br />

    </body>
</html>