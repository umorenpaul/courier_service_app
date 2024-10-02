
<?php
//start session


//load and initialize database class
require_once 'class/mysql_crud.php';
$db = new DB();
$contact_info = $db->getRows('contact_info',array('order_by'=>'message_date DESC'));
  $sn=0;
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
                      <span class="panel-eyecandy-title"><i> Enter Tracking Number below to Update Shipment</i>
                      </span>
                  </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">

                          <form action="update_shipment_display.php" method="post">
            								<input type="text" name="trackcode" placeholder="Enter Tracking Code" required />
            								<button type="submit" class="btn btn-primary">Search</button>
            							</form>
                        </div>

                    </div>

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
