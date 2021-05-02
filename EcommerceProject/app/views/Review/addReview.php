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

            <label>Rate:</label>
                <select name="rate" value=>
                    <option value="1">Volvo</option>
                    <option value="2">Saab</option>
                    <option value="3">Mercedes</option>
                    <option value="4">Mercedes</option>
                    <option value="5">Audi</option>
                </select>

            <label>Comments: <br>
                <textarea name="text_review"></textarea>
            </label><br><br>
        </form>
        <a href="<?= BASE ?>/Seller/index">Cancel</a>
    </body>
</html>

