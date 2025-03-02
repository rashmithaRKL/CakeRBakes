<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CakesRBakes</title>

  <link rel="icon"  href="images/logo.jpg" />

 
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--slick slider stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- slick slider -->

  <link rel="stylesheet" href="css/slick-theme.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    #topic{
  margin:20px;
}
#topic>h1{
  text-align:center;
  font-size:3rem;
}
#topic>p{
  text-align:center;
  font-size:1.5rem;
  font-style:italic;
}
/* .container{
  width:100vw;
  display:flex;
  justify-content:space-around;
  flex-wrap:wrap;
  padding:40px 20px;
} */
.card{
  display:flex;
  flex-direction:column;
  width:300px;
  margin-bottom:60px;
}
.card>div{
  box-shadow:0 15px 20px 0 rgba(0,0,0,0.5);
}
.card-image{
  width:300px;
  height:250px;
}
.card-image>img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:bottom;
}
.card-text{
  margin:-30px auto;
  margin-bottom:-50px;
  height:150px;
  width:250px;
  background-color:  #FEA4D4;
  color:#fff;
  padding:20px;
}
.card-meal-type{
  font-style:italic;
}
.card-title{
  font-size:1.5rem;
  margin-bottom:20px;
  margin-top:5px;
}
.card-body{
  font-size:1rem;
}
.card-price{
  width:100px;
  height:100px;
  background-color:#FF6699;
  color:#fff;
  margin-left:auto;
  font-size:1rem;
  display:flex;
  justify-content:center;
  align-items:center;
}

  </style>

</head>

<body class="sub_page">

  <!-- <div class="main_body_content"> -->

    <div class="hero_area">
      <!-- header section strats -->
      <?php require "header.php";?>
      <!-- end header section -->
    </div>

    <br><br><br><br>
    <!-- about section -->

    <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://static.vecteezy.com/system/resources/previews/019/879/186/non_2x/user-icon-on-transparent-background-free-png.png" class="img-responsive" alt="">
                    
                </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Jason Davis
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Account & </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Wishlist </a>
						</li>
						<!-- <li>
							<a href="cart.php" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Cart</a>
						</li> -->
						
					</ul>
				</div>
				<!-- END MENU -->
			   
           <div class="portlet light bordered">
                                                <!-- STAT -->
                                                <!-- <div class="row list-separated profile-stat"> -->
                                                    <!-- <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 37 </div>
                                                        <div class="uppercase profile-stat-text"> Orders </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 51 </div>
                                                        <div class="uppercase profile-stat-text"> Cart </div>
                                                    </div> -->
                                                    <!-- <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="uppercase profile-stat-title"> 61 </div>
                                                        <div class="uppercase profile-stat-text"> Wish List </div>
                                                    </div> -->
                                                <!-- </div> -->
                                                <hr>
                                                <!-- <label for="inputPassword6" class="col-form-label">Username</label>
                                                <input type="text" placeholder="panda"> -->
                                                <label for="inputPassword6" class="col-form-label">Email Address</label>
                                                <input type="text" placeholder="panda@gmail.com">
                                                <label for="inputPassword6" class="col-form-label">Mobile Number</label>
                                                <input type="text" placeholder="0751588823">
                                                <label for="inputPassword6" class="col-form-label">Password</label>
                                                <input type="password" placeholder=".........">

                                                <br><br>
                                                <button class="primary-btn" style="border: none; border-radius: 4px;" >Save</button>
                                                <!-- END STAT -->
                                                 <!-- <div> -->
                                                    <!-- <h4 class="profile-desc-title">About Jason Davis</h4> -->
                                                    <!-- <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span> -->
                                                    <!-- <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="https://www.apollowebstudio.com">apollowebstudio.com</a>
                                                    </div> -->
                                                    <!-- <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-twitter"></i>
                                                        <a href="https://www.twitter.com/jasondavisfl/">@jasondavisfl</a>
                                                    </div> -->
                                                    <!-- <div class="margin-top-20 profile-desc-link">
                                                        <i class="fa fa-facebook"></i>
                                                        <a href="https://www.facebook.com/">JasonDavisFL</a>
 </div> -->
<!-- </div> -->
</div>                   
                                           
        
        
			</div>


		</div>
        
		<div class="col-md-9">
            <div class="profile-content">

            <div class="heading_container">
            <h2 class="offset-lg-1">
             Wishlist Items
            </h2>
        </div>
<br>
        <div class="row">
          <div class="col-1">
            <label>No.</label>
          </div>
          <div class="col-3">
          <label>Item</label>
          </div>
          <div class="col-2">
          <label>Name</label>
          </div>
          <div class="col-2">
          <label>Price</label>
          </div>
          <div class="col-2">
          <label></label>
          </div>
          <div class="col-2">
          <label></label>
          </div>

        </div>

        <hr>
        <div class="row">
          <div class="col-1">
            <label>01.</label>
          </div>
          <div class="col-3">
          <label><img src="images/10.png" style="width: 80px;">  </label>
          </div>
          <div class="col-2">
          <label>Vanila Cake</label>
          </div>
          <div class="col-2">
          <label>Rs. 7500.00</label>
          </div>
          <div class="col-2">
          <button class="btn btn-primary" style="background-color:#FF6699; border: none;">Add Cart</button>
          </div>
          <div class="col-2">
          <button class="btn btn-danger">Remove</button>
          </div>

        </div>

        <hr>
        <div class="row">
          <div class="col-1">
            <label>02.</label>
          </div>
          <div class="col-3">
          <label><img src="images/10.png" style="width: 80px;">  </label>
          </div>
          <div class="col-2">
          <label>Vanila Cake</label>
          </div>
          <div class="col-2">
          <label>Rs. 7500.00</label>
          </div>
          <div class="col-2">
          <button class="btn btn-primary" style="background-color:#FF6699; border: none;">Add Cart</button>
          </div>
          <div class="col-2">
          <button class="btn btn-danger">Remove</button>
          </div>

        </div>
        <hr>
		</div>
	</div>
    </div>

</div>
    <!-- end about section -->


    <!-- info section -->
    <?php require "footer.php";?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- slick slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

  <script>
  // JavaScript to toggle dropdown on click
  document.querySelector('a[href="signup.php"]').addEventListener('click', function(e) {
    e.preventDefault();
    const dropdownContent = this.nextElementSibling;
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
  });
</script>

</body>

</html>