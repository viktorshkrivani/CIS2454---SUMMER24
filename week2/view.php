<?php

    //htmlspecialchars will take care any special character and will encode them -- they wont run here
    // filter_input -- will make sure the value exist if not will give default
    $first_name = htmlspecialchars(filter_input(INPUT_POST, 'first_name'));
    $last_name = htmlspecialchars(filter_input(INPUT_POST, 'last_name'));
    
    $some_number = 42;
    
    //increment
    $some_number ++;
    
    //decrement
    $some_number --;
    
    //combined  assigment
    $some_number += 10;
    $some_number -= 10;
    
    
    $some_number_with_a_decimal = 7.7;
    
    $name = "Viktor Shkrivani";
    
    $name .= " Dr";
    
    $is_awesome = true;
    
    //integer division
    $interger_quotient = intdiv(7, 2);
    
    $output ="";
    
    $counter = 1;
         while ($counter < 10 ) {
             $output .= "</br> $counter";
             $counter++;
         }
         
    for ( $index = 0; $index < 10; $index ++ ){
        $output .= "</br> $index";
    }

?>


<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <?php
        echo "Hi " . $first_name . " " . $last_name;
        echo "</br>";
        echo $some_number . " is the answer";
        echo "</br>";
        echo "$name is awesome: $is_awesome";
        echo "</br>";
        echo "7 / 2 is: " . ( 7 / 2 );
        echo "</br>";
        if ( 7 < 2 ){
            echo "7 is less than 2";
        } else {
            echo "7 is not less than 2";
        }
         echo "</br>";
         if ( $first_name == "Viktor" ){
            echo "Hi Viktor!";
        } else {
            echo "You aren't Viktor.";
        }
        
        echo "</br>";
         if ( $first_name == 10 ){
            echo "you are called 10?";
        } else {
            echo "You aren't 10.";
        }
        
        echo "</br>";
        // === is for identical - same value and same type
         if ( $first_name === 10 ){
            echo "you are called 10?";
        } else {
            echo "You aren't 10.";
        }
        
         echo "</br>";
         echo $output;
         
        
        ?>

     </body>
</html>


