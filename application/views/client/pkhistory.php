
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
                                    <div class="card-header">
                                        <h3><strong>Client Parking history</strong></h3>
                                    </div>
                                    <div class="card-body card-block">
                                        <!---Start table -->
                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <div class="table-responsive m-b-40">
                                                    <table class="table table-borderless table-data3">
                                                        <thead>

                                                            <tr>
                                                                <th>No</th>
                                                                <th>Space code</th>
                                                                <th>PlateNo</th>
                                                                <th>Name</th>
                                                                <th>PhoneNo</th>
                                                                <th data-toggle="tooltip" data-placement="top" title="Parking payment status">P.Status</th>
                                                                <th>Booking Date</th>
                                                                <th>expire_at</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                            $num= 1;
                                                            foreach($historyData as $hist) { 
                                                            ?>
                                                            <tr>

                                                                <td><?php echo $num; ?></td>
                                                                <td><?php echo $hist->space_code; ?></td>
                                                                <td><?php echo $hist->veh_plateno; ?></td>
                                                                <td><?php echo $hist->firstname; ?></td>
                                                                <td><?php echo $hist->phone_no; ?></td>
                                                                <td><?php echo $hist->bk_status; ?></td>
                                                                <td>
                                                                    <small>
                                                                        <?php echo date("Y M dS H:i", strtotime($hist->bk_date)); ?>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <small>
                                                                        <?php echo date("Y M dS H:i", strtotime($hist->expire_at)); ?>
                                                                    </small>
                                                                </td>
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