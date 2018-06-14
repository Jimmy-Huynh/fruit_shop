<link href="public/css/cart.css" rel="stylesheet">
<script src="<?php echo SITE_ROOT?>public/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo SITE_ROOT?>public/js/cart.js"></script>
<?php
$total = 0;
if ($this->products != NULL) {
    ?>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($this->products as $key => $value){
                    
            ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="<?php echo $value['image']; ?>" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin"><?php echo $value['name']; ?></h4>
                            <p><?php echo $value['description']; ?></p>
                        </div>
                    </div>
                </td>
                <td data-th="Price"><?php echo $value['price']; ?> VND</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center"><?php echo $value['price']; ?></td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                    <button class="btn btn-danger btn-sm delete"><i class="glyphicon glyphicon-trash"></i></button>
                    <input type="hidden" value="<?php echo $key;?>" class="deleteVal">
                </td>
            </tr>
            <?php
            $total+=$value['price'];
                }
            ?>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total <?php echo $total; ?></strong></td>
            </tr>
            <tr>
                <td><a href="<?php echo SITE_ROOT; ?>index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total <?php echo $total; ?></strong></td>
                <td><a href="#" class="btn btn-success btn-block" onclick="location.href = '<?php echo SITE_ROOT; ?>Checkout';">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
    <?php
} else {
    ?>
    <table>
        <tr>
            <td><a href="<?php echo SITE_ROOT; ?>index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
            <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
    </table>
    <?php
}
