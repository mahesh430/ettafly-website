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
                            <div class="panel-body">
                                <div class="form-body">
                                    <h3 class="box-title">About Product</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $data->name; ?>">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <input type="text" id="category" name="category" class="form-control" value="<?php echo $data->category; ?>">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <!--/row-->
                                    <!--                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Category</label>
                                                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                        <option value="Category 1">Category 1</option>
                                                                                        <option value="Category 2">Category 2</option>
                                                                                        <option value="Category 3">Category 5</option>
                                                                                        <option value="Category 4">Category 4</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>-->
                                    <!--
                                    /span
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio1" value="<?php echo $data->name; ?>">
                                                        <label for="radio1">Published</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio2" value="<?php echo $data->name; ?>">
                                                        <label for="radio2">Draft</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!--/span-->
                                    <!--</div>-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>

                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>
                                                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->status; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $data->price; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <h3 class="box-title m-t-40">Product Description</h3>

                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $data->discount; ?>">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Offer</label>
                                                <input type="text" class="form-control" id="offer"  name="offer" value="<?php echo $data->offer; ?>">
                                            </div>
                                        </div>
                                        <!--/span-->


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                    <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $data->stock; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color</label>
                                                <input type="text" class="form-control" id="color" name="color" value="<?php echo $data->color; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rating</label>
                                                <input type="text" class="form-control" id="rating" name="rating" value="<?php echo $data->rating; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fabric</label>
                                                <input type="text" class="form-control" id="fabric" name="fabric" value="<?php echo $data->fabric; ?>">
                                            </div>
                                        </div>

                                        <!--                                        <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Meta Keyword</label>
                                                                                        <input type="text" class="form-control" value="<?php echo $data->description; ?>">
                                                                                    </div>
                                                                                </div>-->

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="4"><?php echo $data->description; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" id="image" class="dropify" data-default-file="public/images/admin/<?php echo $data->image; ?>" />
                                                <!--<input type="file"  name="files" id="name">-->
                                                <span class="help-block"><small>Note:Upload clear images of size 900*600</small></span>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $data->product_id; ?>">
                                        <?php
                                        $sub_product = $this->cms_model->get_data_by_type('sub_id', $product_id, 'sub_category');
                                        ?>
                                        <input type="hidden" class="form-control" id="cat_id" name="cat_id" value="<?php echo $sub_product->cat_id; ?>">


                                        <hr>
                                    </div>
                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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