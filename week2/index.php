
<?php

    $first_name = htmlspecialchars(filter_input(INPUT_GET, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_GET, 'last_name'));

?>

<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
     <?php
     echo "Hello world from php file";
     ?>
        
        <?php include ('nav.php'); ?>
        //takes it from the nav
        <form action="index.php" method="get">
            <label>First name: </label>
            <input type="text" name="first_name"/><br><!-- comment -->
            <label>Last name: </label>
            <input type="text" name="last_name"/><br><!-- comment -->
            <lable>&nbsp;</lable>
            <input type="submit" value="Submit"/>
        </form>
        
         <form action="view.php" method="post">
            <label>First name: </label>
            <input type="text" name="first_name"/><br><!-- comment -->
            <label>Last name: </label>
            <input type="text" name="last_name"/><br><!-- comment -->
            <lable>&nbsp;</lable>
            <input type="submit" value="Submit"/>
        </form>
        
        <?php
        echo "Hi " . $first_name . " " . $last_name;
        ?>

     </body>
</html>







