<div class="row">
    <form method="POST" action="<?php
    if (isset($this->devicemanage)) {
        echo SITE_ROOT . "DeviceManages/update/" . $this->devicemanage->Id;
    } else {
        echo SITE_ROOT . "DeviceManages/create";
    }
    ?>">
        <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
        
        <div class="row">
            <div class="col-lg-4">UserId</div>
            <div class="col-lg-8">
                <input type="text" name="UserId" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->UserId; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">DeviceId</div>
            <div class="col-lg-8">
                <input type="text" name="DeviceId" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->DeviceId; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">Status</div>
            <div class="col-lg-8">
                <input type="text" name="Status" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->Status; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">RequestTime</div>
            <div class="col-lg-8">
                <input type="text" name="RequestTime" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->RequestTime; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">ResponseTime</div>
            <div class="col-lg-8">
                <input type="text" name="ResponseTime" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->ResponseTime; ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">UserIdApprove</div>
            <div class="col-lg-8">
                <input type="text" name="UserIdApprove" value="<?php if (isset($this->devicemanage)) echo $this->devicemanage->UserIdApprove; ?>"/>
            </div>
        </div>
        
        <button type="submit">
            <?php
            if (isset($this->devicemanage)) {
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