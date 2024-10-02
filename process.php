<?php
 session_start();
 require_once 'admin-panel/class/mysql_crud.php';
 $db = new DB();

$tbl1='curent_destination_act';
$tbl2='customers';
 $trackcode = trim($_POST['trackcode']);
 $column1='track_number';
 $column2='tracking_number';
// $id = $db->escape_string($_GET['id']);

 //selecting data associated with this particular id



$customers_info= $db->trackShipment($tbl2,$trackcode,$column2);



 ?>
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include("nav.php");
?>
<!-- navigation -->
<!-- banner section -->
<section class="inner-w3ls">
	<div class="container">
		<h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
		<p class="text-center w3layouts w3 w3l agileits agileinfo">Look up the status of your shipment.</p>
	</div>
</section>
<!-- /banner section -->
<!-- tracking section -->
<section class="shipment-w3ls">
	<div class="container">
		<i class="fa fa-braille" aria-hidden="true"></i>
		<h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile">Shipment Track</h3>
		</div>
	<div class="container">
		<div class="content-w3ls">
			<div class="content1-w3ls">

				<?php
if($customers_info){

					// code...
			?>
				<h2>Order Tracking: <?php echo $customers_info['tracking_number'] ?></h2>
			</div>
			<div class="content2-w3ls">
				<div class="content2-header1">
					<p>Shipped Via : <span><?php  echo $db->getShipmentMethod($customers_info['shipment_method_id']); ?></span></p>
				</div>

				<div class="content2-header1">
					<p>Ship To : <span><?php echo $db->getDestinationCountry($customers_info['destination_country_id']) ?></span></p>
				</div>
				<div class="content2-header1">
					<p>Expected Date : <span><?php echo  $customers_info['expected_delivery_date']  ?></span></p>
				</div>

			</div>
			<?php

    }
    else{?>

      <?php

      echo 'No record';
    } ?>

		</div>
	</div>
</section>
<!-- /tracking section -->
<!-- transit section -->
<section class="transit-w3ls">
	<div class="container">

		<h3 class="text-center">Transit Location</h3>
		<p class="text-center">View Transit Progress in different Countries</p>
	</div>
	<div class="container">
		<div class="colorful-tab-wrapper" id="colorful-flatline">
			<ul class="colorful-tab-menu">
				<li class="colorful-tab-menu-item active" tab-color="#445370"></li>
				<li class="colorful-tab-menu-item" tab-color="#00A566"></li>
				<li class="colorful-tab-menu-item" tab-color="#C9003C"></li>
				<li class="colorful-tab-menu-item" tab-color="#E54400"></li>
				<li class="colorful-tab-menu-item" tab-color="#33accc"></li>
			</ul>
			<div class="colorful-tab-container">
				<div class="colorful-tab-content active" id="fl-0">
					<div class="skill-info">
						<div class="table-responsive">
							<div class="colorful-tab-content active" id="fl-0">
											<div class="skill-info">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th>Location</th>
																<th>Date</th>
																<th>Activitt</th>
																<th>Remark</th>

															</tr>
														</thead>
														<tbody>
															<?php
                            //  $current_info = $db->getRows($tbl1,array( $column1=>$trackcode));
                            $result = $db->getData("SELECT * FROM curent_destination_act WHERE track_number='$trackcode'");

                                 if($result){

                                  foreach ($result as  $value) {


														?>
															<tr>
																<td>
																	<h4><?php echo $db->getDestinationCountry($value['country_id']) ?></h4>
																</td>
																<td><?php echo $value['act_date'] ?></td>
																<td><?php echo $value['status'] ?></td>
																<td><?php echo $value['comment'] ?></td>

															</tr>
                        <?php
                      }
    }
                        else{?>

                          <?php
                                echo 'No Record';
                           }?>

														</tbody>
													</table>
												</div>
											</div>
										</div>
						</div>
					</div>
				</div>

			</div>
		</div>
  <!-- Flatline -->
	</div>
</section>
<!-- /transit section -->
<!-- footer section -->
<?php
include("footer.php");
?>
<!-- /footer section -->
<a href="#0" class="cd-top">Top</a>
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/index.js"></script>
<script src="js/top.js"></script>
<script type="text/javascript" src="js/colorfulTab.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

        $("#colorful").colorfulTab();

        $("#colorful-elliptic").colorfulTab({
            theme: "elliptic"
        });

       $("#colorful-flatline").colorfulTab({
            theme: "flatline"
        });

        $("#colorful-background-image").colorfulTab({
            theme: "flatline",
            backgroundImage: "true",
            overlayColor: "#2d3305",
            overlayOpacity: "0.8"
        });

    });
  </script>
<!-- /js files -->
</body>
</html>
