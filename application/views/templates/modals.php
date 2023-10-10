<?php
     
 $host = "localhost"; 
    $dbname = "digitalparking";    // Database name
    $username = "root";                    // Database username
    $password = "";                        // Database password
    $conn = new mysqli($host, $username, $password, $dbname);
   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  if(!empty($_POST['client_id']) && !empty($_POST['balance']) ){
        // "sendval" and "sendval2" are query parameters accessed from the HTTP POST Request made by the NodeMCU.
            $client_id = $_POST['client_id'];
              $save = $_POST['balance']+=$save;
             $connection = mysqli_connect('localhost', 'root', '', 'digitalparking');
            $query = mysqli_query($connection, "SELECT * FROM account WHERE client_id = '$client_id' ");
            $row = mysqli_fetch_array($query); 
     
        $balancee = $row['balance'];
        $newbalnce = $save + $balancee;

        $sqlup = "UPDATE account SET balance = '$newbalnce' WHERE client_id = '$client_id'";
        $qup = $conn->prepare($sqlup);
        $qup->execute();
        redirect(base_url("clients"));

       
    }
?>
            <div class="modal fade" id="addClient" tabindex="-2" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel">Add new client!</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstname" class="control-label mb-1">First name</label>
                                            <input id="firstname" name="firstname" type="text" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lastname" class="control-label mb-1">Last name</label>
                                            <input id="lastname" name="lastname" type="text" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username" class="control-label mb-1">Username</label>
                                            <input id="username" name="username" type="text" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-expphone_no" class="control-label mb-1">Phone number</label>
                                            <input id="phone_no" name="phone_no" type="number" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="email" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address" class="control-label mb-1">Address</label>
                                            <input id="address" name="address" type="text" class="form-control" autocomplete="off" required>
                                            <small class="help-block form-text">Add address like: Nyarugenge, Gasabo</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_no" class="control-label mb-1">Card Number</label>
                                            <input id="card_no" name="card_no" type="text" class="form-control" autocomplete="off" required>
                                            <small class="help-block form-text">Card XXXXXXXXXXXX</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-actions form-group">
                                    <input type="submit" class="btn btn-primary btn-md" name="saveclient" value="Add">
                                    <button type="reset" class="btn btn-danger btn-md" data-dismiss="modal">
                                        <i class="fa fa-ban"></i> Close
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal client -->

            <div class="modal fade" id="addParking" tabindex="-2" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel">Add new Parking</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstname" class="control-label mb-1">Parking name</label>
                                            <input id="parkingName" name="parkingName" type="text" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lastname" class="control-label mb-1">Parking Location</label>
                                            <input id="location" name="location" type="text" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username" class="control-label mb-1">Assign this to</label>
                                            <input id="email" name="email" type="hidden" class="form-control userEmail" autocomplete="off">
                                            <input id="user_id" name="user_id" type="hidden" class="form-control userId" autocomplete="off">
                                            <button class="btn w-50 btn-md dropdown-toggle au-input dropDownButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Choose owner
                                            </button>
                                            <div class="dropdown-menu p-2">
                                                <input class="au-input au-input--xxs search" type="text" type="text" id="search" placeholder="Search for users..." />
                                                
                                                <div class="p-2 userList">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-expphone_no" class="control-label mb-1">Parking prices per hour</label>
                                            <input id="prices" name="prices" type="number" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Category of cars allowed</label>
                                            <select name="category" id="category" class="form-control-sm form-control" required >
                                                <option value="">Choose category</option>
                                                <option value="Small">Small cars</option>
                                                <option value="Large">Large cars</option>
                                                <option value="Mixed">Mixed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-actions form-group">
                                    <input type="submit" class="btn btn-primary btn-md" name="saveParking" value="Add">
                                    <button type="reset" class="btn btn-danger btn-md" data-dismiss="modal">
                                        <i class="fa fa-ban"></i> Close
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            




       <div class="modal fade" id="addmoney" tabindex="-2" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel">Add money</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                        <form class="form-horizontal"  method="post" >
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-expphone_no" class="control-label mb-1">Client ID</label>
                                    <input  name="client_id" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-expphone_no" class="control-label mb-1">Money Recharge</label>
                                    <input  name="balance" type="text" class="form-control" autocomplete="off">
                                </div>
                            </div>
                    
                            <div class="form-actions" style="background-image:url(err.jpg);">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Exit</button>
                        </div>
                    </div>
                </div>
            </div>

















            <!-- Modals add slot -->
            <div class="modal fade" id="newslot" tabindex="-2" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel" title="New slot">Add new parking slot</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                        <?php foreach($parkingData as $row) { ?>
                                            <input id="parkingId" name="parkingId" type="text" class="form-control" value="<?php echo $row->parkingId; ?>"/>
                                        <?php 
                                            } 
                                        ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="space_code" class="control-label mb-1">Slot code</label>
                                            <input id="space_code" name="space_code" type="text" class="form-control" disabled/>
                                            <small class="help-block form-text">Code's generated by system</small>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="space_price" class="control-label mb-1">Price</label>
                                            <input id="space_price" name="space_price" type="text" class="form-control" disabled/>
                                            <small class="help-block form-text">Price depends on the size & level</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="space_size" class="control-label mb-1">Space size</label>
                                    <select id="space_size" name="space_size" class="form-control form-control">
                                        <option value="">Please select</option>
                                        <option value="Large">Large</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Small">Small</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="space_level" class="control-label mb-1">Space level</label>
                                    <select id="space_level" name="space_level" class="form-control form-control" required>
                                        <option value="">Please select</option>
                                        <option value="Normal">Normal</option>
                                        <option value="VIP">VIP</option>
                                    </select>                                    
                                </div>
                                
                                <div class="form-actions form-group">
                                    <input type="submit" class="btn btn-primary btn-md" name="saveslot" value="Save">
                                
                                    <button type="reset" class="btn btn-danger btn-md">
                                        <i class="fa fa-ban"></i> Cancel
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->


        </div>
    </div>