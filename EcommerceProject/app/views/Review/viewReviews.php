<html>
    <head><title>View Review</title>
    </head>
    <body>
        <h2>Viewing all Reviews:</h2> <br />
        <?php
        foreach ($data['reviews'] as $review) {
            $buyer_first_name = $data['buyer']->first_name;
            $buyer_last_name = $data['buyer']->last_name;
            
            echo "Review By: <b>$buyer_first_name, $buyer_last_name</b><br><br>";
            echo "Rating: $review->rate<br><br>";
            echo "Review: $review->text_review</b><br>";
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
        }

        echo "<br><br><br>";
        ?>
        <a href="<?= BASE ?>/Buyer/index">&#8592 Go Back to Home Page</a>
    </body>
</html>

