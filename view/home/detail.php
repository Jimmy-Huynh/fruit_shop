<link href="<?php echo SITE_ROOT;?>public/css/detail.css" rel="stylesheet">
<div class="card">
    <div class="container-fliud">
        <div class="wrapper row">
            <div class="preview col-md-6">

                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="<?php echo $this->image; ?>" /></div>
                    <div class="tab-pane" id="pic-2"><img src="<?php echo $this->image; ?>" /></div>
                    <div class="tab-pane" id="pic-3"><img src="<?php echo $this->image; ?>" /></div>
                    <div class="tab-pane" id="pic-4"><img src="<?php echo $this->image; ?>" /></div>
                    <div class="tab-pane" id="pic-5"><img src="<?php echo $this->image; ?>" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo $this->image; ?>" /></a></li>
                    <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo $this->image; ?>" /></a></li>
                    <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo $this->image; ?>" /></a></li>
                    <li><a data-target="#pic-4" data-toggle="tab"><img src="<?php echo $this->image; ?>" /></a></li>
                    <li><a data-target="#pic-5" data-toggle="tab"><img src="<?php echo $this->image; ?>" /></a></li>
                </ul>

            </div>
            <div class="details col-md-6">
                <h3 class="product-title"><?php echo $this->name; ?></h3>
                <div class="rating">
                    <div class="stars">
                        <span class="glyphicon glyphicon-star checked"></span>
                        <span class="glyphicon glyphicon-star checked"></span>
                        <span class="glyphicon glyphicon-star checked"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    <span class="review-no"><?php echo $this->review; ?> reviews</span>
                </div>
                <p class="product-description"><?php echo $this->description; ?></p>
                <h4 class="price">current price: <span><?php echo $this->price; ?> VND</span></h4>
                <p class="vote"><?php echo $this->vote; ?></p>
                <h5 class="sizes">sizes:
                    <span class="size" data-toggle="tooltip" title="small">s</span>
                    <span class="size" data-toggle="tooltip" title="medium">m</span>
                    <span class="size" data-toggle="tooltip" title="large">l</span>
                    <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                </h5>
                <h5 class="colors">colors:
                    <span class="color orange glyphicon"></span>
                    <span class="color green"></span>
                    <span class="color blue"></span>
                </h5>
                <div class="action">
                    <button class="add-to-cart btn btn-default" type="button" onclick="location.href = '<?php echo SITE_ROOT; ?>cart/addCart/<?php echo $this->id; ?>';">add to cart</button>
                    <button class="like btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>