<html>
    <head><title>Upload an image file</title>
    </head>
    <body>

        <h4>Uploading an Picture</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Caption: <input type="text" name="caption" value="<?= $data->caption ?>"/></label><br />
            <label>Description: <input type="text" name="description" value="<?= $data->description ?>"/></label><br />
            <label>Quantity: <input type="number" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label>Price: <input type="number" step=".01" name="price" value="<?= $data->price ?>"/></label><br />
            <input type="submit" name="action" />
        </form>
        <!-- <a href="<?= BASE ?>/Seller/index">Cancel</a> -->
    </body>
</html>