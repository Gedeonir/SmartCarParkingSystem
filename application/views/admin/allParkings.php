
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">

                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <div class="d-flex justify-content-between  m-b-10">
                                    <label class="title-6">All parkings Available(<?php echo $parkingsCount; ?>)</label>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addParking">
                                        <i class="zmdi zmdi-plus p-2"></i>Add Parking
                                    </button>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-top-campaign">
                                    <thead>
                                      <tr>
                                        <th class="fs-10">Parking Name</th>
                                        <th class="fs-6">Location</th>
                                        <th class="fs-6">Owner</th>
                                        <th class="fs-6">Prices</th>
                                        <th class="fs-6">Cars allowed</th>
                                        <th class="fs-6">Actions</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    foreach($allParkingsData as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->parkingName; ?></td>
                                            <td><?php echo $row->parkingLocation; ?></td>
                                            <td><?php echo $row->parkingOwner; ?></td>
                                            <td><?php echo $row->pricePerHour; ?> Rwf/h</td>
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




