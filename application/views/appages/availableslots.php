
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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                	<?php foreach($clientData as $data){ ?>
                                    <h2 class="title-1">Arrange parking for <?php echo "<b>".$data->firstname."</b>"; ?></h2>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-15">
                        	<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="text-success">N.B: One customer can have multiple vehicles</p>
                                    </div>

                                    <?php foreach($clientData as $sdata) { ?>
                                    <form action="<?php echo base_url('parking/arrange/'.$sdata->client_id); ?>" method="post" class="form-horizontal">
                                    	<div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="selectLg" class=" form-control-label">Select one of vehicles if client has many</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <select name="veh_id" id="selectLg" class="form-control-lg form-control">
                                                    	<?php foreach($vehicleData as $vdata) { ?>
                                                        <option value="<?php echo $vdata->veh_id;?>"><?php echo $vdata->veh_name."(".$vdata->veh_plateno.")";?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-6">
                                                    <label for="selectLg" class=" form-control-label">Select available space!</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <select name="booked_slot" id="selectLg" class="form-control-lg form-control">
                                                        <?php foreach($avSlotData as $sdata) { ?>
                                                        <option value="<?php echo $sdata->space_id;?>"><?php echo $sdata->space_code;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                    	<div class="card-footer">
                                        	<input type="submit" name="saveBooking" class="btn btn-success btn-md" value="Book now">
                                        	<button type="reset" class="btn btn-danger btn-md">
                                            	<i class="fa fa-ban"></i> Cancel
                                        	</button>
                                    	</div>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
