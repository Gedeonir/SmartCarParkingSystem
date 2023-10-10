
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="page-content--bge5">
                    <div class="container-fluid">

                    <!-- ALERT-->
                    <?php if(@$message) { ?>
                    <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span class="content">
                            <?php echo @$message; ?>
                        </span>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="zmdi zmdi-close-circle"></i>
                            </span>
                        </button>
                    </div><br>
                    <?php } ?>
                    <!-- END ALERT-->


                    <?php foreach($singleslot as $slot){ ?>
                        <div class="row m-t-25">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Update slot </strong><em>No:</em>
                                    </div>
                                    
                                    <form method="POST">
                                    <div class="card-body card-block">    
                                        <div class="form-group">
                                            <label for="space_size" class="control-label mb-1">Space size</label>
                                            <select id="space_size" name="space_size" class="form-control form-control">
                                                <option style="font-weight: bolder;" value="<?php echo $slot->space_size;?>"><?php echo $slot->space_size;?></option>
                                                <option value="Large">Large</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Small">Small</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="space_level" class="control-label mb-1">Space level</label>
                                            <select id="space_level" name="space_level" class="form-control form-control">
                                                <option style="font-weight: bolder;" value="<?php echo $slot->space_level; ?>"><?php echo $slot->space_level; ?></option>
                                                <option value="Normal">Normal</option>
                                                <option value="VIP">VIP</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="space_code" class="control-label mb-1">Slot code</label>
                                            <input id="space_code" name="space_code" type="text" class="form-control" value="<?php echo $slot->space_code; ?>" />
                                            <small class="help-block form-text">U can customize code like this: <strong><?php echo $slot->space_code; ?></strong></small>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-success btn-sm" name="updateslot" value="Update">

                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?php  } ?>




