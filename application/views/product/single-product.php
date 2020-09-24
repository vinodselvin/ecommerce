<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 product-card"
    data-id="<?php echo $id; ?>"
    data-price="<?php echo $price; ?>"
    data-category="<?php echo $category; ?>"
    data-name="<?php echo $title; ?>">
    <div class="card" >
        <?php $category_processed = removeSpaceToHypen($category); ?>
        <a href="<?php echo base_url("products/".$category_processed.'/'.$id); ?>" class="product-action">
            <img class="card-img-top product-image" src="<?php echo $image; ?>" alt="Card image cap">
            <div class="card-body">
                <h6><?php echo $title; ?></h6>
                <h5>$<?php echo $price; ?></h5>
            </div>
        </a>
    </div>
</div>