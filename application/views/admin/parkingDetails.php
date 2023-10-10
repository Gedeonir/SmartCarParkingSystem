
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#newslot">
                                        <i class="zmdi zmdi-plus"></i>add new slot
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <div class="d-flex justify-content-between  m-b-10">
                                    <?php
                                    foreach($parkingData as $row) { ?>
                                    <h3 class="title-2"><?php echo $row->parkingName; ?> Details</h3>
                                    <?php 
                                        } 
                                    ?>
                                    <div class="table-data-feature">
                                        <a href="<?php echo base_url('');?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>&nbsp; &nbsp;
                                        
                                        <a href="<?php echo base_url('');?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Do you want to delete this record?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive d-lg-flex d-sm-block">
                                    <?php
                                    foreach($parkingData as $row) { ?>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="flex">
                                            <label class="p-2 w-50">Parking Name:</label>
                                            <span><?php echo $row->parkingName; ?></span>
                                        </div>
                                        <div class="flex">
                                            <label class="p-2 w-50">Location:</label>
                                            <span><?php echo $row->parkingLocation; ?></span>
                                        </div>
                                        <div class="flex">
                                            <label class="p-2 w-50">Parking Owner:</label>
                                            <span><?php echo $row->parkingOwner; ?></span>
                                        </div>
                                        <div class="flex">
                                            <label class="p-2 w-50">Parking prices:</label>
                                            <span><?php echo $row->pricePerHour; ?></span>
                                        </div>
                                        <div class="flex">
                                            <label class="p-2 w-50">Cars Allowed in parking:</label>
                                            <span><?php echo $row->carCategories; ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="card col-sm-12 col-lg-6 h-100">
                                        <div class="card-title" >
                                            <h5 class="text-primary text-center pt-2"><?php echo $row->parkingName; ?> Slots</h5>
                                        </div>
                                        <div class="d-flex">
                                            <div class="d-flex m-2" >
                                                <div class="btn-success p-1" style="width:20px; height:20px;" >
                                                </div>
                                                <p class="text-success pl-2 text-center" style="font-size:12px">Available</p>
                                            </div>
                                            <div class="d-flex m-2" >
                                                <div class="btn-danger p-1" style="width:20px; height:20px;" >
                                                </div>
                                                <p class="text-danger pl-2 text-center" style="font-size:12px">Occupied</p>
                                            </div> 
                                        </div>

                                        <div class="card-body d-flex flex-2" >
                                            <?php
                                                foreach($slotData as $row) { ?>
                                                    <?php
                                                    if($row->availability=='1') {
                                                    echo '<div class="p-2 w-25 mr-4 d-block btn-success" >'; 
                                                    } else {
                                                        echo '<div class="p-2 w-25 mr-4 btn-danger">';
                                                    }?>
                                                    
                                                        <p class="text-white text-center" style="font-size:12px"><?php echo $row->space_code; ?></p>
                                                        </div>
                                                <?php  } 
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <!-- END DATA TABLE-->
                              </div>
                            </div>




