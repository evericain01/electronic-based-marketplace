<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Edit Product") ?></title>
    </head>
    <body>
        <h4><?= _("Editing this Product") ?>:</h4>
        <form action="" method="post">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='150' height='100'/><br><br>
            <label><?= _("Name") ?>: <input type="text" name="caption" size="30" value="<?= $data->caption ?>"/></label><br /> <br />
            <label><?= _("Description") ?>: <br>
                <textarea name="description"><?= $data->description ?></textarea>
            </label><br><br>
            <label><?= _("Stock") ?>: <input type="number" step="1" min="0" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label><?= _("Price") ?>: <input type="number" step="1" min="0" name="price" value="<?= $data->price ?>"/></label><br /> <br />
            <input type="submit" name="action" value="<?= _("Submit changes") ?>" />
        </form>
        <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a> 
    </body>
</html>