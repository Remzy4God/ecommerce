<?php 
session_start();
  if (isset($_POST["add_to_cart"])){
		        if (isset($_SESSION["shopping_cart"])){ //check if the shopping cart variable has some data
		            $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
		            if (!in_array($_GET["id"],$item_array_id)){
		                $count = count($_SESSION["shopping_cart"]);
		                $item_array = array(
		                    'item_id' => $_GET["id"],
		                    'item_name' => $_POST["hidden_name"],
		                    'item_price' => $_POST["hidden_price"],
		                    'item_quantity' => $_POST["quantity"],
		                );
		                $_SESSION["shopping_cart"][$count] = $item_array;
		                //echo '<script>window.location="products1.php"</script>';
		            }else{
		                echo '<script>alert("Product is already Added to Cart")</script>';
		                echo '<script>window.location="view_cart.php"</script>';
		            }
		        }else{
		            $item_array = array(
		                'item_id' => $_GET["id"],
		                'item_name' => $_POST["hidden_name"],
		                'item_price' => $_POST["hidden_price"],
		                'item_quantity' => $_POST["quantity"],
		            );
		            $_SESSION["shopping_cart"][0] = $item_array;
		        }
		    }

		    if (isset($_GET["action"])){
		        if ($_GET["action"] == "delete"){
		            foreach ($_SESSION["shopping_cart"] as $keys => $value){
		                if ($value["item_id"] == $_GET["id"]){
		                    unset($_SESSION["shopping_cart"][$keys]);
		                    echo '<script>alert("Product has been Removed...!")</script>';
		                    echo '<script>window.location="view_cart.php"</script>';
		                }
		            }
		        }
		    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Excellent Motors</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<script>
					  function payWithPaystack(){
					    var handler = PaystackPop.setup({
					      key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
					      email: 'customer@email.com',
					      amount: <?php echo $total*100; ?>;,
					      currency: "NGN",
					      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
					      metadata: {
					         custom_fields: [
					            {
					                display_name: "Mobile Number",
					                variable_name: "mobile_number",
					                value: "+2348012345678"
					            }
					         ]
					      },
					      callback: function(response){
					          alert('success. transaction ref is ' + response.reference);
					      },
					      onClose: function(){
					          alert('window closed');
					      }
					    });
					    handler.openIframe();
					  }
					</script>	
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="products.html">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="login.html">Login</a></li> 
								<li><a href="login.html">Sign Up</a></li>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.html">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="royce.php">Royce Rolls</a></li>
						<li><a href="honda.php">Honda</a></li>
						<li><a href="kia.php">Kia</a></li>
						<li><a href="products.html">Mercedenz Benz</a></li>
						<li><a href="products.html">Ferari</a></li>
						<li><a href="products.html">BMW</a></li>
						
						
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="row table-responsive">
			<form action="https://paystack.com/pay/vfdm05igi8" method="post">
			<table class="table table-bordered ">
						<tr>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
						<?php 
      						if (!empty($_SESSION['shopping_cart'])){
      							$total=0;
      							foreach ($_SESSION['shopping_cart'] as $key => $values) {
      						?>		
      						<tr>
      							<td><?php echo $values["item_name"];?></td>
      							<td><?php echo $values["item_quantity"];?></td>
      							<td>#<?php echo $values["item_price"];?></td>
      							<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td><!--2 means 2 decimal point-->
      							<td><a href="view_cart.php?action=delete&id=<?php echo $values['item_id']; ?>"><span class="text-danger">Remove</span></a></td>
      						</tr>		
      						<?php
      						   $total=$total + ($values["item_quantity"] * $values["item_price"]); 
      							} ?><!--end of foreach loop-->
      						<tr>
      							<td colspan="3" align="right">Total</td>
      							<td align="right">#<?php echo number_format($total, 2); ?></td>
      							<td><a href="checkout.php"><img src="images/checkout.png" class="img-responsive" width="100"></a></td>
      						</tr>
      						<tr>
      					         <td align="center">
      					         	Click the button below to pay
      					         	<!--<a href="https://paystack.com/pay/vfdm05igi8"><img src="images/checkout.png" class="img-responsive" width="100"></a>-->
      					         	<button type="button" onclick="payWithPaystack()">Pay</button>
      					         </td>	
      						</tr>	
      							
      						<?php } ?><!-- end of If statement-->	
      						<form >
					  <script src="https://paystack.com/pay/vfdm05igi8"></script>
					  <button type="button" onclick="payWithPaystack()"> Pay </button> 
					</form>
					 
					
					</table>
				    </form>
					<?php 
                            //insert items into database
                            include ('database/database.php');
                            $item=$values["item_name"];
                            $qty=$values["item_quantity"];
                            $totalprice=$values["item_price"] * $values["item_quantity"];
                            $query=mysqli_query($connect,"INSERT INTO purchase_details (product_name,quantity,price) VALUES ('$item','$qty','$totalprice') ");
                            if(!$query){
                            	echo "Failed to Submit Data";
                            }
                            if ($query){
                            	echo "Purchase Data Submitted";
                            }
      						?>
		</div> 

<!-- //banner -->

<!-- //newsletter -->
<!-- footer -->
	<div id="myfooter">
		<p>© 2018 Excel Car Deals. All rights reserved | Design by <em >Abbey Special</em></p>	
			
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!--<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>