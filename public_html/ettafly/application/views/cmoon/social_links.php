<?php
include_once 'includes/header.php';
include_once  'includes/sidebar.php'; 
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container-fluid">
            <br><br>
<!--            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Simpler Dashboard</h4> </div>
            </div>-->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Default Basic Forms</h3>
                    <hr>
                    <form class="form-horizontal" action="" method="post" id="validation-form" enctype='multipart/form-data'>

                        <div class="form-group">
                            <label class="col-md-1" for="facebook">Facebook</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $social_links['facebook']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="twitter">Twitter</label>
                            <div class="col-md-6">
                                <input type="text" id="twitter" name="twitter" class="form-control" value="<?php echo $social_links['twitter']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="instagram">Instagram</label>
                            <div class="col-md-6">
                                <input type="text" id="instagram" name="instagram" class="form-control" value="<?php echo $social_links['instagram']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="google">Google</label>
                            <div class="col-md-6">
                                <input type="text" id="google" name="google" class="form-control" value="<?php echo $social_links['google']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="linkedin">Linkedin</label>
                            <div class="col-md-6">
                                <input type="text" id="linkedin" name="linkedin" class="form-control" value="<?php echo $social_links['linkedin']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="pinterest">Pinterest</label>
                            <div class="col-md-6">
                                <input type="text" id="pinterest" name="pinterest" class="form-control" value="<?php echo $social_links['pinterest']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="youtube">Youtube</label>
                            <div class="col-md-6">
                                <input type="text" id="youtube" name="youtube" class="form-control" value="<?php echo $social_links['youtube']; ?>">
                            </div>
                        </div>

                        
                                <!--<span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>-->
                            <div class="form-group">
                                <div class="col-lg-1 col-sm-6 col-xs-12 col-md-6 col-md-offset-2">
                                    <button type='submit' name='but_upload' value="Submit" class="btn btn-block btn-default" >Submit</button>           
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
if (isset($_POST['but_upload'])) {

    foreach ($_POST AS $key => $value) {
        $_POST[$key] = addslashes($value);
    }
    extract($_POST);

    $query = $con->prepare("UPDATE social_links SET facebook = '$facebook', twitter = '$twitter', linkedin = '$linkedin', instagram = '$instagram', google = '$google', youtube = '$youtube', pinterest = '$pinterest' where n_id = '1'");
    $result = $query->execute();
    if ($result) {
        echo "<script>document.location.href='social_links.php?msg=Updated' </script>";
    }
}

include_once 'includes/footer.php';
?>

<?php if ($_GET['msg'] == 'Updated') { ?>
    <script type="text/javascript">
        $.msgGrowl({
            type: 'success'
            , title: 'Social Details'
            , text: 'Updated Successfully'
            , position: 'bottom-right'
        });
    </script>

<?php } ?>


