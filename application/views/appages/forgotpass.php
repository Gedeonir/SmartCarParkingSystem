

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url("assets/images/icon/logo.png")?>" alt="Digital parking">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo base_url(''); ?>" method="POST">

                                <div class="login-logo">
                                    <h2 class="text-primary">DID YOU FORGET PASSWORD?</h2>
                                </div>

                                <div class="form-group">
                                    <label>Tel Number to receive code</label>
                                    <input class="au-input au-input--full" type="text" name="telnumber" placeholder="Tel number">
                                </div>
                                
                                <div class="login-checkbox">
                                    <label></label>
                                    <label>
                                        <a href="<?php echo base_url('client/login'); ?>">Back to Login</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue2" type="submit" name="sendReq">Send Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

