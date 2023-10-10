
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <!-- ALERT-->
                    <?php if($this->session->flashdata('message')) { ?>
                    <div class="alert au-alert-success alert-dismissible fade show au-alert col-lg-9" role="alert">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content">
                            <?php echo @$this->session->flashdata('message'); ?>
                        </span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div><br>
                    <?php } ?>

                    <?php if($this->session->flashdata('warning')) { ?>
                    <div class="alert au-alert-warning alert-dismissible fade show au-alert col-lg-9">
                        <i class="fas fa-times"></i>
                        <span class="content">
                            <?php echo @$this->session->flashdata('warning'); ?>
                        </span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div><br>
                    <?php } ?>
                    <!-- END ALERT-->

                        <div class="row m-t-0">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header text-lg-center">
                                        <h3><strong>User profile</strong></h3>
                                    </div>
                                    <div class="card-body card-block">

                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" src="<?php echo base_url();?>assets/images/icon/user.png"  width="100" height="100" alt="Card image cap">
                                            <?php foreach($accountData as $data){ ?>
                                            <h5 class="text-sm-center mt-2 mb-1"><?php echo $data->username; ?>(<?php if($data->status==1) { echo "Active"; } else { echo "Disabled"; } ?>)</h5><hr>

                                            <h5 class="text-sm-center mt-2 mb-1"><?php echo $data->firstname." ".$data->lastname; ?></h5>

                                            <div class="location text-sm-center">
                                                <i class="fa fa-map-marker"></i> <?php echo $data->address; ?></div><br>
                                            <div class="location text-sm-center bg-primary text-white">
                                                <i class="fa fa-money"></i>Current Balance: <strong><?php echo $data->balance; ?> rwf.</strong></div><hr>

                                            <div class="location text-sm-center">
                                                <i class="fa fa-phone-square"></i> <?php echo $data->phone_no; ?></div>

                                            <div class="location text-sm-center">
                                                <i class="fa fa-envelope"></i> <?php echo $data->email; ?></div>
                                            <?php } ?>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a href="#">
                                                <i class="fa fa-facebook pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin pr-1"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest pr-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>