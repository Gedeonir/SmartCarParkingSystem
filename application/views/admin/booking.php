
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <!-- ALERT-->
                    <?php if($this->session->flashdata('message')) { ?>
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
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
                    <!-- END ALERT--> 

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h3 class="title-1">Parkings</h3>
                                    
                                    <a href="<?php echo base_url('index.php/clients') ?>" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Available Clients
                                    </a>
                                </div>
                            </div>
                        </div>                       

                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <h3 class="title-3 m-b-30">Start booking parking</h3>
                                <div class="table-responsive">
                                  <table class="table table-top-campaign">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fistname</th>
                                            <th>Lastname</th>
                                            <th>Vehicle Plate</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $i=1;
                                    if(!empty($bookingData)) {
                                        foreach($bookingData as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->firstname; ?></td>
                                            <td><?php echo $row->lastname; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('parking/arrange/'.$row->client_id); ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-bookmark"></i> Book now!
                                                </a>
                                            </td>

                                            <td>
                                                <div class="table-data-feature">
                                                    <div class="table-data-feature">
                                                        <a href="<?php echo base_url('client/assign/'.$row->client_id); ?>" class="btn btn-success btn-sm">
                                                            <i class="fa fa-plus"></i> Manage
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                            <?php
                                            $i++;
                                        } 
                                    } else {
                                        echo '<td colspan="9"><p class="text-center">No record found!</p></td>';
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
