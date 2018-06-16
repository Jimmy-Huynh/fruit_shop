<div class="row">
    <form method="POST" action="<?php
    if (isset($this->category)) {
        echo SITE_ROOT . "categorys/update/" . $this->category->Id;
    } else {
        echo SITE_ROOT . "categorys/create";
    }
    ?>">
        <div class="row">
            <div class="col-lg-4">ID</div>
            <div class="col-lg-8">
                <input type="text" name="ID" value="<?php if (isset($this->category)) echo $this->category->ID; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">NAME</div>
            <div class="col-lg-8">
                <input type="text" name="NAME" value="<?php if (isset($this->category)) echo $this->category->NAME; ?>"/>
            </div>
        </div>
        
        <button type="submit">
            <?php
            if (isset($this->category)) {
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