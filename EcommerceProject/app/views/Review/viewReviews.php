<html>

    <head><title><?= _("View Review") ?></title>
    </head>
    <body>
        <h2><?= _("Viewing all Reviews") ?>:</h2> <br />

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
            body {
                text-align: center;
                background-color: #BFBFBF;
                font-family: 'Roboto', sans-serif;
            }
            .review {
                text-align: left;
            }
        </style>
        
        <?php
        foreach ($data['reviews'] as $review) {
            $buyer_first_name = $data['buyer']->first_name;
            $buyer_last_name = $data['buyer']->last_name;

            echo "<div class='review'>";
            echo "<u>" . _("Review By") . "</u>". ": <b>$buyer_first_name, $buyer_last_name</b><br><br>";
            echo "<u>" . _("Rating") . "</u>". ": $review->rate<br><br>";
            echo "<u>" . _("Review") . "</u>". ": $review->text_review</b><br>";
            echo "<hr style='width:325px;text-align:left;margin-left:0'><br>";
            echo "</div>";
        }

        if (empty($data['reviews'])) {
            echo "There are no reviews for this item.";
        }

        echo "<br><br><br>";
        ?>
        <a href="<?= BASE ?>/Buyer/index">&#8592 <?= _("Go Back to Home Page") ?></a>
    </body>
</html>

