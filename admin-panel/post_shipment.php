<!DOCTYPE html>
<html>
<?php

    include('admin_header.php');

    $utility_country = $db->getRows('helper_country',array('order_by'=>'ID ASC'));
    $shipment_method = $db->getRows('shipment_method',array('order_by'=>'shipment_method_id ASC'));
 ?>

            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Customer Shipment Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="include-admin/PostShipmentAction.php">
                                        <div class="form-group">
                                            <label>Sender Name</label>
                                            <input class="form-control" required='required' name="sender_name" placeholder="Enter Customer Name" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Sender Address</label>
                                            <input name="sender_address" required='required' class="form-control" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Sender Phone Number</label>
                                            <input class="form-control" required='required' name="sender_phone_number" placeholder="Enter Sender Phone No." type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Shipment Type</label>
                                            <input class="form-control" required='required' name="customer_shipment_type" placeholder="Enter Sender Phone No." type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>	Tracking Number</label>
                                            <input class="form-control" required='required' name="tracking_number" placeholder="Enter Tracking Number" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivery Destination Address</label>
                                            <input class="form-control" required='required' name="delivery_destination_addres" placeholder="Enter Delivery Destination Address" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver's Name</label>
                                            <input class="form-control" required='required' name="receiver_name" placeholder="Enter Delivery Destination Address" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver's Address</label>
                                            <input class="form-control" required='required' name="receiver_address" placeholder="Enter Delivery Destination Address" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Receiver's Phone Number</label>
                                            <input class="form-control" required='required' name="receiver_phone" placeholder="Enter Delivery Destination Address" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Sending Date</label>
                                         <input type="text" name="d1" class="tcal" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Expected Delivery Date</label>
                                           <input type="text" name="d2" class="tcal" value="" />                                          </div>


                                        <div class="form-group">
                                            <label>Shipment Description</label>
                                            <textarea class="form-control" rows="3" required='required'  name="shipment_description"></textarea>
                                        </div>

                                        <div class="form-group">
                                           <label>Sender Country</label>
                                              <select class="form-control" name="country_id" required="required" onchange="state(this.value)" onclick="state(this.value)">
 								                                <option >Choose Country From the List</option>

 										                               <?php foreach($utility_country as $country){?>
 								                        <option value="<?php echo $country['ID']?>"><?php echo $country['name']?></option>
 									                            <?php }?>
 							                                 </select>
                                       </div>

                                            <div class="form-group">
                                                <label>Sender State</label>
                                                 <div id="state_area">
                                             <select class="form-control" required="required">
                                           <option >Choose Country First</option>

                                        						 </select>
                                              </div>
                                        </div>

                                        <div class="form-group">
                                           <label>Receiver Country</label>
                                              <select class="form-control" name="receiver_country_id" required="required" onchange="receiver_state(this.value)" onclick="receiver_state(this.value)">
                                                <option >Choose Country From the List</option>

                                                   <?php foreach($utility_country as $country){?>
                                        <option value="<?php echo $country['ID']?>"><?php echo $country['name']?></option>
                                              <?php }?>
                                               </select>
                                       </div>

                                       <div class="form-group">
                                          <label>Shipement Method</label>
                                             <select class="form-control" name="shipment_method_id" required="required" >
                                               <option >Choose Shipment Method</option>
                                                  <?php foreach($shipment_method as $shipment){?>
                                       <option value="<?php echo $shipment['shipment_method_id']?>"><?php echo $shipment['method']?></option>
                                             <?php }?>
                                              </select>
                                      </div>

                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
