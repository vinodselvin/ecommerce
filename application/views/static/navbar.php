<nav class="navbar navbar-expand-lg navbar-dark app-bar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo STORE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url("products"); ?>">All Products</a>
                </li>
            </ul>
            
           
                <form class="form-inline my-2 my-lg-0">
                    <?php if ($cart != 'hide') { ?>
                    <a class="app-cart" href="<?php echo base_url('cart'); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="total-items-in-cart badge badge-light"></span></a>
                    <?php } ?>
                    <?php if($_SESSION['user_id']){ ?>
                    <div class="dropdown">
                        <a class="nav-link profile-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?php echo base_url("products"); ?>"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item logout" href="#">Logout</a>
                        </div>
                    </div>
                    <?php } else{?>
<!--                    <div style="margin-left: 15px">
                        <a href="<?php echo base_url("login"); ?>" class="btn btn-warning">Login/Register</a>
                    </div>-->
                    <?php } ?>
                </form>
        </div>
    </div>
</nav>