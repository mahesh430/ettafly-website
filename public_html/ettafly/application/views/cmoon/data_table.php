<?php
include_once 'includes/header.php';
include_once  'includes/sidebar.php'; 


//$perpage = 10;
//
//if (isset($_GET['page']) & !empty($_GET['page'])) {
//    $curpage = $_GET['page'];
//} else {
//    $curpage = 1;
//}
//$start = ($curpage * $perpage) - $perpage;
//$cms = $con->prepare("SELECT * FROM cms_pages");
//$cms->execute();
//$cms_pages = $cms->rowCount();
//$endpage = ceil($cms_pages / $perpage);
//
//if ($_GET['page'] != '' && $_GET['page'] != 1) {
//    $no = (($curpage - 1) * 10) + 1;
//} else {
//    $no = 1;
//}


$n_id = $_GET['n_id'];
if ($_GET['did']) {
    $did = $_GET['did'];
    $cms = $con->prepare("DELETE FROM cms_pages WHERE n_id = :n_id");
    $cms->bindValue(':n_id', $did);
    $result = $cms->execute();
    if ($result) {
//echo "Deleted Successfully";
        header("Location: cms_pages.php");
    }
    ?>
    <script type="text/javascript">
        window.location = "cms_pages.php?msg=del";
    </script>
<?php } ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!--        <div id="page-wrapper">-->
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="col-sm-12">

                    <div class="white-box">
                         <h3 class="box-title m-b-0">Data Export</h3>
            <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
            <div class="table-responsive">
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        
                                                <!--<table class="table color-bordered-table muted-bordered-table"></h3>-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    $cms = $con->query("SELECT * FROM cms_pages ");
                                    while ($cms_pages = $cms->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $cms_pages['name']; ?></td>
    <!--                                            <td><?php echo $cms_pages['tittle']; ?></td>-->
                                            <td>     
                                                <?php if ($cms_pages['image'] != '') { ?>

                                                    <img src="../images/admin/<?php echo $cms_pages['image']; ?>" width="180px" height="130px" alt="" />
                                                    </a>
                                                <?php } else { ?>
                                                    <h4>N/A</h4>
                                                <?php } ?>
                                            </td>
                                            <td class="td-actions">
                                                <a href="edit_data_table.php?n_id=<?php echo $cms_pages['n_id']; ?>" class="btn btn-medium"  > Edit </a>
                                                <a href="javascript:void(0);" data-n_id="<?php echo $cms_pages['n_id']; ?>" class="btn btn-danger sa1-warning">Delete</a>        										
                                            </td>
                                        </tr>

                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
<!--                            <section n_id="paginations">


                                <div class="pagination">


                                    <ul class="pagination">
                                        <?php if ($curpage != '' && $curpage != 1) { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                                  <span aria-hidden="true">&laquo;</span>
                                                    <span class="previous">First</span>
                                                </a>
                                            </li>
                                        <?php } ?>


                                        <?php if ($curpage != '' && $curpage != 1) { ?>

                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $curpage - 1 ?>" aria-label="Next">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php for ($i = 1; $i <= $endpage; $i++) { ?>

                                            <li class="page-item <?php
                                            if ($curpage == $i) {
                                                echo 'active';
                                            }
                                            ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                        <?php } ?>

<?php if ($curpage != $endpage) { ?>

                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $curpage + 1 ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        <?php } ?>

<?php if ($curpage != $endpage) { ?>

                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                                  <span aria-hidden="true">&raquo;</span>
                                                    <span class="next">Last</span>
                                                </a>
                                            </li>
<?php } ?>
                                    </ul>

                                </div>

                            </section>-->
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>
</div>

<?php include_once 'includes/footer.php'; ?>


<script type="text/javascript">
    $('.sa1-warning').click(function () {
        var n_id = $(this).data('n_id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
                function () {
                    document.location.href = '?did=' + n_id;

                });
    });

</script>
<?php if ($_GET['msg'] == 'del') { ?>
    <script type="text/javascript">
        swal("Deleted!", "Your data has been deleted.", "success");
    </script>
<?php } ?>