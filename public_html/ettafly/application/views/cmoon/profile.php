<?php include_once 'includes/header.php';
include_once 'includes/sidebar.php';
?>
<body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-md-8">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Sample Horizontal form with icon</h3>
                    <p class="text-muted m-b-30 font-13"> Use Bootstrap's predefined grid classes for horizontal form </p>
                    <form class="form-horizontal" action="" id="form" method="POST" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="username" readonly value="<?php echo $admin['username']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-email"></i></div>
                                    <input type="name" class="form-control" id="name" name="name" value="<?php echo $admin['name']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div><img src="../images/admin/<?php echo $admin['image']; ?>" width="200px" height="180px"></div><br>
                                    <input type="file" class="image" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <!--              <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Re Password*</label>
                                        <div class="col-sm-9">
                                          <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" class="form-control" id="password2" name="password2" >
                                          </div>
                                        </div>
                                      </div>-->

                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="but_upload" class="tst3 btn btn-info waves-effect waves-light m-t-10">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <?php
            if (isset($_POST['but_upload'])) {

                $time_stamp = time();
                $image = $_FILES['image']['name'];
                $image = $time_stamp . '_' . $image;
                $target_dir = "../images/admin/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $extensions_arr = array("jpg", "jpeg", "png", "gif");
                $location = '../images/admin/' . $image;
                if (in_array($imageFileType, $extensions_arr)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], '../images/admin/' . $image);
                } else {
                    $image = $admin['image'];
                }

                foreach ($_POST AS $key => $value) {
                    $_POST[$key] = addslashes($value);
                }
                extract($_POST);

                $password1 = md5($password);


                $query = $con->prepare("UPDATE admin_login SET name = '$name', image = '$image', password = '$password1' where n_id = '$n_id'");


                $result = $query->execute();
                if ($result) {
                    echo "<script>document.location.href='profile.php?msg=Updated' </script>";
                }
            }


            include_once 'includes/footer.php';
            ?>

        </div>
    </div>
</body>
<script src="js/jquery.validate.js"></script>

<?php if ($_GET['msg'] == 'Updated') { ?>
<script>
    $(document).ready(function() {
$(".tst3").click(function(){
           $.toast({
            heading: 'Profile',
            text: 'Updated Successfully',
            position: 'bottom-right',
           loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
            
          });

     });
     
});     
</script>
<?php } ?>
<script type="text/javascript">
    $(function ()
    {
        $("#form").validate(
                {
                    // Rules for form validation
                    rules:
                            {
                                name:
                                        {
                                            required: true
                                        },
                                password:
                                        {
                                            required: true,
                                            minlength: 6
                                        }
                            },
                    // Messages for form validation
                    messages:
                            {
                                name:
                                        {
                                            required: 'Please Enter Name'
                                        },
                                password:
                                        {
                                            required: 'Please Enter password',
                                            minlength: 'Please Enter Minimum 6 Letters'
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