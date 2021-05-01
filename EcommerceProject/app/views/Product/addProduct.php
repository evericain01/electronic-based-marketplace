<html>
    <head><title>Add Product</title>
    </head>
    <body>
        <h4>Add Product(s)</h4>
                <style>
            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Name: <input type="text" name="caption" /></label><br />
            <label>Description: <br>
                <textarea name="description"><?= $data['product']->description ?></textarea>
            </label><br><br>
            <label>Stock: <input type="number" name="quantity" /></label><br />
            <label>Price: <input type="number" step=".01" name="price" /></label><br />
            <label>Select the product's image: <input type= "file" name="myImage" /></label><br> <br>
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Seller/index">Cancel</a>
    </body>
</html>