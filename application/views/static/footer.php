<div id="snackbar"></div>
</body>
<script src="<?php echo base_url('assets/plugins/jQuery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-latest/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

<?php foreach($this->js as $js){ ?>
<script src="<?php echo $js; ?>"></script>
<?php } ?>
</html>