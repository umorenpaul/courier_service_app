
<?php
//start session
//  session_start();

//load and initialize database class
require_once '../class/mysql_crud.php';
$db = new DB();
$today = date("d F Y h:i A");
$tblName = 'customers';
$tblTracker='curent_destination_act';
//set default redirect url


            $updateData = array(

                  'status'=>$_POST['status_update'],

            );

         $trackData=array(
           'track_number'=>$_POST['track_no'],
           'country_id'=>$_POST['destination_update'],
           'destination_country_id'=>$_POST['destination_country_id'],
           'status'=>$_POST['status_update'],
           'destination_country_id'=>$_POST['destination_country_id'],
           'act_date'=>$today
         );

            $insert2 = $db->insert($tblTracker, $trackData);
              $insert = $db->update($tblName,   $updateData,$arrayName = array(where, 'tracking_number'=>$_POST['track_no']  ));

             $_SESSION['CONFIRM_MSG'] = 'The shipment has been updated successfully';
                    $redirectURL = '../list_shipments.php';
          header("Location:".$redirectURL);

?>
