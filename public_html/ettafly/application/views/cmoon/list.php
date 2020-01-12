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
                            <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/add/<?php echo $segment5; ?>" class="btn btn-clock btn-primary" style="float:right; text-transform: capitalize;" >Add <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?></a>
                            <?php if($segment5 != ''){ ?>
                            <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/faq/<?php echo $segment4; ?>" class="btn btn-clock btn-info" style="float:right;">Back</a>
                            <?php } ?>
                        </h3>
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                                <!--<table class="table color-bordered-table muted-bordered-table"></h3>-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Name</th>
                                        <?php if($segment3 == "faq"){ ?>
                                        <th>Sub Faq </th>
                                        <?php } ?>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $data_view) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_view->name; ?></td>
                                            <?php if($segment3 == "faq"){ ?>
                                            <td class="td-actions">
                                                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/sub_<?php echo $segment3; ?>/view/<?php echo $segment5; ?>/<?php echo $data_view->id; ?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <?php } ?>
                                            <td class="td-actions">
                                                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/edit/<?php echo $segment5; ?>/<?php echo $data_view->id; ?>" class="btn btn-success">Edit</a>
                                                <a href="javascript:void(0);" data-id="<?php echo $data_view->id; ?>" data-sub_id="<?php echo $segment5; ?>" data-page="<?php echo $curpage; ?>" class="btn sa1-warning btn-danger">Delete</a>        										
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
        var sub_id = $(this).data('sub_id');

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
                    document.location.href = '<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/delete/'+sub_id+'/'+id;

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
