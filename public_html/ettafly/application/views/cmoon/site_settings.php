<?php 
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);
$segment4 = $this->uri->segment(4);
$segment5 = $this->uri->segment(5);
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Default Basic Forms</h3>
                    <hr>
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

                    <form class="form-horizontal" action="<?php echo base_url(); ?><?php echo $segment1; ?>/<?php echo $segment2 ?>/<?php echo $segment3 ?>/edit/1" method="post" id="validation-form" enctype='multipart/form-data'>

                        <div class="form-group">
                            <label class="col-md-1" for="tittle">Tittle</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tittle" id="tittle" value="<?php echo $site->tittle; ?>">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-1" for="sitelogo">Site logo</label>
                            <div class="col-md-6">
                                <input type="file" name="sitelogo" id="input-file-now" class="dropify" data-default-file="public/images/admin/<?php echo $site->sitelogo; ?>" />
                                <span class="help-block"><small>Note:Upload clear images of size 200*60</small></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="favicon">Favicon</label>
                            <div class="col-md-6">
                                <input type="file" name="favicon" id="input-file-now" class="dropify" data-default-file="public/images/admin/<?php echo $site->favicon; ?>" />
                                <span class="help-block"><small>Note:Upload clear images of size 90*60</small></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1" for="maps">Map</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="maps" id="maps" rows="5"><?php echo $site->maps; ?></textarea>
                            </div>
                        </div>
                        
<!--                        <div class="form-group">
                            <label class="col-md-1" for="maps">Map 2</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="maps2" id="maps2" rows="5"><?php echo $site->maps2; ?></textarea>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-md-1" for="meta_title">Meta Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="meta_tittle" id="meta_tittle" value="<?php echo $site->meta_tittle; ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1" for="meta_keywords">Meta Keywords</label>
                            <div class="col-sm-6">
                                <textarea type="text" class="form-control" name="meta_keywords" rows="4" id="meta_keywords"><?php echo $site->meta_keywords; ?></textarea>
                        </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="col-md-1" for="meta_description">Meta Description</label>                           
                            <div class="col-sm-6">
                                <textarea type="text" class="form-control" name="meta_description" rows="5" id="meta_description"><?php echo $site->meta_description; ?></textarea>
                                <!--<span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>-->
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-1 col-sm-6 col-xs-12 col-md-6 col-md-offset-2">
                                <button type='submit' class="btn btn-block btn-default" >Submit</button>           
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script type="text/javascript">

    $(function ()
    {
        $.validator.addMethod("numbersonly", function (value, element)
        {
            return this.optional(element) || /^[ ()0-9+-]+$/i.test(value);
        }, "Please enter only characters");
        $("#form").validate(
                {
                    // Rules for form validation
                    rules:
                            {
                                tittle:
                                        {
                                            required: true
                                        },
                                address:
                                        {
                                            required: true
                                        },

                                image:
                                        {
                                            accept: "jpg,png,jpeg,gif"
                                        },

                                logo:
                                        {
                                            accept: "jpg,png,jpeg,gif"
                                        }
                            },
                    // Messages for form validation

                    messages:
                            {
                                tittle:
                                        {
                                            required: 'Please Enter Tittle'
                                        },

                                address:
                                        {
                                            required: 'Please adderss'
                                        },
                                image:
                                        {
                                            accept: "Only image type jpg/png/jpeg/gif is allowed"
                                        },
                                logo:
                                        {
                                            accept: "Only image type jpg/png/jpeg/gif is allowed"
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




