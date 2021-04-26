<html>
    <head>
        <title>Create Profile</title>
    </head>
    <body>
        <h4>Create Your Profile:</h4>
 
        <form method="post" action="">
            <label>First Name: <input type="text" name="first_name" value="<?= $data->first_name ?>"/></label><br />
            <label>Last Name: <input type="text" name="middle_name" value="<?= $data->last_name ?>"/></label><br />
            <label>Budget: <input type="number" step="0.01" name="budget" value="<?= $data->budget ?>"/></label><br />

            <input type="submit" name="action" value="Submit changes" />

        </form>

    </body>
</html>