<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <title>Demo Insurance</title>
</head>

<style>
  
</style>

<body class="body-bg">  

    <?php echo form_open(base_url('auth/login'), 'class="login-form" '); ?>
    <section class="form-07">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="_form_07_main">
                        <div class="row">
                            <?php if(isset($msg) || validation_errors() !== ''): ?>
                            <div class="alert alert-warning alert-dismissible mx-auto"
                                style="width:70%;background-color: #ff9600 !important;border:none;color: white;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                <?= validation_errors();?>
                                <?= isset($msg)? $msg: ''; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('warning')): ?>
                            <div class="alert alert-warning mx-auto" style="width:70%;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                <?=$this->session->flashdata('warning')?>
                            </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success mx-auto" style="width:70%;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                <?=$this->session->flashdata('success')?>
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-6 ncv-kl-bn">
                                <div class="_form_07_main_sub_01" id="firstDiv">
                                    <div class="form-07-head">


                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6 cv-kl-bn" id="secondDiv">
                                <div class="_pl_nb_df">
                                    <div class="_bg_cs">
                                        <img  width="100px" src="<?php echo base_url('assets/images/logo.jpg')?>" alt="logo">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Email</label>
                                        <input type="email" name="email" class="form-control" type="text"
                                            placeholder="Enter Email" required="" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" type="text"
                                            placeholder="Enter password" required="" aria-required="true">
                                    </div>



                                    <div class="form-group">
                                        <div class="_btn_04">
                                            <!-- <a href="#">Login</a> -->
                                            <input type="submit" name="submit" id="submit" style="background-color: transparent;border: none;color: white;width:100%" value="Login">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo form_close(); ?>

    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>public/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url() ?>public/js/admin.js"></script>
    <script src="<?= base_url() ?>public/js/pages/examples/sign-in.js"></script>
</body>

</html>
<script>
var secondDivHeight = document.getElementById('secondDiv').offsetHeight;
document.getElementById('firstDiv').style.height = secondDivHeight + 'px';
</script>