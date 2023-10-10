
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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <?php foreach($adminData as $data){ ?>
                                    <div class="card-header text-lg-center">
                                        <h3><strong>Admin profile (<?php echo $data->username; ?>)</strong></h3>
                                    </div>
                                    <div class="card-body card-block">
                                            <div class="col-lg-12">
                                                <div class="table-responsive table--no-card">
                                                    <table class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo $data->firstname; ?></th>
                                                                <th class="text-right"><?php echo $data->lastname; ?></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><i class="fa fa-spinner"></i> Role</td>
                                                                <td class="text-right"><?php echo $data->admin_role; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa fa-phone-square"></i> Phone Number</td>
                                                                <td class="text-right"><?php echo $data->phone_no; ?></div></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa fa-envelope"></i>  Email</td>
                                                                <td class="text-right"><?php echo $data->email; ?></div></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <?php } ?>

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