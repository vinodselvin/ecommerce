<?php $this->load->view('static/header');?>
<?php $category_processed = removeSpaceToHypen($category); ?>
<div class="container pd-container">
    <div class="row">
        <div class="col-12">
        <?php echo $breadcrumb; ?>
        </div>
    </div>
    <div class="row product-row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <img src="<?php echo $image; ?>" class="pd-image">
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <h5><?php echo $title; ?></h5>
            <a href="<?php echo base_url("products/".$category_processed); ?>">#<?php echo $category_processed; ?></a>
            <h3 class="pd-price">$<?php echo $price; ?></h3>
            <div class="product-desc">
                <p><?php echo $description; ?></p>  
            </div>
            <div class="buy-options">
             <button class="btn btn-warning add-to-cart-btn" 
                     data-loading-text='<i class="fa fa-spin fa-spinner"></i>' 
                     data-product-id="<?php echo $id; ?>">
                 <i class="fa fa-shopping-cart" aria-hidden="true"></i> ADD TO CART
             </button>
<!--             <button class="btn btn-primary" 
                     data-loading-text='<i class="fa fa-spin fa-spinner"></i>' 
                     data-product-id="<?php echo $id; ?>">
                 <i class="fa fa-bolt" aria-hidden="true"></i> BUY NOW 
             </button>-->
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('static/footer'); ?>
