<?php

if (isset($this->devicemanage)) {
    echo $this->devicemanage->Id . "<br>"; echo $this->devicemanage->UserId . "<br>"; echo $this->devicemanage->DeviceId . "<br>"; echo $this->devicemanage->Status . "<br>"; echo $this->devicemanage->RequestTime . "<br>"; echo $this->devicemanage->ResponseTime . "<br>"; echo $this->devicemanage->UserIdApprove . "<br>"; 
} else {
    echo '<h1>No data to display</h1>';
}

