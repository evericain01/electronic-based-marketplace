<html>
    <head><title>Upload an image file</title>
    </head>
    <body>
    public $product_id;
    public $seller_id;
    public $caption;
    public $filename;
    public $description;
    public $quantity;
    public $price;

        <h4>Uploading an Picture</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Caption: <input type="text" name="caption" /></label><br />
            <label>Caption: <input type="text" name="description" /></label><br />
            <label>Caption: <input type="number" name="quantity" /></label><br />
            <label>Caption: <input type="number" step=".01" name="price" /></label><br />
            <label>Select an image file to upload: <input type= "file" name="myImage" /></label><br>
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Profile/index">Cancel</a>
    </body>
</html>