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
                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/add/<?php echo $segment5; ?>/" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Add Products</a>
                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/sub_category/<?php echo $segment4; ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Back</a>
                <ol class="breadcrumb">
                    <li class="active"><?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?> /</li>
                </ol>
            </div>
        </div>
        <div class="white-box">
            <h3 style="text-transform: capitalize;" class="box-title">Manage <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?>
                <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/add/<?php echo $segment5; ?>" class="btn btn-clock btn-primary" style="float:right; text-transform: capitalize;" >Add <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?></a></h3>
            <hr>
            <!-- /.row -->
            <div class="row">
                <?php
                $no = 1;
                foreach ($data as $data_view) {
                    ?> 
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="product-img">
                                <img src="public/images/admin/<?php echo $data_view->image; ?>"/> 
                                <div class="pro-img-overlay">
                                    <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/edit/<?php echo $segment5; ?>/<?php echo $data_view->id; ?>" class="bg-info"><i class="ti-marker-alt"></i></a>
                                    <a href="javascript:void(0);" data-id="<?php echo $data_view->id; ?>" data-s_id="<?php echo $data_view->sub_id; ?>"  class="bg-danger sa1-warning"><i class="ti-trash"></i></a>    
                                    <!--<a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a>-->
                                </div>
                            </div>
                            <div class="product-text ">
                                <span class="pro-price bg-danger">$<?php echo $data_view->price; ?></span>
                                <h3 class="box-title m-b-0"><?php echo $data_view->name; ?></h3>
                                <div class="pro-overlay">
                                    <a href="<?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>_images/<?php echo $segment4; ?>/<?php echo $data_view->id; ?>" class="btn btn-danger btn-rounded"><i class="fa fa-photo"></i> Images</a>
                                </div>
                                <small class="text-muted db"><?php echo $data_view->type; ?></small>

                            </div>
                        </div>
                    </div>
                    <?php $no++;
                }
                ?>

            </div>
        </div>

    </div>
</div>
<!--row -->
<?php include_once 'includes/footer.php'; ?>

<script type="text/javascript">
    $('.sa1-warning').click(function () {
        var id = $(this).data('id');
        var s_id = $(this).data('s_id');

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
                    document.location.href = '<?php echo base_url(); ?><?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/delete/' + s_id + '/' + id;

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
