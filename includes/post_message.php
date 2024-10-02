
<?php
//start session
session_start();

//load and initialize database class
require_once '../admin-panel/class/mysql_crud.php';
$db = new DB();

$tblContact='contact_info';
//set default redirect url


            $messageData = array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],

            );



            $insert = $db->insert($tblContact, $messageData);
          
            if($insert){
                $company_signup= $db->getRows($tblName ,array('order_by' => 'company_signUp_id DESC LIMIT 1'));
              foreach($company_signup as $lastId){
                                  $memberData=array(
                                   'company_signUp_id'=> $lastId['company_signUp_id'],
                                   'username_email'=>$lastId['email'],
                                   'confirmation_codes'=>$com_code
                                   );
                                    $insert = $db->insert($tblMember, $memberData);
                                    $companyName=$lastId['company_name'];
                 }

            $to =$lastId['email'];
            $subject = "Confirmation from GreenWhale to  $companyNames";
            $header = "GreenWhale: Confirmation from GreenWhale";
            $message = "Please click the link below to verify and activate your account.";
            $message .= "http://www.greenwhale.com/confirm.php?passkey=$com_code";

            $sentmail = mail($to,$subject,$message,$header);
        }
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Your information have been submitted successfully, please check your email to complete your registration.';
                $_SESSION['sessData'] = $sessData;
                 $_SESSION['CONFIRM_CODE'] = $com_code;
                $redirectURL = '../create_pw.php';


    header("Location:".$redirectURL);

exit();
?>
