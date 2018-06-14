<form name="" id="datalist" action="<?php echo SITE_ROOT; ?>DeviceManages/search" method="POST">
    <table id="search" style="width: 100%;">
        <thead>
            <tr>
                <td>Id</td><td>UserId</td><td>DeviceId</td><td>Status</td><td>RequestTime</td><td>ResponseTime</td><td>UserIdApprove</td>
                <td colspan="3">
                    <a href="<?php echo SITE_ROOT . 'DeviceManages/create' ?>">Create</a>
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
                    <td><input type="text" name="UserId" 
                    <?php
                    if (isset($this->UserId)) {
                        echo 'value ="' . $this->UserId . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="DeviceId" 
                    <?php
                    if (isset($this->DeviceId)) {
                        echo 'value ="' . $this->DeviceId . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="Status" 
                    <?php
                    if (isset($this->Status)) {
                        echo 'value ="' . $this->Status . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="RequestTime" 
                    <?php
                    if (isset($this->RequestTime)) {
                        echo 'value ="' . $this->RequestTime . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="ResponseTime" 
                    <?php
                    if (isset($this->ResponseTime)) {
                        echo 'value ="' . $this->ResponseTime . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="UserIdApprove" 
                    <?php
                    if (isset($this->UserIdApprove)) {
                        echo 'value ="' . $this->UserIdApprove . '"';
                    }
                    ?>></td>
                    
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if (isset($this->devicemanages)) {

                if (isset($this->search)) {
                    $data = $this->devicemanages;
                } else {
                    $p = new HTPagination();
                    $data = $p->getdata($this->devicemanages);
                }
                ?>
                <?php
                foreach ($data as $devicemanages) {
                    ?>
                    <tr>
                        <td><?php echo $devicemanages->Id; ?></td>
                <td><?php echo $devicemanages->UserId; ?></td>
                <td><?php echo $devicemanages->DeviceId; ?></td>
                <td><?php echo $devicemanages->Status; ?></td>
                <td><?php echo $devicemanages->RequestTime; ?></td>
                <td><?php echo $devicemanages->ResponseTime; ?></td>
                <td><?php echo $devicemanages->UserIdApprove; ?></td>
                
                        <td><a href="<?php echo SITE_ROOT . 'DeviceManages/detail/' . $devicemanages->Id ?>"><i class="glyphicon glyphicon-file"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'DeviceManages/update/' . $devicemanages->Id ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'DeviceManages/delete/' . $devicemanages->Id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
    $p->pagination($this->devicemanages);
}