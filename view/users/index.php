<form name="" id="datalist" action="<?php echo SITE_ROOT; ?>Users/search" method="POST">
    <table id="search" style="width: 100%;">
        <thead>
            <tr>
                <td>Id</td>
                <td>UserName</td>
                <td>Description</td>
                <td colspan="3">
                    <a href="<?php echo SITE_ROOT . 'Users/create' ?>">Create</a>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="Id" 
                    <?php
                    if (isset($this->Id)) {
                        echo 'value = "' . $this->Id . '"';
                    }
                    ?>>
                </td>
                <td>
                    <input type="text" name="UserName" 
                    <?php
                    if (isset($this->UserName)) {
                        echo 'value = "' . $this->UserName . '"';
                    }
                    ?>>
                </td>
                <td>
                    <input type="text" name="Description" 
                    <?php
                    if (isset($this->Description)) {
                        echo 'value = "' . $this->Description . '"';
                    }
                    ?>>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if (isset($this->users)) {

                if (isset($this->search)) {
                    $data = $this->users;
                } else {
                    $p = new HTPagination();
                    $data = $p->getdata($this->users);
                }
                ?>
                <?php
                foreach ($data as $users) {
                    ?>
                    <tr>
                        <td><?php echo $users->Id; ?></td>
                        <td><?php echo $users->UserName; ?></td>
                        <td><?php echo $users->Description; ?></td>
                        <td><a href="<?php echo SITE_ROOT . 'Users/detail/' . $users->Id ?>"><i class="glyphicon glyphicon-file"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'Users/update/' . $users->Id ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td><a href="<?php echo SITE_ROOT . 'Users/delete/' . $users->Id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
    $p->pagination($this->users);
}