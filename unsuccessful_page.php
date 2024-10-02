<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
 session_start();
include("nav.php");
?>
<!-- navigation -->
<!-- banner section -->

<section class="inner-w3ls">
	<div class="container">
		<h2 class="text-center w3 w3l agileinfo wthree">Track Your Shipment</h2>
		<p class="text-center w3 w3l agileinfo wthree">Shipments are maintained by best hands in the industry, coupled with customer service oriented support. We offer line support for Courier /Logistics Companies on next day priority basis.</p>
	</div>
</section>
<!-- /banner section -->
<!-- contact address -->
<!-- contact address -->
<!-- contact section -->
<section class="contact-w3ls">
	<div class="container">
		<i class="fa fa-compass" aria-hidden="true"></i>
		<h3 class="text-center"><?php if(isset($_SESSION['sessData']))
  echo $_SESSION['sessData'];
	 unset($_SESSION['sessData']);
		 ?> <br />   Please enter correct login details below</h3>


			<form action="sign_in.php" method="post" >

                <div class="col-lg-12 col-md-6 col-sm-6 contact-agile1">
					<div class="control-group form-group">
                        <div class="controls">
                            <label class="contact-p1"><h2>Username:</h2></label>
                            <input type="text" required class="form-control" name="email" id="trackcode" required data-validation-required-message="Please enter your username.">
                            <p class="help-block"></p>
														<label class="contact-p1"><h2>Password:</h2></label>
														    <input type="password" required class="form-control" name="password" id="trackcode" required data-validation-required-message="Please enter your password.">
                        </div>
                    </div>

				</div>

				<div class="col-lg-12">

                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Login Again</button>
				</div>
				<div class="clearfix"></div>
            </form>
						<div id="error_message" style="width:100%; height:100%; display:none; ">
																 <h4>
																		 Error
																 </h4>
																 Sorry there was an error sending your form.
														 </div>
														 <div id="success_message" style="width:100%; height:100%; display:none; ">
<h2>Success! Your Message was Sent Successfully.</h2>
</div>
												 </div>
	</div>
</section>
<!-- /contact section -->
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
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<!-- /js files -->
</body>
</html>
