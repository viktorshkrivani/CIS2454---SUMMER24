<?php

function list_stocks() {
    
    global $database;
    
    $query = 'SELECT symbol, name, current_price, id FROM stocks';
    //prepare query 
    $statement = $database->prepare($query);
    //runs query
    $statement->execute();

    //includes all the rows
    $stocks = $statement->fetchAll();

    //close it
    $statement->closeCursor();

    return $stocks;
}

function insert_stock($symbol, $name, $current_price) {
    global $database;
    
    //Dangerrrr --- SQL Injection risk
    //$query = "INSERT INTO stocks (symbol, name, current_price) " . "VALUES ($symbol, $name, $current_price)";

    $query = "INSERT INTO stocks (symbol, name, current_price) " . "VALUES (:symbol, :name, :current_price)";

    //value binfing in PDO protects against sql injestion
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function update_stock($symbol, $name, $current_price) {
    global $database;
    $query = "UPDATE stocks set name = :name, current_price = :current_price "
            . " where symbol = :symbol";

    //value binfing in PDO protects against sql injestion
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":current_price", $current_price);

    $statement->execute();
    $statement->closeCursor();
}

function delete_stock($symbol) {
    global $database;
    $query = "DELETE FROM stocks "
            . " where symbol = :symbol";

    //value binfing in PDO protects against sql injestion
    $statement = $database->prepare($query);
    $statement->bindValue(":symbol", $symbol);

    $statement->execute();
    $statement->closeCursor();
}
