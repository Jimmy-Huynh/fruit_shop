<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <img src="<?php echo SITE_ROOT; ?>public/img/banner.jpg" alt="Los Angeles" style="width:100%;">
            <div class="carousel-caption">
                <h3>Banner 1</h3>
                <p>Descript banner 1</p>
            </div>
        </div>

        <div class="item">
            <img src="<?php echo SITE_ROOT; ?>public/img/banner.jpg" alt="Chicago" style="width:100%;">
            <div class="carousel-caption">
                <h3>Banner 2</h3>
                <p>Descript banner 2</p>
            </div>
        </div>

        <div class="item">
            <img src="<?php echo SITE_ROOT; ?>public/img/banner.jpg" alt="New York" style="width:100%;">
            <div class="carousel-caption">
                <h3>Banner 3</h3>
                <p>Descript banner 3</p>
            </div>
        </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--<div class="row" style="margin-top: 10px; height: 50px; background-color: #000; border-bottom: 1px #fff solid;">
    <p style="text-align: center; font-weight: bold; line-height: 50px; vertical-align: middle; display: block; color: #fff; font-size: 30px;">New product</p>
</div>-->
<div class="row" style="margin-top: 10px;">
    <?php
    $count = 0;
    foreach ($this->products as $key => $value) {
        if ($count % 3 == 0) {
            echo '<div class="row">';
        }
        ?>
        <div class="col-lg-4 product" onclick="location.href = 'Index/detail/<?php echo $key + 1; ?>';">
            <img src="<?php echo $value['image']; ?>" width="200" height="200" class="center-img"/>
            <p style="text-align: center; font-weight: bold; color: #0076ad;"><?php echo $value['name']; ?></p>
            <div class="overlay">
                <div class="text">
                    <button class="like btn btn-default" type="button">
                        <span class="glyphicon glyphicon-eye-open"></span></button></div>
                <!--<img src="public/img/cart.png" width="40" height="40" class="center-img"/>-->
            </div>
        </div>
        <?php
        $count++;
        if ($count == 3 || $key == count($this->products) - 1) {
            echo '</div>';
            $count = 0;
        }
    }
    ?>
</div>
<div class="row">
    <ul class="pagination" style="float: right;">
        <?php
        for ($i = 1; $i <= $this->pages; $i++) {
            if ($this->currentPage == $i) {
                echo '<li class="disabled"><a href="' . SITE_ROOT . 'index.php?page=' . $i . '">' . $i . '</a></li>';
            } else {
                echo '<li><a href="' . SITE_ROOT . 'index.php?page=' . $i . '">' . $i . '</a></li>';
            }
        }
        ?>
    </ul>
</div>
