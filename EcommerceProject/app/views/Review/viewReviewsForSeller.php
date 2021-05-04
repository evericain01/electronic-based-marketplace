<html>
    <head><title><?= _("View Review")?></title>
    </head>
    <body>
        <h2><?= _("Viewing all Reviews")?>:</h2> <br />
        <?php
        foreach ($data['reviews'] as $review) {
            foreach ($data['buyer'] as $buyer) {
                echo _("Review By").": <b>$buyer->first_name $buyer->last_name</b><br><br>";
                echo _("Rating").": $review->rate<br><br>";
                echo _("Review").": $review->text_review</b><br>";
                echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            }
        }

        if (empty($data['reviews'])) {
            echo _("There are no reviews for this item.");
        }

        echo "<br><br><br>";
        ?>
        <a href="<?= BASE ?>/Seller/index">&#8592 <?= _("Go Back to Home Page")?></a>
    </body>
</html>

