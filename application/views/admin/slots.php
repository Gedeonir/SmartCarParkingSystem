
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
                                    <h2 class="title-1">view info</h2>
                                    
                                    <a href="<?php echo base_url('slots') ?>" class="au-btn au-btn-icon au-btn--green">
                                        <i class="fa fa-eye"></i>view slots
                                    </a>

                                    <a href="#" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#newslot">
                                        <i class="zmdi zmdi-plus"></i>Register Slot
                                    </a>
                                </div>
                            </div>
                        </div>                       

                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <h3 class="title-3 m-b-30">All parking slots</h3>
                                <div class="table-responsive">
                                  <table class="table table-top-campaign">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Slot code</th>
                                        <th>Slot level</th>
                                        <th>Availability</th>
                                        <th></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $i=1;
                                    foreach($slotData as $row) { ?>
                                      <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->space_code; ?></td>
                                        <td><?php echo $row->space_level; ?></td>
                                        <td><?php
                                            if($row->availability=='1') {
                                                echo '<p class="text-primary">Available</p>'; 
                                            } else {
                                                echo '<mark class="text-danger">Booked</mark>';
                                            }?>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="<?php echo base_url('index.php/slot/edit/'.$row->space_id);?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>&nbsp; &nbsp;
                                                
                                                <a href="<?php echo base_url('index.php/slot/delete/'.$row->space_id);?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Do you want to delete this record?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    <?php 
                                    $i++; } 
                                    ?>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- END DATA TABLE-->
                              </div>
                            </div>
