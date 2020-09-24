<?php $this->load->view('static/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <img src="<?php echo base_url('assets/images/tick.png'); ?>" width="250px">
            <h1>Order Successful!</h1>
            <h5>Product will be delived within 7 days!</h5>
            <h6><b>USD$ <?php echo $_SESSION['total']; ?></b>, will be collected on delivery.</h6>
            <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>
<?php $this->load->view('static/footer'); ?>