<form name="" id="datalist" action="<?php echo SITE_ROOT; ?>Users/search" method="POST">
    <div class="row">
        <div class="col-xs-2">Id</div>
        <div class="col-xs-2">UserName</div>
        <div class="col-xs-2">Description</div>
        <div class="col-xs-6">
            <a href="<?php echo SITE_ROOT . 'Users/create' ?>">Create</a>
        </div>
    </div>
    <div class="row" id="search">
        <div class="col-xs-2"><input type="text" name="Id" <?php if (isset($this->Id)) echo 'value = "' . $this->Id . '"'; ?>></div>
        <div class="col-xs-2"><input type="text" name="UserName" <?php if (isset($this->UserName)) echo 'value = "' . $this->UserName . '"'; ?>></div>
        <div class="col-xs-2"><input type="text" name="Description" <?php if (isset($this->Description)) echo 'value = "' . $this->Description . '"'; ?>></div>
        <div class="col-xs-6">
        </div>
    </div>
    <?php
    if (isset($this->users)) {
        $p = new HTPagination();
        $data = $p->getdata($this->users);
        ?>
        <?php
        foreach ($data as $users) {
            ?>
            <div class="row">
                <div class="col-xs-2"><?php echo $users->Id; ?></div>
                <div class="col-xs-2"><?php echo $users->UserName; ?></div>
                <div class="col-xs-2"><?php echo $users->Description; ?></div>
                <div class="col-xs-6">
                    <div class="col-xs-2"><a href="<?php echo SITE_ROOT . 'Users/detail/' . $users->Id ?>"><i class="glyphicon glyphicon-file"></i></a></div>
                    <div class="col-xs-2"><a href="<?php echo SITE_ROOT . 'Users/update/' . $users->Id ?>"><i class="glyphicon glyphicon-pencil"></i></a></div>
                    <div class="col-xs-2"><a href="<?php echo SITE_ROOT . 'Users/delete/' . $users->Id ?>"><i class="glyphicon glyphicon-trash"></i></a></div>
                </div>
            </div>
            <?php
        }
        $p->pagination($this->users);
    }
    ?>
</form>

<?php
if (isset($this->users)) {
    ?>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>UserName</th>
                <th>Description</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->users as $users) {
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
            ?>
        </tbody>
    </table>
    <?php
}