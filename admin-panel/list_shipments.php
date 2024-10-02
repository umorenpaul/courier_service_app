<?php

//load and initialize database class
require_once 'class/mysql_crud.php';
$db = new DB();
$shipment_info = $db->getRows('customers',array('order_by'=>'sending_date DESC'));
  $sn=0;
?>

<!DOCTYPE html>
<html>

<head>
  <?php
      include('admin_header.php');

   ?>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ALL  SHIPMENT  LIST
                        </div>
                        <div class="panel-body">
                          <?php
                          if(!empty($_SESSION['CONFIRM_MSG'])){
                            echo '<b><i>'. $_SESSION['CONFIRM_MSG'].'</i></b>';
                            unset($_SESSION['CONFIRM_MSG']);
                          }

                          ?>
                                                      <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender Name</th>
                                            <th>Receiver Name</th>
                                            <th>Destination Address</th>
                                            <th>Sent Date</th>
                                            <th>Expected Deliver Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($shipment_info  as $shipment){
                                      $sn=$sn+1;
                                        ?>

                                      <tr>
                                            <td><?php echo $sn ?></td>
                                              <td><?php echo $shipment['customer_name']?></td>
                                                <td><?php echo $shipment['receiver_name']?></td>
                                            <td><?php echo $shipment['delivery_destination_addres']?></td>
                                          <td><?php echo $shipment['sending_date']?></td>
                                    <td><?php echo $shipment['expected_delivery_date']?></td>
                                      <td><?php echo $shipment['status']?></td>
                                  </tr>
                                <?php }?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
