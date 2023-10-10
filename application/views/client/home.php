
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h3 class="title-5">
                                        <?php
                                        if($userc = $this->session->userdata('clogged_in')) { 
                                            extract($userc);
                                            echo "Welcome <b>".$username."</b>, Book parking now!";
                                        }
                                        ?>    
                                    </h3>
                                </div>
                            </div>
                        </div>



                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <div class="d-flex justify-content-between  m-b-15 border-bottom p-2">
                                    <h3 class="title-2">All parkings Available(<?php echo $parkingsCount; ?>)</h3>
                                </div>
                                <div class="row">
                                <?php
                                    foreach($parkingsData as $row) { ?>
                                    <div class="col-sm-6">
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row->parkingName; ?></h5>
                                            <div class="flex">
                                                <label class="w-50 text-muted" style="font-size:12px">Category:</label>
                                                <span style="font-size:13px"><?php echo $row->carCategories; ?></span>
                                            </div>
                                            <div class="flex">
                                                <label class="w-50 text-muted" style="font-size:12px">prices:</label>
                                                <span style="font-size:13px"><?php echo $row->pricePerHour; ?>Rwf/h</span>
                                            </div>
                                            <a href="<?php echo base_url('client/parking/'.$row->parkingId.'/book')?>" class="btn btn-success btn-sm m-auto w-100" data-toggle="tooltip" data-placement="top" title="View details">
                                                <i class="fa fa-eye"></i> Book Parking
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                <?php 
                                } 
                                ?>
                                </div>
                            
                                 
                                <!-- END DATA TABLE-->
                              </div>
                            </div>


                    </div>




