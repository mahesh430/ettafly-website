<?php
include_once 'includes/header.php';
include_once  'includes/sidebar.php'; 

$n_id = $_GET['n_id'];
$cms = $con->prepare("SELECT * FROM cms_pages WHERE n_id ='$n_id'");
$cms->execute();
$cms_pages = $cms->fetch(PDO::FETCH_ASSOC);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box ">
                        <h2 >Edit Cms<a href="data_table.php" class="btn btn-clock btn-primary" style="float:right">Back</a></h2>               
                   <hr><br><br>
                    <form class="form-horizontal" action="" method="post" id="validation-form" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label class="col-md-1" for="name">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $cms_pages['name']; ?>">
                            </div>
                        </div>
<!--                                              <div class="form-group">-->
                           <!--                           <label class="col-md-1" for="email">Email</label>
                                                    <div class="col-md-6">
                                                        <input type="email" id="example-email" name="example-email" class="form-control" value="<?php $cms_pages['name']; ?>">
                                                    </div>
                                                </div>-->

                       
                        <div class="form-group">
                            <label class="col-md-1" for="input-file-now">Image</label>
                            <div class="col-md-6">
                            <input type="file" name="file" id="input-file-now" class="dropify" data-default-file="../images/admin/<?php echo $cms_pages['image']; ?>" />
                            <span class="help-block"><small>Note:Upload clear images of size 2000*600</small></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1" for="description">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description" id="description" rows="5"><?php echo $cms_pages['description']; ?></textarea>
                            </div>
                        </div>
<!--                        <div class="form-group">
                            <label class="col-md-1" for="email">Email</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>-->

                        


<!--                <div class="form-group">
                    <label class="col-md-1" for="email">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php echo $cms_pages['name']; ?>">
                        <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
                </div>-->
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
if (isset($_POST['but_upload']) && $n_id == '') {

    $time_stamp = time();
    $image = $_FILES['file']['name'];
    $image = $time_stamp.'_'.$image;
    $target_dir = "../images/admin/";
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $location = '../images/admin/'.$image;
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/admin/'.$image);
    }


    foreach ($_POST AS $key => $value) {
        $_POST[$key] = addslashes($value);
    }
    extract($_POST);

    $string = str_replace(" ", "-", $name); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9 \-]/', '-', $string); // Removes special chars.
    $p_link = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.


    $query = $con->prepare("INSERT INTO cms_pages (name,image,description,p_link) VALUES('$name', '$image', '$description', '$p_link')");
    $result = $query->execute();
    if ($result) {
        echo "<script>document.location.href='data_table.php?msg=Updated'</script>";
    }
}

if (isset($_POST['but_upload']) && $n_id != '') {

    $time_stamp = time();
    $image = $_FILES['file']['name'];
    $image = $time_stamp.'_'.$image;
    $target_dir = "../images/admin/";
    $target_file = $target_dir.basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $location = '../images/admin/'.$image;
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/admin/'.$image);
    } else {
        $image = $cms_pages['image'];
    }

    foreach ($_POST AS $key => $value) {
        $_POST[$key] = addslashes($value);
    }
    extract($_POST);


    $string = str_replace(" ", "-", $name); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9 \-]/', '-', $string); // Removes special chars.
    $p_link = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.


    $query = $con->prepare("UPDATE cms_pages SET name = '$name', image = '$image',  description = '$description', p_link = '$p_link' where n_id = '$n_id'");
    $result = $query->execute();
    if ($result) {
        echo "<script>document.location.href='data_table.php?msg=Updated' </script>";
    }
}

include_once 'includes/footer.php';
?>

