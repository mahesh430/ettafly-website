<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);
$segment4 = $this->uri->segment(4);
$segment5 = $this->uri->segment(5);
$segment6 = $this->uri->segment(6);
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
                        <h2  style="text-transform: capitalize;"><?php echo $segment4; ?> <?php echo preg_replace('/_/', ' ', $this->uri->segment(3)); ?><a href="<?php echo base_url(); ?><?php echo $segment1; ?>/<?php echo $segment2; ?>/<?php echo $segment3; ?>/view/<?php echo $segment5; ?>" class="btn btn-clock btn-primary" style="float:right">Back</a></h2>
                        <hr><br><br>
                        <form class="form-horizontal" action="<?php echo base_url(); ?><?php echo $segment1; ?>/<?php echo $segment2 ?>/<?php echo $segment3 ?>/<?php echo $segment4; ?>_data/<?php echo $segment5; ?>/<?php echo $segment6; ?>" method="post" id="validation-form" enctype='multipart/form-data'>

                            <div class="form-group">
                                <label class="col-md-2" for="name">Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $data->name; ?>">
                                </div>
                            </div>
                            
                            <input type="hidden" class="form-control" name="sub_id" id="sub_id" value="<?php echo $segment5; ?>">

                            <?php if ($segment3 == 'role_category') { ?>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Main Category</label>                             
                                    <div class="col-md-8">
                                        <select class="form-control" name="sub_id" id="sub_id">
                                            <option value="" >Select one option</option>
                                            <?php foreach($data_cat as $data_cat_view){ ?>
                                            <option value="<?php echo $data_cat_view->id; ?>" <?php if ($data_cat_view->id == $data->sub_id) { ?> selected <?php } ?>><?php echo $data_cat_view->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <?php // if ($segment3 == 'faq') { ?>
                            <div class="form-group">
                                <label class="col-md-2" for="description">Description</label>
                                <div class="col-md-8">
                                    <textarea class="ckeditor" name="description" id="description" rows="5"><?php echo $data->description; ?></textarea>
                                </div>
                            </div>
                            <?php // } ?>
                            
                            <div class="form-group">
                                <div class="col-lg-2 col-sm-6 col-xs-12 col-md-8 col-md-offset-2">
                                    <button type='submit' class="btn btn-block btn-info" >Submit<br></button>           
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>