
<?php
//start session
session_start();

//load and initialize database class
require_once 'admin-panel/class/mysql_crud.php';
$db = new DB();


$tblMember='user_login';
//set default redirect url
                  echo  $pw= md5($_POST['password']).sha1($_POST['password']);
                                      
               // $gen_pw=md5($pw);
          
            
                echo  $username_email = trim($_POST['email']);
           
                $status=1;
                $member_info= $db->login($tblMember,$username_email,$pw,$status);
                
                if($member_info){
                  $user_info = $db->getRows($tblMember,array('username'=>$username_email,'password'=>$pw));

              foreach($user_info as $login_details){


                          $_SESSION['EMAIL']=$login_details['email'];



                $redirectURL = 'admin-panel/';
                header("Location:".$redirectURL);
               }
      }
     else{
                $sessData['status']['type'] = 'error';
                $sessData = 'Invalid Login Details.';
                  $_SESSION['sessData'] = $sessData;
        $redirectURL = 'unsuccessful_page.php';
        header("Location:".$redirectURL);
     }

exit();
?>
