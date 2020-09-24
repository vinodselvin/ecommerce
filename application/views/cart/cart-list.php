<?php $this->load->view('static/header', array('cart' => 'hide')); ?>
<div class="container product-container">
    <div class="row">
        <?php if($cart_product) {?>
        <div class="col-12 p-4">
            <h2>My Cart</h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <?php foreach($cart_product as $e_product){ 
            $e_total = $e_product['quantity'] * $e_product['details']['price'];
            $total += $e_total; 
            $_SESSION['total'] = $total;?>
        <!--<div class=" product-card">-->
            <div class="card" >
                <?php $category_processed = removeSpaceToHypen($e_product['details']['category']); ?>
               <div class="card-body row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <img class="card-img-top product-image" src="<?php echo $e_product['details']['image']; ?>" alt="Card image cap">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                        <h5>
                            <a href="<?php echo base_url("products/".$category_processed.'/'.$e_product['details']['id']); ?>" class="product-action">
                                <?php echo $e_product['details']['title']; ?>
                            </a>
                        </h5>
                        <h6>$<?php echo $e_product['details']['price']; ?></h6>
                        <h6>Quantity: <?php echo $e_product['quantity']; ?></h6>
                        <h5>$<?php echo $e_product['quantity'] * $e_product['details']['price']; ?></h5>
                        <h5 style="margin-top: 30px"><a class="product-action remove-item-cart" href="#" data-cart-id="<?php echo $e_product['cartId']; ?>">REMOVE</a></h5>
                    </div>
<!--                   <div class="col-1">
                       <span class="pull-right"><i class="fa fa-close"></i></span>
                   </div>-->
                </div>
            <!--</div>-->
        </div>
        <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card" >
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Price Details</th>
                        </tr>
                        <tr>
                            <td>Price (<?php echo count($cart_product); ?> items)</td>
                            <td class="right">$<?php echo $total; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Charges</td>
                            <td class="text-success right">FREE</td>
                        </tr>
                        <tr>
                            <td><b>Total Price</b></td>
                            <td class="right">$<?php echo $total; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <select class="payment-option">
                                    <option value="cod">COD</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#cart-modal">Continue</button>
                            </td>
                        </tr>
                    </table>
<!--                    <p>Price (<?php echo count($cart_product); ?> items): $<?php echo $total;  ?></p>
                    <h4>Delivery Charges: Free</h4>
                    <h4>Total Amount: <?php echo $total; ?></h4>-->
                    

                    
                </div>
            </div>
        </div>
        <?php } else {?>
        <div class="col-12">
            <div class="card" >
                <div class="card-body center">
                    <h2>Cart is Empty</h2>
                    <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Start Shopping</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <?php $this->load->view('modals/address-modal', $details);?>
</div>
<?php $this->load->view('static/footer'); ?>
