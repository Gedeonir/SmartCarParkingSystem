
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                <a href="#" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addmoney">
                                        <i class="zmdi zmdi-plus"></i>Recharge Money
                                    </a>
                                    
                                    <a href="<?php echo base_url('clients/inactive') ?>" class="au-btn au-btn-icon au-btn--blue2">
                                        <i class="fa fa-eye"></i>Disabled clients
                                    </a>

                                    <a href="#" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addClient">
                                        <i class="zmdi zmdi-plus"></i>Register Client
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-15">
                            <div class="top-campaign col-md-12">
                                <h3 class="title-5 m-b-30">All clients</h3>
                                <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                               <th>Client ID</th>
                                            <th>Fistname</th>
                                            <th>Lastname</th>
                                            <th>Tel/card No</th>
                                            <th>Amount(Bal)</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $i=1;
                                    if(!empty($clientData)) {
                                        foreach($clientData as $row) { ?>
                                        <tr>

                                            <td><?php echo $i; ?></td>
                                             <td><?php echo $row->client_id; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->email; ?>"><?php echo $row->firstname; ?></td>
                                            <td><?php echo $row->lastname; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->card_number; ?>"><?php echo $row->phone_no; ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->email; ?>" class="text-center">
                                                <?php echo $row->balance." frw"; ?>
                                            </td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo $row->balance; ?>"><?php echo $row->address; ?></td>
                                            <td><?php echo date('d, M, Y', strtotime($row->date_created)); ?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <div class="table-data-feature" data-toggle="tooltip"data-placement="top" title="Add vehicle">
                                                        <a href="<?php echo base_url('client/assign/'.$row->client_id); ?>" class="btn btn-success btn-sm">
                                                            <i class="fa fa-tag"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <div class="table-data-feature" data-toggle="tooltip"data-placement="top" title="Disable">
                                                        <a href="<?php echo base_url('client/disable/'.$row->client_id); ?>" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-eye-slash"></i>
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
