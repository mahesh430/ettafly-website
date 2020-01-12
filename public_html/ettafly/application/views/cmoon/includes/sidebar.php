


<!--<div id="wrapper">-->
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"><a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse" style="padding: 0px 1px;">
            <img src="public/images/admin/<?php echo $site->favicon; ?>" alt="homepage" style="width:60px;height:60px;" ></i></a>
        <div class="top-left-part">
            <a class="logo" href="cmoon/dashboard/home">
                <b class="hidden-xs">
                    <span class="hidden-xs"><img src="public/images/admin/<?php echo $site->sitelogo; ?>" alt="home" class="dark-logo" style="width:210px;height:60px;"/></span>
                    <img src="public/images/admin/<?php echo $site->favicon; ?>" alt="home" class="light-logo" style="width:60px;height:60px;">
                </b></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>

        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown"> 
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" style="padding: 2px 45px;"><span><?php echo $site->tittle ?></span></i>
                    <!--<div class="notify"><span class="heartbit"></span><span class="point"></span></div>-->
                </a>
                <ul class="dropdown-menu animated flipInY">
                    <li role="separator" class="divider"></li>
                    <li><a href="cmoon/dashboard/site_settings/view"><i class="icon-wrench"></i> Site Settings</a></li>
                    <li><a href="cmoon/dashboard/contact_settings/view"><i class="icon-wrench"></i> Contact Settings</a></li>
                    <li><a href="cmoon/dashboard/social_links/view"><i class="icon-link"></i> Social Links</a></li>
                    <li><a href="cmoon/dashboard/backup"><i class="ti-email"></i> BackUp</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="cmoon/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <!--            <li class="dropdown"> 
                            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
                                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                            </a>
                        </li>-->


        </ul>
    </div>

</nav>
<!--</div>-->
<!-- Left navbar-header -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">

        <br><br>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span> </div>
            </li>

<!--            <li><div class="hide-menu t-earning"><div id="sparkline2dash" class="m-b-10"></div><small class="db">TOTAL EARNINGS - JUNE 2016</small><h3 class="m-t-0 m-b-0">$2,478.00</h3></div>
            </li>-->
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="cmoon/dashboard/home" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard </span></span></a></li>
            <li> <a class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> E-commerce <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="cmoon/products/products_category/view">Products Category</a> </li>
                    <li> <a href="cmoon/products/products_sub_category/view">Products Sub Category</a> </li>
                    <li> <a href="cmoon/products/product_orders/view">Product Orders</a> </li>
                </ul>
            </li>

            <li> <a class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Cms Pages <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="cmoon/cms_pages/cms_pages/view">Cms Pages</a> </li>
                    <li> <a href="cmoon/services/blog/view">Blog</a> </li>
                    <li> <a href="cmoon/services/services/view">Services</a> </li>
                    <li> <a href="cmoon/cms_pages/testimonials/view">Testimonials</a> </li>
                    <li> <a href="cmoon/services/faq/view">Faq's</a> </li>
                    <li> <a href="cmoon/services/approvers/view">Approvers</a> </li>
                    <li> <a href="cmoon/services/role/view">Role</a> </li>
                    <li> <a href="cmoon/services/role_category/view">Role Category</a> </li>
                    <li> <a href="cmoon/services/project_task/view">Project Task</a> </li>
                </ul>
            </li>

            <li> <a class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Gallery <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="cmoon/gallery/image_gallery/view">Image Gallery</a> </li>
                    <li> <a href="cmoon/gallery/video_gallery/view">Video Gallery</a> </li>
                    <li> <a href="cmoon/gallery/homebanner/view">Homebanner</a> </li>
                </ul>
            </li>

            <li> <a href="cmoon/gallery/upload/logout" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Upload </span></span></a>


            <li><a href="cmoon/logout" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>

        </ul>
    </div>
</div>