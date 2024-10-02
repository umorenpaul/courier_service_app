<?php
//start session
session_start();

//load and initialize database class
require_once 'admin-panel/class/mysql_crud.php';
$db = new DB();


$tblMember='contact_info';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler();

$validator = $pp->getValidator();
$validator->fields(['name','email','phone','subject'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('message')->maxLength(6000);

$pp->sendEmailTo('info@utopiancourier.com'); // ← Your email here

echo $pp->process($_POST);

if($pp->sendEmailTo()){
  $userData = array(
                 'name' => $_POST['name'],
                 'email' => $_POST['email',
                 'phone' =>$_POST['phone'],
                 'subject' =>$_POST['subject'],
                 'message' =>$_POST[ 'message']
             );
           $insert = $db->insert($tblName, $userData);

}

?>
