
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
                            <div class="col-md-12 m-b-15">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Register new Admin</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-0">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Registration</strong>
                                    </div>

                                    <form action="<?php echo base_url('admin/manage'); ?>" method="POST" class="form-horizontal">                                      
                                        <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="firstname" class="form-control-label">Firstname</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="firstname" name="firstname" class="form-control" required/>   
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="lastname" class="form-control-label">Lastname</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="lastname" name="lastname" class="form-control" required/>   
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="username" class="form-control-label">Username</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="username" name="username" class="form-control" required/>   
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="phone_no" class="form-control-label">Phone number</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="phone_no" name="phone_no"
                                                class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="email" class="form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="email" id="email" name="email"
                                                class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="password" class="form-control-label">Password</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="password" id="password" name="password" class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="admin_role" class="form-control-label">Admin Role</label>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="admin_role" name="admin_role"class="form-control" required/>
                                            </div>
                                        </div>

                                        </div>

                                        <div class="card-footer">
                                            <input type="submit" name="saveAdmin" class="btn btn-success btn-md" value="Save">
                                            <button type="reset" class="btn btn-danger btn-md">
                                                <i class="fa fa-ban"></i> Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong>All admins</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <!---Start table -->
                                        <div class="row m-t-0">
                                            <div class="col-md-12">
                                                <div class="table-responsive m-b-40">
                                                    <table class="table table-borderless table-data3">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Username</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Role</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                            $num= 1;
                                                            foreach($adminData as $data) { 
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $num; ?></td>
                                                                <td data-toggle="tooltip" data-placement="left" title="<?php echo $data->firstname." ".$data->lastname; ?>"><?php echo $data->username; ?></td>
                                                                <td><?php echo $data->email; ?></td>
                                                                <td><?php echo $data->phone_no; ?></td>
                                                                <td><?php echo $data->admin_role; ?></td>
                                                            </tr>
                                                            <?php $num++; } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End table -->
                                    </div>
                                </div>
                            </div>
                        </div>