
<?php
//start session


//load and initialize database class
require_once 'class/mysql_crud.php';
$db = new DB();
$contact_info = $db->getRows('contact_info',array('order_by'=>'message_date DESC'));
$utility_country = $db->getRows('helper_country',array('order_by'=>'ID ASC'));
$last_shipment_update = $db->getRows('current_destination_act',array('order_by'=>'curent_destination_act_id DESC limit 1'));
  $sn=0;
  foreach ($last_shipment_update as $value) {
    $track_code=$value['track_number'];
    $post_destination_country_id=$value['country_id'];
    $destination_country=$db->getDestinationCountry($value['country_id']);
    $last_destination=$db->getDestinationCountry($value['country_id']);
  }
 ?>
<!DOCTYPE html>
<html>
<?php
  include('admin_header.php');
 ?>
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b> <?php echo 'Administrator'?> </b>

                    </div>
                </div>
                <!--end  Welcome -->
            </div>




            <div class="row">
                <div class="col-lg-8">



                    <!--Area chart example -->

                    <!--End area chart example -->
                    <!--Simple table example -->

                    <!--End simple table example -->

                </div>

                <div class="col-lg-8">
                  <div class="panel-footer">
                      <span class="panel-eyecandy-title"><i> New Generated Tracking NUmber handle with care till after used</i>
                      </span>
                  </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3><?php echo ('UC'. rand(1,234567780753))?> </h3>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Notifications-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i>Track Shipment Panel(Last Shipment Posted)
                        </div>

                        <div class="panel-body">
                            <form role="form" method="post" action="include-admin/UpdateShipmentAction.php">
                            <div class="list-group">
                                <a class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i>Tracking Number:
                                    <span class="pull-right text-muted small"><em><?php echo $track_code ?></em>
                                      <input type="hidden" name="track_no" value="<?php echo $track_code ?>" />
                                    </span>
                                </a>
                                <a  class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i>Destination country details:
                                    <span class="pull-right text-muted small"><em><?php echo $destination_country?></em>
                                    <input type="hidden" name="destination_country_id" value="<?php echo $post_destination_country_id ?>" />
                                    </span>
                                </a>
                                <a  class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i>Last Destination:
                                    <span class="pull-right text-muted small"><em><?php echo $last_destination?></em>
                                    </span>
                                </a>
                                <a class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i>Set new Location
                                    <span class="pull-right text-muted small"><em><select name="destination_update" id="destination_update">
                                      <?php foreach($utility_country as $country){?>
                           <option value="<?php echo $country['ID']?>"><?php echo $country['name']?></option>
                                 <?php }?>
                                    </select></em>
                                    </span>
                                </a>

                                <a class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i>Status
                                    <span class="pull-right text-muted small"><em><select name="status_update" id="status_update">

                           <option value="Delivered">Delivered</option>
                               <option value="IN-TRANSIT">In-Transit</option>
                                    </select></em>
                                    </span>
                                </a>


                                  <button type="submit" class="btn btn-primary">Submit Update</button>
                             </form>
                            </div>
                            <!-- /.list-group -->

                        </div>

                    </div>
                    <!--End Notifications-->
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
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
