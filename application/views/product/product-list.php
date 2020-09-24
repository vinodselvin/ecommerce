<?php $this->load->view('static/header'); ?>
<div class="container-fluid product-container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-2 col-md-2 col-xl-2" style="margin: 15px">
            <?php $this->load->view("product/filters/index", $filter); ?>
        </div>
        <div class="col-sm-12 col-xs-12 col-lg-8 col-md-8 col-xl-8">
            <?php if(isset($breadcrumb) && $breadcrumb){ ?>
            <div class="row">
                <div class="col-12">
                    <?php echo $breadcrumb; ?>
                </div>
            </div>
            <?php } ?>
            <div class="row row-eq-height all-products">

        <?php foreach($products as $product){ ?>
                <?php $this->load->view('product/single-product', $product); ?>
        <?php } ?>
            </div>
        </div>
    </div>
    
</div>
<?php $this->load->view('static/footer'); ?>
