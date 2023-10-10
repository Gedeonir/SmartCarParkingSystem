<?php
if($userc = $this->session->userdata('clogged_in')) {
    extract($userc);
} else {
    redirect(base_url("client/login"));
}
?>

<body class="animsition" style="background-color: rgba(193,243,254,0.2)">
    <div class="page-wrapper">
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
                            <a href="<?php echo base_url();?>client">
                                <i class="fas fa-home"></i>Home</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/assign/<?php echo $client_id; ?>">
                                <i class="fas fa-plus-square"></i>Add vehicle</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/history">
                                <i class="fas fa-outdent"></i>Parking History</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/account">
                                <i class="fas fa-user"></i>Account</a>
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
                            <a href="<?php echo base_url();?>client">
                                <i class="fas fa-home"></i>Home</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/assign/<?php echo $client_id; ?>">
                                <i class="fas fa-plus-square"></i>Add vehicle</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/history">
                                <i class="fas fa-outdent"></i>Parking History</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url();?>client/account">
                                <i class="fas fa-user"></i>Account</a>
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
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-file-text"></i>
                                        <span class="quantity"><?php echo $historyCount; ?></span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p class="text-md-center">You parked <?php echo $historyCount; ?> times</p>
                                            </div>
                                    
                                            <div class="notifi__footer">
                                                <a href="<?php echo base_url('client/history');?>">View parking history</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <?php
                                    if($userc = $this->session->userdata('clogged_in')) {
                                        extract($userc);
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
                                                        <img src="<?php echo base_url('assets/images/icon/user.png');?>" alt="User" />
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
                                                    <a href="<?php echo base_url('client/account');?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?php echo base_url('client/logout');?>">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <?php
                                    } else {
                                        redirect(base_url("client/login"));
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->