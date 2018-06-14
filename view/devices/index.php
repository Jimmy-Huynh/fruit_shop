<form name="" id="datalist" action="<?php echo SITE_ROOT; ?>Devices/search" method="POST">
    <table id="search" style="width: 100%;">
        <thead>
            <tr>
                <td>Id</td><td>DeviceCode</td><td>DeviceName</td><td>Status</td><td>Description</td>
                <td colspan="3">
                    <a href="<?php echo SITE_ROOT . 'Devices/create' ?>">Create</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="Id" 
                    <?php
                    if (isset($this->Id)) {
                        echo 'value ="' . $this->Id . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="DeviceCode" 
                    <?php
                    if (isset($this->DeviceCode)) {
                        echo 'value ="' . $this->DeviceCode . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="DeviceName" 
                    <?php
                    if (isset($this->DeviceName)) {
                        echo 'value ="' . $this->DeviceName . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="Status" 
                    <?php
                    if (isset($this->Status)) {
                        echo 'value ="' . $this->Status . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="Description" 
                    <?php
                    if (isset($this->Description)) {
                        echo 'value ="' . $this->Description . '"';
                    }
                    ?>></td>
                    
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if (isset($this->devices)) {

                if (isset($this->search)) {
                    $data = $this->devices;
                } else {
                    $p = new HTPagination();
                    $data = $p->getdata($this->devices);
                }
                ?>
                <?php
                foreach ($data as $devices) {
                    ?>
                    <tr>
                        <td><?php echo $devices->Id; ?></td>
                <td><?php echo $devices->DeviceCode; ?></td>
                <td><?php echo $devices->DeviceName; ?></td>
                <td><?php echo $devices->Status; ?></td>
                <td><?php echo $devices->Description; ?></td>
                
                        <td><a href="<?php echo SITE_ROOT . 'Devices/detail/' . $devices->Id ?>"><i class="glyphicon glyphicon-file"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'Devices/update/' . $devices->Id ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'Devices/delete/' . $devices->Id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</form>
<?php
if (isset($this->search)) {
    
} else {
    $p->pagination($this->devices);
}