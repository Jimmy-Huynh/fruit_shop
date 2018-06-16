<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div style="display: inline-block">
                <span style="float: left;margin-right: 8px;"><img src="<?php echo SITE_ROOT; ?>public/img/logo.png" style="width: 52px; height: 48px;" alt="Logo"></span>
                <a style="font-weight: bold" class="navbar-brand" href="<?php echo SITE_ROOT; ?>">Fruit Deli.</a>
            </div>
            
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 16px;">
                <li <?php if($this->nav =='Index') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>">TRANG CHỦ</a></li>
                <li <?php if($this->nav =='SignUp') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>SignUp">SHOP TRÁI CÂY</a></li>
                <li <?php if($this->nav =='SignUp') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>SignUp">ĐỒ ĂN VẶT</a></li>
                <li <?php if($this->nav =='About') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>About">VỀ CHÚNG TÔI</a></li>
                <li <?php if($this->nav =='Contact') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>Contact">LIÊN HỆ</a></li>
                <li <?php if($this->nav =='Contact') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>cart"><i class="glyphicon glyphicon-shopping-cart"><span></span></i></a>
                <span class="cart-number"><?php
                        if (isset($_SESSION['myCart'])) {
                            echo count($_SESSION['myCart']);
                        } else {
                            echo 0;
                        };
                        ?></span>
                </li>
                <li <?php if($this->nav =='Contact') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>cart"><i class="glyphicon glyphicon-shopping-cart"><span></span></i></a>
                <span class="cart-number"><?php
                        if (isset($_SESSION['myCart'])) {
                            echo count($_SESSION['myCart']);
                        } else {
                            echo 0;
                        };
                        ?></span>
                </li>
                <li <?php if($this->nav =='Contact') echo 'class="active-custom"'; ?>><a href="<?php echo SITE_ROOT; ?>cart"><i class="glyphicon glyphicon-shopping-cart"><span></span></i></a>
                <span class="cart-number"><?php
                        if (isset($_SESSION['myCart'])) {
                            echo count($_SESSION['myCart']);
                        } else {
                            echo 0;
                        };
                        ?></span>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>