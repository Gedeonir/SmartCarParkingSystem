
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                    <!-- ALERT-->
                    <?php if($this->session->flashdata('message')) { ?>
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content">
                            <?php echo $this->session->flashdata('message'); ?>
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
                                    
                                    <a href="<?php echo base_url('index.php/clients') ?>" class="au-btn au-btn-icon au-btn--blue2">
                                        <i class="fa fa-eye"></i>Active clients
                                    </a>

                                    <a href="<?php echo base_url('index.php/slots') ?>" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="fa fa-eye"></i>view slots
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <h3 class="title-5 m-b-30">All disabled clients</h3>
                                <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fistname</th>
                                            <th>Lastname</th>
                                            <th>Username</th>
                                            <th>Tel.No</th>
                                            <th>Amount(Bal)</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $i=1;
                                    if(!empty($clientData)) {
                                        foreach($clientData as $row) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->email; ?>"><?php echo $row->firstname; ?></td>
                                            <td><?php echo $row->lastname; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->card_number; ?>"><?php echo $row->card_number; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->email; ?>" class="text-center">
                                                <?php echo $row->balance; ?>
                                            </td>
                                            <td><?php echo $row->address; ?></td>
                                            <td><?php echo date('d, M, Y', strtotime($row->date_created)); ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <div class="table-data-feature">
                                                        <a href="<?php echo base_url('index.php/client/enable/'.$row->client_id); ?>" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-unlock"></i> Enable
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
