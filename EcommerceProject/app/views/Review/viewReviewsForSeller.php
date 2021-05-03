<html>
    <head><title>View Review</title>
    </head>
    <body>
        <h2>Viewing all Reviews:</h2> <br />
        <?php

            foreach ($data['reviews'] as $review) {
                foreach ($data['buyer'] as $buyer) {
                echo "Review By: <b>$buyer->first_name $buyer->last_name</b><br><br>";
                echo "Rating: $review->rate<br><br>";
                echo "Review: $review->text_review</b><br>";
                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            }
        }

        echo "<br><br><br>";
        ?>
        <a href="<?= BASE ?>/Seller/index">&#8592 Go Back to Home Page</a>
    </body>
</html>

