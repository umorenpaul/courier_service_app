
<?php
//start session
session_start();

//load and initialize database class
require_once '../class/mysql_crud.php';
$db = new DB();
$today = date("d F Y h:i A");
$tblName = 'customers';
$tblTracker='curent_destination_act';
//set default redirect url


            $userData = array(
                'customer_name' => $_POST['sender_name'],
                'customer_address' => $_POST['sender_address'],
                'customer_phone' => $_POST['sender_phone_number'],
                'customer_shipment_type' => $_POST['customer_shipment_type'],
                'tracking_number' => $_POST['tracking_number'],
                'sending_date' => $_POST['d1'],
                'expected_delivery_date' => $_POST['d2'],
                'created_date' => $today,
                'delivery_destination_addres' => $_POST['receiver_address'],
                'destination_country_id' => $_POST['receiver_country_id'],
                'receiver_name'=>$_POST['receiver_name'],
                'receiver_phone_num' => $_POST['receiver_phone'],
                'shipment_descriptn' => $_POST['shipment_description'],
                'sender_state_id' => $_POST['state_id'],
                'sender_country_id'=>$_POST['country_id'],
                'shipment_method_id'=>$_POST['shipment_method_id']

            );
  $insert = $db->insert($tblName, $userData);
         $trackDate=array(
           'track_number'=>$_POST['tracking_number'],
           'country_id'=>$_POST['country_id'],
           'status'=>'In Transit',
           'comment'=>'Order Processed: Ready for Utopian Courier',
           'act_date'=>$today
         );

            $insert2 = $db->insert($tblTracker, $trackDate);
             $_SESSION['CONFIRM_MSG'] = 'The new shipment has been submitted successfully';
                    $redirectURL = '../list_shipments.php';
          header("Location:".$redirectURL);

?>
