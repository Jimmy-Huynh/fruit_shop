<form method="POST" action="<?php echo SITE_ROOT."Generate/create" ?>">
    <select name="table">
        <?php
        if (isset($this->data)) {
            foreach ($this->data as $value) {
                ?>
                <option value="<?php echo $value->TABLE_NAME; ?>"><?php echo $value->TABLE_NAME; ?></option>
                <?php
            }
        }
        ?>
    </select>
    <input type="checkbox" name="override"> Override
    <button type="submit">Create</button>
</form>