<div class="row">
    <form method="POST" action="<?php
    if (isset($this->user)) {
        echo SITE_ROOT . "Users/update/" . $this->user->Id;
    } else {
        echo SITE_ROOT . "Users/create";
    }
    ?>">
        <div class="row">
            <div class="col-lg-4">UserName</div>
            <div class="col-lg-8">
                <input type="text" name="UserName" value="<?php if (isset($this->user)) echo $this->user->UserName; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">PassWord</div>
            <div class="col-lg-8">
                <input type="text" name="PassWord" value="<?php if (isset($this->user)) echo $this->user->PassWord; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">Description</div>
            <div class="col-lg-8">
                <input type="text" name="Description" value="<?php if (isset($this->user)) echo trim($this->user->Description); ?>"/>
            </div>
        </div>
        <button type="submit">
            <?php
            if (isset($this->user)) {
                echo "Update";
            } else {
                echo "Create";
            }
            ?>
        </button>
        <button type="reset">cancel</button>
    </form>
</div>
<?php
if (isset($this->result)) {
    if ($this->result) {
        echo '<h1>Create/Update is successful...</h1>';
    } else {
        echo '<h1>Create/Update have an error...</h1>';
    }
}
