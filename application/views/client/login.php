<body class="animsition" >
    <div class="page-wrapper" >
        <div class="page-content--bge5">
            <div class="header d-flex w-100 justify-content-between p-2 border-info border border-right-0 border-left-0 border-top-0" style="background-color: rgba(193,243,254,1)">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo base_url('assets/images/icon/logo.png');?>" alt="Smart parking" />
                    </a>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(193,243,254,1)">
                    <button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active m-2">
                            <a class="nav-link" href="<?php echo base_url('');?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item bg-primary m-2">
                            <a class="nav-link text-white" href="<?php echo base_url('client/login');?>">Login</a>
                        </li>
                        <li class="nav-item bg-secondary m-2">
                            <a class="nav-link text-white" href="<?php echo base_url('main/login');?>">Admin</a>
                        </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container d-lg-flex d-sm-block" 
            style="
            min-height:100vh;
            background-image:linear-gradient(0deg, rgba(255, 0, 150, 0.3), rgba(193,243,254,1)), url('<?php echo base_url('assets/images/smartparking.png')?>');
            background-size:cover;
            background-position:center ">
                <div class="login-wrap col-sm-12 col-lg-6">
                    <div class="login-content">
                        <div class="login-form" >
                            <?php echo form_open('client/login'); ?>

                            <div class="login-logo">
                                <h2 class="text-muted">CUSTOMERS LOGIN PORTAL</h2>
                                <p class="help-block text-md form-text text-danger"><?php echo $this->session->flashdata('login_error'); ?></p>
                            </div>
                                
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="phone_no" name="email" value="<?php echo set_value('email'); ?>" />
                                <small class="help-block form-text text-danger"><?php echo form_error('email'); ?></small>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"/>
                                <small class="help-block form-text text-danger"><?php echo form_error('password'); ?></small>

                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember" />Remember Me
                                </label>
                                
                            </div>
                            <input type="submit" class="au-btn au-btn--block au-btn--blue2" value="Login" name="login"><hr>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

