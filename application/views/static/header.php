<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fynestore</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-latest/css/bootstrap.min.css');?>"></link>
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css');?>"></link>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css');?>"></link>
    <?php foreach($this->css as $css){ ?>
    <link rel="stylesheet" href="<?php echo $css;?>"></link>
    <?php } ?>
</head>
<body>
    <?php $this->load->view("static/navbar"); ?>