<html>

    <head><title><?= _("Edit Product")?></title>
    </head>
    <body>
        <h4><?= _("Editing this Product")?>:</h4>
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
        <form action="" method="post">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='150' height='100'/><br><br>
            <label><?= _("Name")?>: <input type="text" name="caption" size="30" value="<?= $data->caption ?>"/></label><br /> <br />
            <label><?= _("Description")?>: <br>
                <textarea name="description"><?= $data->description ?></textarea>
            </label><br><br>
            <label><?= _("Stock")?>: <input type="number" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label><?= _("Price")?>: <input type="number" step=".01" name="price" value="<?= $data->price ?>"/></label><br /> <br />
            <input type="submit" name="action" value="<?= _("Submit changes")?>" />
        </form>
        <a href="<?= BASE ?>/Seller/index"><?= _("Cancel")?></a> 
    </body>
</html>