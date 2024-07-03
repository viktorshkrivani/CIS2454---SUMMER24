<select name="symbol">
    <?php foreach ($stocks as $stock ) : ?>
        <option value="<?php echo $stock['symbol']; ?>"><?php echo $stock ['name']; ?></option>
    <?php endforeach; ?>
</select>
