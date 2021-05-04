
<html>

    <head><title><?= _("Edit Review")?></title>
    </head>
    <body>
        <h2><?= _("Editing Review")?></h2>
        <style>
            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
        <form action="" method="post" enctype="multipart/form-data">

            <label><?= _("Change Rating")?>:</label>
            <select name="rate" value=<?= $data->rate ?>>
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4/5</option>
                <option value="5">5/5</option>
            </select> <br><br>

            <label><?= _("Change Review")?>: <br>
                <textarea name="text_review" value = <?= $data->text_review ?>></textarea>
            </label><br><br>
            
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Buyer/index"><?= _("Cancel")?></a>
    </body>
</html>

