<html>
    <head><title>Edit Product</title>
    </head>
    <body>
        <h4>Editing this Product:</h4>
        <form action="" method="post">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='250' height='200'/><br><br>
            <label>Caption: <input type="text" name="caption" value="<?= $data->caption ?>"/></label><br />
            <label>Description: <br>
                <textarea name="description"><?= $data->description ?></textarea>
            </label><br><br>
            <label>Quantity: <input type="number" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label>Price: <input type="number" step=".01" name="price" value="<?= $data->price ?>"/></label><br />
            <input type="submit" name="action" />
        </form>
         <a href="<?= BASE ?>/Seller/index">Cancel</a> 
    </body>
</html>