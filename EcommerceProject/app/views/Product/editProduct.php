<html>
    <head><title>Edit Product</title>
    </head>
    <body>
        <h4>Editing this Product:</h4>
        <style>
            textarea {
                width: 238px;
                height: 80px;
            }
        </style>
        <form action="" method="post">
            <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' width='150' height='100'/><br><br>
            <label>Name: <input type="text" name="caption" value="<?= $data->caption ?>"/></label><br /> <br />
            <label>Description: <br>
                <textarea name="description"><?= $data->description ?></textarea>
            </label><br><br>
            <label>Stock: <input type="number" name="quantity" value="<?= $data->quantity ?>"/></label><br />
            <label>Price: <input type="number" step=".01" name="price" value="<?= $data->price ?>"/></label><br /> <br />
            <input type="submit" name="action" />
        </form>
        <a href="<?= BASE ?>/Seller/index">Cancel</a> 
    </body>
</html>