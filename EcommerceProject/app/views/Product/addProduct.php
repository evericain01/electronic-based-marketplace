<html>
    <head><title><?= _("Add Product") ?></title>
    </head>
    <body>
        <h3><?= _("Add Product") ?>(s)</h3>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }

            .column {
                float: left;
                width: 24%;
                padding: 35px;
            }

            .row {
                clear: both;
                display: table;
            }

            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
    </style>
    <form action="" method="post" enctype="multipart/form-data">
        <label><?= _("Name") ?>:<br> <input type="text" name="caption" /></label><br /><br>
        <label><?= _("Description") ?>: <br>
            <textarea name="description"><?= $data['product']->description ?></textarea>
        </label><br><br>
        <label><?= _("Stock") ?>: <input type="number" name="quantity" /></label><br />
        <label><?= _("Price") ?>: <input type="number" step=".01" name="price" /></label><br /><br>
        <label><?= _("Select the product's image") ?>:<br>&emsp;&emsp;&emsp;&emsp;&emsp;<input type= "file" name="myImage" /></label><br> <br>
        <input type="<?= _("submit") ?>" name="action" />
    </form>
    <a href="<?= BASE ?>/Seller/index"><?= _("Cancel") ?></a>
</body>
</html>