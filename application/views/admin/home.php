
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container">

                    <!-- ALERT-->
                    <!-- END ALERT-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>

                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">


                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $parkingsCount; ?></h2>
                                                <span>Parkings registered</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $bkSlotCount; ?></h2>
                                                <span>Booked slots (now)</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $reqCount; ?></h2>
                                                <span>All parking requests</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $clientCount; ?></h2>
                                                <span>All drivers Registered</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <div class="d-flex justify-content-between  m-b-10">
                                    <h3 class="title-2">All parkings Available(<?php echo $parkingsCount; ?>)</h3>
                                    <a href="<?php echo base_url('index.php/admin/parkings');?>" class="title-2 text-small">View all</a>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-top-campaign">
                                    <thead>
                                      <tr>
                                        <th>Parking Name</th>
                                        <th>Location</th>
                                        <th>Owner</th>
                                        <th>Prices</th>
                                        <th>Cars allowed</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    foreach($parkingsData as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->parkingName; ?></td>
                                            <td><?php echo $row->parkingLocation; ?></td>
                                            <td><?php echo $row->parkingOwner; ?></td>
                                            <td><?php echo $row->pricePerHour; ?></td>
                                            <td><?php echo $row->carCategories; ?></td>
                                            <td>
                                            <div class="table-data-feature">
                                                <a href="<?php echo base_url('admin/parkings/'.$row->parkingId);?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="View details">
                                                    <i class="fa fa-eye"></i>
                                                </a>&nbsp; &nbsp;
                                                <a href="<?php echo base_url('');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>&nbsp; &nbsp;
                                                
                                                <a href="<?php echo base_url('');?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Do you want to delete this record?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <tr>
                                    <?php 
                                    } 
                                    ?>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- END DATA TABLE-->
                              </div>
                            </div>




