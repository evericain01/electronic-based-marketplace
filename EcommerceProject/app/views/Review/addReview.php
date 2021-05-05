<html>
    <head><title><?= _("Add Review") ?></title>
    </head>
    <body>
        <h2><?= _("Adding a Review") ?></h2>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }
            
            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
        <form action="" method="post" enctype="multipart/form-data">

            <label><?= _("Rate") ?>:</label>
            <select name="rate" value= "">
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4/5</option>
                <option value="5">5/5</option>
            </select> <br><br>

            <label><?= _("Write a Review") ?>: <br>
                <textarea name="text_review" value = ""></textarea>
            </label><br><br>

            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel") ?></a>
    </body>
</html>