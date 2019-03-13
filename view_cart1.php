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
		<?php
		include ('database/database.php');
        session_start();
			if (isset($_GET['product_id']))
			$product_id=$_GET['product_id'];
			else
			$product_id=1;
			if (isset($_GET['action']))
			$action=$_GET['action'];
			else
			$action="empty";

			switch($action)
			{
				case "add":
					if (isset($_SESSION['cart'][$product_id]))
					$_SESSION['cart'][$product_id]++;
					else
					$_SESSION['cart'][$product_id]=1;
				break;
				case "remove":
					if (isset($_SESSION['cart'][$product_id]))
					{
						$_SESSION['cart'][$product_id]--;
						if ($_SESSION['cart'][$product_id]==0)
						unset($_SESSION['cart'][$product_id]);
					}
				break; 
				case "empty":
					unset($_SESSION['cart']);
				break;
			}
		if (isset($_SESSION['cart']))
			{	
			echo "<table cellpadding='5' cellspacing='5' border='2px' style='width:100%;' class='table-bordered'>";
			
				echo "<tr style='color:#ff0000;'>";
				echo "<td align='center'>Image</td>";
				echo "<td align='center' style='width: 150px; word-break: break-all;'>Product Name</td>";
				echo "<td align='center'>Brand</td>";
				echo "<td align='center'>Price</td>";
				echo "<td align='center'>Quantity</td>";
				echo "<td align='center'>Add</td>";
				echo "<td align='center'>Subtotal</td>";
				echo "</tr>";
			$total=0;
			foreach($_SESSION['cart'] as $product_id => $x)
			{
			$result=mysqli_query($connect,"Select * from products where serial_no=$product_id");
			$myrow=mysqli_fetch_array($result);
			$name=$myrow['product_name'];
			$image=$myrow['product_image'];
			$price=$myrow['product_price'];
			$brand=$myrow['car_category'];
			$line_cost=$price*$x;
			$total=$total+$line_cost;
			
			
				echo "<tr style='color:black'>";
				?>
			    <td align='center'><br />
				<img src="<?php echo $image; ?>" style ="border-radius:5px ;height:75px; width:100px;"/>
			    </td>
				<?php
				echo "<td align='center' style=' word-wrap:break-word; word-break: break-all; width:100px;'>$name</td>";
				echo "<td align='center'>$brand</td>";
				echo "<td align='center'>Php $price.00</td>";
				echo "<td align='center'>x$x | <a href='view_cart1.php?product_id=".$product_id."&action=add' style='text-decoration:none;'>Add</a></td>";
				echo "<td align='center' style='width:100px;'><a href='view_cart1.php?product_id=".$product_id."&action=remove' style='text-decoration:none;'>Remove</a></td>";
				echo "<td align='center'>= # $line_cost.00";
				echo "</tr>";
				}
				echo "<tr style='color:#ff0000;'>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td align='center'>Total</td>";
				echo "<td align='center' colspan='2'>Action</td>";
				echo "</tr>";
				echo "<tr style='color:#000000;'>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td align='center'><br /><b>= Php $total.00</b></td>";
				echo "<td align='center'><br /><a href='view_cart1.php?product_id=".$product_id."&action=empty'><img src = 'images/cart_11.png'></a></td>";
				echo "<td align='center'><br /><a href='check_out.php'><img src = 'images/checkout.png' width='120px' height='40px'></a></td>";
				echo "</tr>";
				echo "</table>";
			}
		 	else
				echo "<font color='#000000'><h3><b>Cart is empty</b></h3><br /><a href='products.php'><input type='button' class='link1' value='Back' style='width:70px; height:35px; font-size:15px;'></a></font>";

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