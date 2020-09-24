<?php $this->load->view('static/header'); ?>
<div class="container">
    <div class="row">

        <div class="col-12">
            <div class="form-signin">
                <a class="navbar-brand" href="http://localhost/fynestore/" style="color: #2874f0!important">FyneStore</a>
                <h1 class="h3 mb-3 font-weight-normal">Login in/Register</h1>
                <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" id="auth-btn" type="submit">Continue <i class="fa fa-arrow-circle-right"></i></button>
                <p class="mt-5 mb-3 text-muted">&copy; 2019-<?php echo date('Y'); ?></p>
            </div>
        </div>
    </div>

</div>
<?php $this->load->view('static/footer'); ?>
