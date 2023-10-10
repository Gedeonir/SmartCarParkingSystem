            <div class="main-content">
                <div class="section__content section__content">
                    <div class="container-fluid">

                    <!-- ALERT-->

                    <!-- END ALERT-->

                        <div class="row m-t-0">
                            <div class="p-2 w-100 d-lg-flex justify-content-start">
                                <input class="au-input au-input--xs from" type="date" name="from" id="from" placeholder="Search for data..." required/>
                                <input class="au-input au-input--sm to" type="date" name="to" id="to" placeholder="Search for data..." required/>
                                <button class="au-btn btn-info" class="filterByDate" type="submit" onclick="searchByDate()">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </div>

                            <div class="col-lg-12">

                                <div class="card printableArea">
                                    <div class="card-header d-flex justify-content-between">
                                        <img src="<?php echo base_url('assets/images/icon/logo.png');?>" alt="CoolAdmin" />
                                        <h3 class="text-center p-2"><strong>All recent requests for parking</strong></h3>
                                    </div>
                                    <div class="card-body card-block ">
                                        <!---Start table -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive m-b-40">
                                                    <table class="table table-borderless table-data3">
                                                        <thead>

                                                            <tr>
                                                                <th><medium>Driver</medium></th>
                                                                <th><medium>Parking</medium></th>
                                                                <th><medium>S_code</medium></th>
                                                                <th><medium>PlateNo</medium></th>
                                                                <th data-toggle="tooltip" data-placement="top" title="Parking payment status">P.Status</th>
                                                                <th><medium>B.date</medium></th>
                                                                <th><medium>Arrived_at</medium></th>
                                                                <th><medium>left_at</medium></th>
                                                                <!-- <th colspan="2">Action</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody class="filtered"></tbody>
                                                        <tbody class="bookings">
                                                            

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End table -->
                                    </div>
                                    <p class="timePrinted"></p>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-info w-25" onclick="printBookingPage()">Print</a>

                            </div>
                        </div>