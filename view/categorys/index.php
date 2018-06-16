<form name="" id="datalist" action="<?php echo SITE_ROOT; ?>categorys/search" method="POST">
    <table id="search" style="width: 100%;">
        <thead>
            <tr>
                <td>ID</td><td>NAME</td>
                <td colspan="3">
                    <a href="<?php echo SITE_ROOT . 'categorys/create' ?>">Create</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="ID" 
                    <?php
                    if (isset($this->ID)) {
                        echo 'value ="' . $this->ID . '"';
                    }
                    ?>></td>
                    <td><input type="text" name="NAME" 
                    <?php
                    if (isset($this->NAME)) {
                        echo 'value ="' . $this->NAME . '"';
                    }
                    ?>></td>
                    
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if (isset($this->categorys)) {

                if (isset($this->search)) {
                    $data = $this->categorys;
                } else {
                    $p = new HTPagination();
                    $data = $p->getdata($this->categorys);
                }
                ?>
                <?php
                foreach ($data as $categorys) {
                    ?>
                    <tr>
                        <td><?php echo $categorys->ID; ?></td>
                <td><?php echo $categorys->NAME; ?></td>
                
                        <td><a href="<?php echo SITE_ROOT . 'categorys/detail/' . $categorys->ID ?>"><i class="glyphicon glyphicon-file"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'categorys/update/' . $categorys->ID ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'categorys/delete/' . $categorys->ID ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
    $p->pagination($this->categorys);
}