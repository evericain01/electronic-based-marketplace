<html>
    <head><title>Add Product</title>
    </head>
    <body>
        <h4>Add a Product</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Caption: <input type="text" name="caption" /></label><br />
            <label>Description: <input type="text" name="description" /></label><br />
            <label>Quantity: <input type="number" name="quantity" /></label><br />
            <label>Price: <input type="number" step=".01" name="price" /></label><br />
            <label>Select the product's image: <input type= "file" name="myImage" /></label><br>
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Seller/index">Cancel</a>
    </body>
</html>