
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
                                        <h3 class="text-center"><strong>All recent requests for parking</strong></h3>
                                    </div>

                                    <div class="card-body">
                                        <p class="muted">Check duration for parking</p>
                                        
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-info progress-bar-striped " role="progressbar" style="width: 75%" aria-valuenow="75"
                                             aria-valuemin="0" aria-valuemax="100">75%</div>
                                        </div>
                                        
                                    </div>

                                    <div class="card-body card-block">
                                        <!---Start table -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive m-b-40">
                                                    <table class="table table-borderless table-data3">
                                                        <thead>

                                                            <tr>
                                                                <th>B.No</th>
                                                                <th>Status</th>
                                                                <th>Booking Date</th>
                                                                <th>Duration</th>
                                                                <th data-toggle="tooltip" data-placement="left" title="Amount to pay">Amount</th>
                                                                <th colspan="2" class="text-center">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php 
                                                            $num= 1;
                                                            foreach($parkingInfo as $row) { 
                                                            ?>
                                                            <tr>

                                                                <td><?php echo $num; ?></td>
                                                                
                                                                <td><?php echo $row->bk_status; ?></td>
                                                                <td><?php echo $row->bk_date; ?></td>
                                                                <td>
                                                                    <?php 
                                                                    $given_time = $row->bk_date;
                                                                    $currentime= date("Y-m-d H:i:s");
                                            $ogtime= (strtotime($currentime) - strtotime($given_time)) /36000;
                                                                    $rounded=round($ogtime, 2);
                                                                    echo "<b>".$rounded."</b> hours"; 
                                                                    ?>
                                                                    </td>

                                                                    
                                                                <td><?php $amount = ($rounded/3600)*400; if(($amount)<2) { echo "<b>2rwfs</b>"; } else { echo "<b>".$amount."</b> rwfs"; } ?></td>

                                                                <td class="text-right"><a class="btn btn-success" href="<?php echo base_url('parking/finish/'.$row->bk_id); ?>">Finish</a></td>
                                                                <td><a class="btn btn-danger" href="<?php echo base_url("parking/requests"); ?>">Return</a></td>
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