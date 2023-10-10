<?php


if($user = $this->session->userdata('logged_in')) {
    extract($user);
} else {
    redirect(base_url("login"));
}
?>


<body class="animsition"  style="background-color: rgba(193,243,254,0.2)">
    <div class="page-wrapper" >
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo base_url('assets/images/icon/logo.png');?>" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="<?php echo base_url();?>admin">
                                <i class="fas fa-home"></i>Dashboard</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>admin/manage">
                                <i class="fas fa-users"></i>Manage Admins</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>parkings">
                                <i class="fas fa-table"></i>Manage Parkings</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>clients">
                                <i class="fas fa-user"></i>Manage Clients</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>payements">
                                <i class="fas fa-book"></i>Payements</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>parking/requests">
                                <i class="fas fa-location-arrow"></i>Parking Requests</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url('assets/images/icon/logo.png');?>" alt="Smart parking" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1" style="background-color: rgba(193,243,254,0.2)">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li>
                            <a href="<?php echo base_url();?>admin">
                                <i class="fas fa-home"></i>Dashboard</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>admin/manage">
                                <i class="fas fa-users"></i>Manage Admins</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>parkings">
                                <i class="fas fa-table"></i>Manage Parkings</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>clients">
                                <i class="fas fa-user"></i>Manage Clients</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>payements">
                                <i class="fas fa-book"></i>Payements</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>parking/requests">
                                <i class="fas fa-location-arrow"></i>Parking Requests</a>
                        </li>
                      
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <!-- <form class="form-header" action="<?php echo base_url('client/search'); ?>" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for data..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> -->
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!-- {{ Notification }} -->
                                </div>
                                <div class="account-wrap">
                                    <?php
                                    if($user = $this->session->userdata('logged_in')) {
                                        extract($user);
                                    ?>

                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo base_url('assets/images/icon/user.png');?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php
                                                echo $firstname;
                                                ?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo base_url('assets/images/icon/user.png');?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                        <?php
                                                        echo $firstname." ".$lastname;
                                                        ?>
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                        <?php
                                                        echo $email;
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?php echo base_url('main/account');?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?php echo base_url('admin/manage');?>">
                                                        <i class="zmdi zmdi-plus"></i>Manage Admins</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url('main/logout');?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    } else {
                                        redirect(base_url("main/login"));
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->