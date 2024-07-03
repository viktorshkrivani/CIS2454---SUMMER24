<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Stocks List</title>
    </head>
    <?php include ('topNavigation.php'); ?>
    </br>
    <body>
        <table>
            <tr>
            <th>Name</th>
            <th>Symbol</th>
            <th>Current Price</th>
            <th>ID</th>
            </tr>
            
            
            <?php foreach($stocks as $stock) : ?>
            <tr>
                <td><?php echo $stock->get_symbol(); ?></td>
                <td><?php echo $stock->get_name(); ?></td>
                <td><?php echo $stock->get_current_price(); ?></td>
                <td><?php echo $stock->get_id(); ?></td>    
            </tr>
            
            <?php endforeach; ?>
            
        </table>
        </br>
        <h2>Add or Update STOCK</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label>
            <input type="text" name="symbol"/><br><!-- comment -->
            <label>Name: </label>
            <input type="text" name="name"/><br><!-- comment -->
            <label>Current Price: </label>
            <input type="text" name="current_price"/><br><!-- comment -->
            <input type="hidden" name='action' value='insert_or_update'/>
            <input type="radio" name="insert_or_update" value="insert" checked>Add Stock</br>
            <input type="radio" name="insert_or_update" value="update" >Update Stock</br>
            <lable>&nbsp;</lable>
            <input type="submit" value="Submit Stock"/>
        </form>
        
        </br>
        <h2>Delete STOCK</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label>
            <?php include("stockSymbolDropDown.php"); ?>
            <input type="hidden" name='action' value='delete'/>
            <lable>&nbsp;</lable>
            <input type="submit" value="Delete Stock"/>
        </form>
        
      
    </body>
    </br>
    <?php include ('footer.php'); ?>
</html>