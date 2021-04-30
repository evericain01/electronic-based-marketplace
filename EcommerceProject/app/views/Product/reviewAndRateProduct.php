<html>
    <head><title>Review Product</title>
    </head>
    <body>
        <h4>Reviewing this Product:</h4>
        <?php
        foreach ($data['products'] as $products) {
            echo "<img src='" . BASE . "/uploads/$products->filename' width='250' height='200'/><br><br>";
            echo "<b>$products->caption</b> ";
            echo "(<i>$products->description</i>)<br>";
            echo "$$products->price CAD<br>";
            echo "[STOCK: $products->quantity]<br>";
            echo "<a href='" . BASE . "/Cart/addToCart/$products->product_id'>ADD TO CART</a><br><br><br><br>";
        }

        echo "<br><br><br>";
        ?>

        <label> Rate:
            <select name="rate">
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
            </select>
        </label><br><br>
                    <label>Write a Review: <br>
                <textarea name="review"><?= $data->description ?></textarea>
            </label><br><br>
        <input type="submit" name="action" />


        <a href="<?= BASE ?>/Buyer/index">&#8592 Go Back to Home Page</a>
    </body>
</html>

