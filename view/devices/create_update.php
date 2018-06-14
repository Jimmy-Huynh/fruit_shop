<div class="row">
    <form method="POST" action="<?php
    if (isset($this->device)) {
        echo SITE_ROOT . "Devices/update/" . $this->device->Id;
    } else {
        echo SITE_ROOT . "Devices/create";
    }
    ?>">
        <div class="row">
            <div class="col-lg-4">DeviceCode</div>
            <div class="col-lg-8">
                <input type="text" name="DeviceCode" value="<?php if (isset($this->device)) echo $this->device->DeviceCode; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">DeviceName</div>
            <div class="col-lg-8">
                <input type="text" name="DeviceName" value="<?php if (isset($this->device)) echo $this->device->DeviceName; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">Status</div>
            <div class="col-lg-8">
                <input type="text" name="Status" value="<?php if (isset($this->device)) echo $this->device->Status; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">Description</div>
            <div class="col-lg-8">
                <input type="text" name="Description" value="<?php if (isset($this->device)) echo $this->device->Description; ?>"/>
            </div>
        </div>
        
        <button type="submit">
            <?php
            if (isset($this->device)) {
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