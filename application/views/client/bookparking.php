
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <?php foreach($parkingData as $data){ ?>
                        <h2 class="title-5">You are about to book parking slot in, <?php echo "<b>".$data->parkingName."</b>"; ?></h2>
                    </div>
                </div>
            </div>

            <div class="card col-sm-12 col-lg-6 h-25">
                <div class="card-title" >
                    <h5 class="text-primary text-center pt-2"><?php echo $data->parkingName; ?> Slots status</h5>
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
                            echo '<div class="p-2 w-25 mr-4 h-50 d-block btn-success" >'; 
                            } else {
                                echo '<div class="p-2 w-25 h-50 mr-4 btn-danger">';
                            }?>
                            
                                <p class="text-white text-center" style="font-size:12px"><?php echo $row->space_code; ?></p>
                                </div>
                        <?php  } 
                    ?>
                </div>
            </div>

            <div class="row m-t-15">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-primary">N.B: You have to get to the parking in 2 minutes otherwise your booking will be canceled</p>
                        </div>

                        <?php
                        $userc= $this->session->userdata('clogged_in');
                        extract($userc);
                        ?>

                        <form method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="selectLg" class=" form-control-label">Parking Name</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label><?php echo $data->parkingName; ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="selectLg" class=" form-control-label">Car categories allowed</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label><?php echo $data->carCategories; ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-6">
                                        <input type="hidden" value='<?php echo $data->parkingId; ?>' name="parkingId" id="parkingId">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="hidden" value='<?php echo $data->parkingName; ?>' name="parkingName" id="parkingName">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="selectLg" class=" form-control-label">Select one of vehicles if you have many</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select name="veh_id" id="selectLg" class="form-control-lg form-control" required/>
                                            <option value="">Select your vehicles!</option>
                                            <?php foreach($vehicleData as $vdata) { ?>
                                            <option value="<?php echo $vdata->veh_id;?>"><?php echo $vdata->veh_name."(".$vdata->veh_plateno.")";?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                        <label for="selectLg" class=" form-control-label">Select available space!</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select name="booked_slot" id="selectLg" class="form-control-lg form-control" required/>
                                            <option value="">Select Available Space!</option>
                                            <?php foreach($avSlotData as $sdata) { ?>
                                                <option value="<?php echo $sdata->space_id;?>"><?php echo $sdata->space_code;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <div class="card-footer">
                                <input type="submit" name="saveBooking" class="btn btn-success btn-md" value="Book now">
                                
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>                                            