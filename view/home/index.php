<script src="<?php echo SITE_ROOT; ?>public/js/jquery-3.2.1.min.js"></script>
<script>
    $(function () {
        $(".nav-tabs a").click(function () {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $(".slider").css({"left": +position.left, "width": width});
        });
        var actWidth = $(".nav-tabs .active").width();
        var actPosition = $(".nav-tabs .active").position();
        $(".slider").css({"left": +actPosition.left, "width": actWidth});
    });
</script>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"><span>1</span></li>
        <li data-target="#myCarousel" data-slide-to="1"><span>2</span></li>
        <li data-target="#myCarousel" data-slide-to="2"><span>3</span></li>
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

</div>

<div class="tile">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <div class="slider"></div>
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">MÓN MỚI</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">RÁI CÂY TƯƠI</a></li>
        <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">ĐỒ ĂN VẶT</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="row" style="margin-top: 10px;">
                <?php
                $count = 0;
                foreach ($this->products as $key => $value) {
                    if ($count % 5 == 0) {
                        echo '<div class="row">';
                    }
                    ?>
                    <div class="col-lg-5ths product" onclick="location.href = 'Index/detail/<?php echo $key + 1; ?>';">
                        <div style="border: 1px solid; padding-left: 8px; padding-right: 8px; padding-top: 16px; padding-bottom: 16px;">
                            <img src="<?php echo $value['image']; ?>" width="150" height="200" class="center-img"/>
                            <p style="text-align: center; font-weight: bold; color: #0076ad;"><?php echo $value['name']; ?></p>
                            <div class="overlay">
                                <div class="text">
                                    <button class="like btn btn-default" type="button">
                                        <span class="glyphicon glyphicon-eye-open"></span></button></div>
                                <!--<img src="public/img/cart.png" width="40" height="40" class="center-img"/>-->
                            </div>
                        </div>

                    </div>
                    <?php
                    $count++;
                    if ($count == 5 || $key == count($this->products) - 1) {
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
                            echo '<li class="disabled"><a href="' . SITE_ROOT . 'index.php?page=' . $i . '#messages">' . $i . '</a></li>';
                        } else {
                            echo '<li><a href="' . SITE_ROOT . 'index.php?page=' . $i . '#messages">' . $i . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">TRÁI CÂY TƯƠI</div>
        <div role="tabpanel" class="tab-pane" id="messages">

        </div>
    </div>

</div>


<div style="min-height: 250px; width: 100%; background-color: #ccc;">

</div>
<div style="min-height: 250px; width: 100%; background-color: #ccc; margin-top: 16px;">
    <p>Gửi thông tin bạn để được hưởng ưu đãi</p>
    <p>Gửi thông tin bạn để được hưởng ưu đãi</p>
    <input type="text" />
</div>
<div style="min-height: 250px; width: 100%; background-color: #ccc; margin-top: 16px;">
    <div class="col-lg-3" style="display: inline-block;">
        <img src="<?php echo SITE_ROOT; ?>public/img/logo.png" style="width: 52px; height: 48px; display: inline-block" alt="Logo">
        <span>
            <p>MIỄN PHÍ VẬN CHUYỂN</p>
            <p>Với hóa đơn từ 200.000đ</p>
        </span>
    </div>
    <div class="col-lg-3">

    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
</div>