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
                    <!--<div class="col-auto"><a href="<?php echo base_url(); ?>cmoon/dashboard/home" class="btn btn btn-outline-warning"><i class="fal fa-chevron-left mr-1"></i>Back</a>-->

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
                    <hr>
                    <form class="form-horizontal" id="form" action="<?php echo base_url(); ?><?php echo $segment1; ?>/<?php echo $segment2 ?>/<?php echo $segment3 ?>/edit/1" method="post" id="validation-form" enctype='multipart/form-data'>

                        <div class="form-group">
                            <label class="col-md-1" for="contactno">Office no</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo $contact->contactno; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="phoneno">Contact no</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phoneno" id="phoneno" value="<?php echo $contact->phoneno; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1" for="cemail">Contact Email</label>
                            <div class="col-md-6">
                                <input type="email" id="cemail" name="cemail" class="form-control" value="<?php echo $contact->cemail; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="cemail">Office Email</label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $contact->email; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="from_email">From Email</label>
                            <div class="col-md-6">
                                <input type="email" id="from_email" name="from_email" class="form-control" value="<?php echo $contact->from_email; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="Password Email">password_email</label>
                            <div class="col-md-6">
                                <input type="email" id="password_email" name="password_email" class="form-control" value="<?php echo $contact->password_email; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-1" for="address">Address</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="address" id="address" rows="5"><?php echo $contact->address; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-1 col-sm-6 col-xs-12 col-md-6 col-md-offset-2">
                                <button type='submit'  class="btn btn-block btn-default" >Submit</button>           
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

                                phoneno:
                                        {
                                            required: true
                                        },
                                contactno:
                                        {
                                            required: true
                                        },
                                cemail:
                                        {
                                            required: true,
                                            email: true
                                        },
                                from_email:
                                        {
                                            required: true,
                                            email: true
                                        },
                                password_email:
                                        {
                                            required: true,
                                            email: true
                                        },
                                address:
                                        {
                                            required: true
                                        }
                            },
                    // Messages for form validation

                    messages:
                            {
                                tittle:
                                        {
                                            required: 'Please Enter Tittle'
                                        },

                                phoneno:
                                        {
                                            required: 'Please Enter Phone number'
                                        },
                                contactno:
                                        {
                                            required: 'Please Enter Phone number'
                                        },
                                cemail:
                                        {
                                            required: 'Please Enter Email',
                                            email: 'Only email format allowed'
                                        },
                                from_email:
                                        {
                                            required: 'Please Enter Email',
                                            email: 'Only email format allowed'
                                        },
                                password_email:
                                        {
                                            required: 'Please Enter Email',
                                            email: 'Only email format allowed'
                                        },
                                address:
                                        {
                                            required: 'Please adderss'
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






