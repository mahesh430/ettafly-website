<?php
session_start();
error_reporting(0);

require_once('includes/connect_db.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    $password = substr(str_shuffle($chars), 0, 8);
    $password1 = md5($password);

    $query = $con->query("select * from contact_settings where cemail = '$email'");
    if ($query->rowCount() > 0) {
        
        
        $message ="Tittle :New Password for your site<br/>
                   Password : $password";


        $site_details1 = $con->query("SELECT * FROM site_settings WHERE n_id=1");
        $site_details = $site_details1->fetch(PDO::FETCH_ASSOC);

        $contact_details1 = $con->query("SELECT * FROM contact_settings WHERE n_id=1");
        $contact_details = $contact_details1->fetch(PDO::FETCH_ASSOC);
        
        $site = $site_details ['tittle'];

        require_once "Mail/class.phpmailer.php";

        $email = new PHPMailer();

        $email->From = $contact_details['from_email'];

        $email->FromName = $site;

        $email->Subject = "$subject";

        $email->isHTML(true);

        $email->Body = $message1;

        $email->AddAddress($contact_details['password_email']);


        $sucess = $email->Send();
        if ($sucess) {
            $query1 = $con->prepare("UPDATE admin_login SET password=:password WHERE n_id ='1'");
            $query1->bindValue(':password', $password1, PDO::PARAM_STR);
            $query1->execute();

            echo "<script>document.location.href='forgot_password.php?msg=update'</script>";
        } else {
            echo "<script>document.location.href='forgot_password.php?msg=error1'</script>";
        }
    } else {
        echo "<script>document.location.href='forgot_password.php?msg=error'</script>";
    }
}
?>

     
        
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Elite Admin - is a responsive admin template</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/default.css" n_id ="theme"  rel="stylesheet">

</head>
<body>
<!-- Preloader -->
<!--<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>-->
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
      <form class="form-horizontal" id="form" action="" method="POST" >
        <!--<form class="form-horizontal" method="POST" action="" id="recoverform" >-->
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
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
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
        $("#form").validate(
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