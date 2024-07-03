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
                <td><?php echo $stock['symbol']; ?></td>
                <td><?php echo $stock['name']; ?></td>
                <td><?php echo $stock['current_price']; ?></td>
                <td><?php echo $stock['id']; ?></td>    
            </tr>
            
            <?php endforeach; ?>
            
        </table>
        </br>
        <h2>Add STOCK</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label>
            <input type="text" name="symbol"/><br><!-- comment -->
            <label>Name: </label>
            <input type="text" name="name"/><br><!-- comment -->
            <label>Current Price: </label>
            <input type="text" name="current_price"/><br><!-- comment -->
            <input type="hidden" name='action' value='insert'/>
            <lable>&nbsp;</lable>
            <input type="submit" value="Add Stock"/>
        </form>
        </br>
        <h2>Update STOCK</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label>
            <input type="text" name="symbol"/><br><!-- comment -->
            <label>Name: </label>
            <input type="text" name="name"/><br><!-- comment -->
            <label>Current Price: </label>
            <input type="text" name="current_price"/><br><!-- comment -->
            <input type="hidden" name='action' value='update'/>
            <lable>&nbsp;</lable>
            <input type="submit" value="Update Stock"/>
        </form>
        </br>
        <h2>Delete STOCK</h2>
        <form action="stocks.php" method="post">
            <label>Symbol: </label>
            <input type="text" name="symbol"/><br><!-- comment -->
            <input type="hidden" name='action' value='delete'/>
            <lable>&nbsp;</lable>
            <input type="submit" value="Delete Stock"/>
        </form>
        
      
    </body>
    </br>
    <?php include ('footer.php'); ?>
</html>