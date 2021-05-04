<html>

    <head><title><?= _("View Review")?></title>
    </head>
    <body>
        <h2><?= _("Viewing all Reviews")?>:</h2> <br />
        <?php
        foreach ($data['reviews'] as $review) {
            $buyer_first_name = $data['buyer']->first_name;
            $buyer_last_name = $data['buyer']->last_name;

            echo _("Review By").": <b>$buyer_first_name, $buyer_last_name</b><br><br>";
            echo _("Rating").": $review->rate<br><br>";
            echo _("Review").": $review->text_review</b><br>";
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
        }

        if (empty($data['reviews'])) {
            echo "There are no reviews for this item.";
        }

        echo "<br><br><br>";
        ?>
        <a href="<?= BASE ?>/Buyer/index">&#8592 <?= _("Go Back to Home Page")?></a>
    </body>
</html>

