
<!DOCTYPE html>
<html lang="en">
    <base href='<?php echo base_url(); ?>'>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/images/admin/<?php echo $site_settings->logo ?>">
        <title><?php echo $site_settings->tittle ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="adminfiles/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- animation CSS -->
        <link href="adminfiles/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="adminfiles/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="adminfiles/css/colors/default.css" id="theme"  rel="stylesheet">

    </head>
    <body>
        <!-- Preloader -->
        <!--<div class="preloader">
          <div class="cssload-speeding-wheel"></div>
        </div>-->
        <section id="wrapper" class="login-register" style="background: url(adminfiles/plugins/images/login-register.jpg) no-repeat center center / cover !important;">
            <div class="login-box" style="margin-top: 6%;">
                <div class="white-box">
                    <img src="<?php echo base_url(); ?>public/images/admin/<?php echo $site_settings->sitelogo ?>" height="80" width="280" class="d-block mx-auto mb-4">
                    <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url(); ?>cmoon/login/admin_login" method="POST" > 
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <?php
                        $msg = $this->session->flashdata('msg');
                        if ($msg != "") {
                            ?>
                            <div class="alert alert-success animated bounceIn" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class='fa fa-check-circle'></i>  <?= $msg; ?>
                            </div>
                        <?php } ?>
                        <?php
                        $error = $this->session->flashdata('error');
                        if ($error != "") {
                            ?>
                            <div class="alert alert-danger animated bounceIn" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class='fa fa-check-circle'></i>  <?= $error; ?>
                            </div>
                        <?php } ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" id="username" name="username"  placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">

                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">Log In</button>
                            </div>
                        </div>


                    </form>
                    <form class="form-horizontal" id="recoverform" action="<?php echo base_url(); ?>cmoon/login/fpassword" method="POST" >
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                                <?php if ($_GET['msg'] == 'error1') { ?>
                                    <h3 style="color: red; " >Unable to login!</h3>
                                <?php } ?>

                                <?php if ($_GET['msg'] == 'update') { ?>
                                    <h3 style="color: green; " >Password Changed Successfully!</h3>
                                <?php } ?>

                                <?php if ($_GET['msg'] == 'error') { ?>
                                    <h3 style="color: red; " style="padding-left: 182px;">Current Password didnt match!</h3>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">Reset</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </section>
        <!-- jQuery -->
        <script src="adminfiles/plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="adminfiles/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="adminfiles/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

        <!--slimscroll JavaScript -->
        <script src="adminfiles/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="adminfiles/js/waves.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="adminfiles/js/custom.min.js"></script>
        <!-- Sparkline chart JavaScript -->
        <script src="adminfiles/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="adminfiles/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
        <!--Style Switcher -->
        <script src="adminfiles/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    </body>
</html>

<?php if ($_GET['msg'] == 'error') { ?>
    <script type="text/javascript">
        $.msgGrowl({
            type: 'error'
            , title: 'Login'
            , text: 'invalid username or password'
            , position: 'bottom-right'
        });
    </script>

<?php } ?>

<script src="js/jquery.validate.js"></script>

<script type="text/javascript">

    $(function ()
    {

        $("#loginform").validate(
                {
                    // Rules for form validation
                    rules:
                            {
                                username:
                                        {
                                            required: true
                                        },
                                password:
                                        {
                                            required: true
                                        }
                            },
                    // Messages for form validation

                    messages:
                            {
                                username:
                                        {
                                            required: 'Please Enter username'
                                        },
                                password:
                                        {
                                            required: 'Please Enter password'
                                        }
                            },
                    // Do not change code below
                    errorPlacement: function (error, element)
                    {
                        error.appendTo(element.parent());
                    }
                });
    });

</script>

<script type="text/javascript">
    $(function ()
    {
        $("#recoverform").validate(
                {
                    // Rules for form validation
                    rules:
                            {
                                email:
                                        {
                                            required: true,
                                            email: true
                                        }
                            },
                    // Messages for form validation
                    messages:
                            {
                                email:
                                        {
                                            required: 'Please Enter Email',
                                            email: 'Only email format allowed'
                                        }
                            },

                    // Do not change code below
                    errorPlacement: function (error, element)
                    {
                        error.appendTo(element.parent());
                    }
                });
    });
</script>