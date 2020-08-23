<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if (isset($_POST['submit'])) {

		mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		header('location:order-history.php');

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Shopping Portal | Payment Method</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.png">
	</head>
    <body class="cnt-home">
	
		
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Payment Method</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div>
    <h4 style="color:red" class="text-center">Note: Please! After filling up the following details, save the details before choosing the payment method and then submit </h4>
    <hr>
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                <span class="estimate-title">Billing Address</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <?php
                    $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                        <?php
                        include('includes/config.php');
                        if(isset($_POST['reg'])){
                            $billingaddress = $_POST['billingaddress'];
                            $bilingstate = $_POST['bilingstate'];
                            $billingcity = $_POST['billingcity'];
                            $billingpincode = $_POST['billingpincode'];
                        }
                        mysqli_query($con,"insert into billingdetails(userid,billingaddress,bilingstate ,billingcity ,billingpincode) values('".$_SESSION['id']."','$billingaddress','$bilingstate ','$billingcity','$billingpincode')");

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
                                <textarea class="form-control unicase-form-control text-input"  name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
                            </div>



                            <div class="form-group">
                                <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing City">Billing City <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
                            </div>


                            <button type="submit" name="reg" class="btn-upper btn btn-primary checkout-page-button">Save</button>


                        </form>
                        <?php } ?>

                </div>

            </td>
        </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                <span class="estimate-title">Shipping Address</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <?php
                    $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                    <?php
                    include('includes/config.php');
                    if(isset($_POST['reg'])){
                        $shippingaddress = $_POST['shippingaddress'];
                        $shippingstate = $_POST['shippingstate'];
                        $shippingcity = $_POST['shippingcity'];
                        $shippingpincode = $_POST['shippingpincode'];
                    }
                    mysqli_query($con,"insert into shippingdetails(userid,shippingaddress,shippingstate ,shippingcity ,shippingpincode) values('".$_SESSION['id']."','$shippingaddress','$shippingstate ','$shippingcity','$shippingpincode')");

                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                            <textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
                        </div>



                        <div class="form-group">
                            <label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="Billing City">Shipping City <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
                        </div>


                        <button type="submit" name="reg" class="btn-upper btn btn-primary checkout-page-button">Save</button>
                    </form>
                    <?php } ?>


                </div>

            </td>
        </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                <span class="estimate-title">Credit/Debit Card Details</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <?php
                    $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                        <?php              if(isset($_POST['reg'])){
                        $Cardholdername = $_POST['Cardholdername'];
                        $Cardnumber = $_POST['Cardnumber'];
                        $CVV = $_POST['CVV'];
                        $ExpirationDate = $_POST['ExpirationDate'];
                        $EmailAddress = $_POST['EmailAddress'];
                    }
                        mysqli_query($con,"insert into details(userid,Cardholdername,Cardnumber,CVV,ExpirationDate,EmailAddress) values('".$_SESSION['id']."','$Cardholdername','$Cardnumber','$CVV','$ExpirationDate','$EmailAddress')");
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="info-title" for="Cardholdername"><span>*</span>Card holder name</label>
                                <textarea class="form-control unicase-form-control text-input"  name="Cardholdername" required ><?php echo $row['Cardholdername'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Cardnumber">Card number </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="Cardnumber" name="Cardnumber" pattern ="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required value="<?php echo $row['Cardnumber'];?>">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="CVV">CVV </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="CVV" name="CVV"  required value="<?php echo $row['CVV'];?>" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="ExpirationDate">Expiration Date </label>
                                <input type="month" class="form-control unicase-form-control text-input" id="" name="ExpirationDate"  required value="<?php echo $row['ExpirationDate'];?>" >
                            </div>

                            <div class="form-group" id="credit_cards">
                                <img src="assets/images/visa.jpg" id="visa">
                                <img src="assets/images/mastercard.jpg" id="mastercard">
                                <img src="assets/images/amex.jpg" id="amex">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="EmailAddress">Email Address</label>
                                <input type="email" class="form-control unicase-form-control text-input" id="EmailAddress" name="EmailAddress" required value="<?php echo $row['EmailAddress'];?>" >
                            </div>
                            <button name="reg" type="submit" class="btn-upper btn btn-primary checkout-page-button">save</button>
                        </form>
                    <?php } ?>
                </div>

            </td>
        </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div>

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="checkout-box faq-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12">
                    <h2>Choose Payment Method</h2>
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                        Select your Payment Method
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <form name="payment" method="post">
                                        <input type="radio" name="paymethod" value="COD" checked="checked"> COD
                                        <input type="radio" name="paymethod" value="Debit / Credit card"> Debit / Credit card <br /><br />
                                        <input type="submit" value="submit" name="submit" class="btn btn-primary">


                                    </form>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->


                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.body-content -->

<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
<?php } ?>