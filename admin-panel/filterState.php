<?php

//start session
session_start();

 //$_GET['product_category_id'];

//load and initialize database class
require_once 'class/mysql_crud.php';
$db = new DB();
$userData=trim($_GET['id']);




//get PRODUCT TYPE  from database base on product category ids
$helper_state= $db->getRowsState('helper_state', $userData);

?>

<select class="form-control" name="state_id" id='state_id' required="required">


										   <?php foreach($helper_state as $state){?>
								<option value="<?php echo $state['ID']?>"><?php echo $state['name']?></option>
									 <?php }?>
</select>
