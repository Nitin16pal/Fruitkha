<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="#"><img class="logo_icon img-responsive" src="<?php echo base_url("assets/admin/images/logo/logo.png") ?>" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="<?php echo base_url("assets/admin/images/logo/logo.png") ?>" alt="#" /></div>
                <div class="user_info">
                    <h6>Welcome</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
            <li><a href="<?php echo base_url('accounts/dashboard')?>"><i class="fa fa-map purple_color2"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Categories</span></a>
                <ul class="collapse list-unstyled" id="element">
                    <li><a href="<?php echo base_url('accounts/category/')?>">> <span>Category</span></a></li>
                    <li><a href="<?php echo base_url('accounts/sub_category/')?>">> <span>Sub Category</span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('accounts/products/')?>"><i class="fa fa-files-o yellow_color"></i> <span>Products</span></a></li>
            <li><a href="<?php echo base_url('accounts/blogs_video/')?>"><i class="fa fa-video-camera red_color"></i> <span>BMR TV</span></a></li>
            <li><a href="<?php echo base_url('accounts/banner_ads/')?>"><i class="fa fa-photo green_color"></i> <span>Ad Banners</span></a></li>
            <li><a href="<?php echo base_url('accounts/media')?>"><i class="fa fa-photo green_color"></i> <span>Media</span></a></li>
            <li>
                <a href="#magazine" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-file-pdf-o red_color"></i> <span>Manage Magazines</span></a>
                <ul class="collapse list-unstyled" id="magazine">
                    <li><a href="<?php echo base_url('accounts/magazine')?>"><i class="fa fa-file-pdf-o green_color"></i> <span>Magazines</span></a></li>
                    <li><a href="<?php echo base_url('accounts/magazine_queries')?>"><i class="fa fa-envelope-o yellow_color"></i> <span>Magazine Queries</span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('accounts/contact-enquiries')?>"><i class="fa fa-envelope purple_color2"></i> <span>Contact Enquiry</span></a></li>
        </ul>
    </div>
</nav>
<!-- end sidebar -->
<!-- right content -->
<div id="content">
    <!-- topbar -->
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="full">
                <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                <div class="right_topbar">
                    <div class="icon_info">
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                            <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                        </ul> -->
                        <ul class="user_profile_dd">
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user">Welcome Admin</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo base_url('accounts/logout')?>"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- end topbar -->