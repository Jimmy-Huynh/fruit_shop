<?php

if (isset($this->device)) {
    echo $this->device->Id . "<br>"; echo $this->device->DeviceCode . "<br>"; echo $this->device->DeviceName . "<br>"; echo $this->device->Status . "<br>"; echo $this->device->Description . "<br>"; 
} else {
    echo '<h1>No data to display</h1>';
}

