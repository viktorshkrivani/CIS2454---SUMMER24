<?php

try{
    
require_once 'models/database.php';
require_once 'models/stocks.php';
    
    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));
    
     
    $symbol = htmlspecialchars(filter_input(INPUT_POST, "symbol"));
    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $current_price = filter_input(INPUT_POST, "current_price", FILTER_VALIDATE_FLOAT); //decimal place
    
    if ( $action == "insert" && $symbol != "" && $name != "" && $current_price != 0){
        insert_stock($symbol, $name, $current_price);
        header("Location: stocks.php");       
    } else if ($action == "update" && $symbol != "" && $name != "" && $current_price != 0) {
        update_stock($symbol, $name, $current_price);
        header("Location: stocks.php"); 
    } else if ($action == "delete" && $symbol != "" ) {
        delete_stock($symbol); 
        header("Location: stocks.php"); 
    } else if ($action != ""){
        $error_message = "Missing symbol, name, or current price.";
        include ('views/error.php');
    }

    $stocks = list_stocks();
    include('views/stocks.php');
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include ('views/error.php');
}




?>

