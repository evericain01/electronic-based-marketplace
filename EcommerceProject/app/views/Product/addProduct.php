<html>
    <head><title><?= _("Add Product")?></title>
    </head>
    <body>
        <h4><?= _("Add Product")?>(s)</h4>
                <style>
            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
        <form action="" method="post" enctype="multipart/form-data">
            <label><?= _("Name")?>: <input type="text" name="caption" /></label><br />
            <label><?= _("Description")?>: <br>
                <textarea name="description"><?= $data['product']->description ?></textarea>
            </label><br><br>
            <label><?= _("Stock")?>: <input type="number" name="quantity" /></label><br />
            <label><?= _("Price")?>: <input type="number" step=".01" name="price" /></label><br />
            <label><?= _("Select the product's image")?>: <input type= "file" name="myImage" /></label><br> <br>
            <input type="<?= _("submit")?>" name="action" />
        </form>
        <a href="<?= BASE ?>/Seller/index"><?= _("Cancel")?></a>
    </body>
</html>