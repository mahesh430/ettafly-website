<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);
$segment4 = $this->uri->segment(4);
$segment5 = $this->uri->segment(5);
?>
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?></h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <!--<a href="edit_product?id=<?php echo $row->id; ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Add Products</a>-->
                <ol class="breadcrumb">
                    <li><a href="index">Dashboard</a></li>
                    <li class="active"><?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="col-sm-12">

                    <div class="white-box">
                        <h3 style="text-transform: capitalize;" class="box-title">Manage <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?>
                            <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/add" class="btn btn-clock btn-primary" style="float:right; text-transform: capitalize;" >Add <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?></a></h3>
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                                <!--<table class="table color-bordered-table muted-bordered-table"></h3>-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <!--<th>Products</th>-->
                                        <th>Image</th>
                                        <th>Banner</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($data as $data_view){
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_view->name; ?></td>
<!--                                            <td class="td-actions">
                                               <a href="eliteadmin/products/view_products/view/<?php echo $data_view->id; ?>" class="btn btn-info"> Add Products </a>
                                            </td>-->
                                            <td>     
                                                <?php if ($data_view->image != '') { ?>

                                                    <a data-fancybox="gallery" href="<?php echo base_url(); ?>public/images/admin/<?php echo $data_view->image; ?>">
                                                        <img src="<?php echo base_url(); ?>public/images/admin/<?php echo $data_view->image; ?>" style="width: 300px; height: 200px" class="img-fluid"></a>
                                                <?php } else { ?>
                                                    <h4>N/A</h4>
                                                <?php } ?>
                                            </td>
                                            <td>     
                                                <?php if ($data_view->banner != '') { ?>

                                                    <a data-fancybox="gallery" href="<?php echo base_url(); ?>public/images/admin/<?php echo $data_view->banner; ?>">
                                                        <img src="<?php echo base_url(); ?>public/images/admin/<?php echo $data_view->banner; ?>" style="width: 300px; height: 80px" class="img-fluid"></a>
                                                <?php } else { ?>
                                                    <h4>N/A</h4>
                                                <?php } ?>
                                            </td>
                                            
                                            <td class="td-actions">
                                                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/edit/<?php echo $data_view->id; ?>" class="btn btn-success">Edit</a>
                                                <a href="javascript:void(0);" data-id="<?php echo $data_view->id; ?>" data-page="<?php echo $curpage; ?>" class="btn sa1-warning btn-danger">Delete</a>        										
                                            </td>
                                        </tr>

                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>

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
        var id = $(this).data('id'); 

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
                    document.location.href = '<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/delete/'+id;

                });
    });

</script>



<?php
$msg = $this->session->flashdata('msg');
if ($msg == "deleted") {
    ?>
    <script type="text/javascript">
        swal({
            title: "Deleted",
            text: "Your Data has been deleted.",
            timer: 1500,
            type: "warning",
            showConfirmButton: false
        });
    </script>
<?php } ?>
<?php
$msg = $this->session->flashdata('msg');
if ($msg == "added") {
    ?>
    <script type="text/javascript">

        swal({
            title: "Good job",
            text: "Data added Successfully.",
            timer: 1500,
            type: "success",
            showConfirmButton: false
        });

    </script>
<?php } ?>

<?php
$msg = $this->session->flashdata('msg');
if ($msg == "updated") {
    ?>
    <script type="text/javascript">

        swal({
            title: "Good job",
            text: "Data Updated Successfully.",
            timer: 1500,
            type: "success",
            showConfirmButton: false
        });

    </script>
<?php } ?>
