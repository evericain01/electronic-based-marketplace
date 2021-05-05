<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= BASE ?>/css/style.css" type="text/css">
        <title><?= _("Add Product") ?></title>
    </head>
    <body>
        <h3><?= _("Add Product") ?>(s)</h3>
        <style>
    </style>
    <form action="" method="post" enctype="multipart/form-data">
        <label><?= _("Name") ?>:<br> <input type="text" name="caption" /></label><br /><br>
        <label><?= _("Description") ?>: <br>
            <textarea name="description"><?= $data['product']->description ?></textarea>
        </label><br><br>
        <label><?= _("Stock") ?>: <input type="number" step="1" min="0" name="quantity" /></label><br />
        <label><?= _("Price") ?>: <input type="number" step="1" min="0" name="price" /></label><br /><br>
        <label><?= _("Select the product's image") ?>:<br>&emsp;&emsp;&emsp;&emsp;&emsp;<input type= "file" name="myImage" /></label><br> <br>
        <input type="<?= _("submit") ?>" name="action" />
    </form>
    <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a>
</body>
</html>