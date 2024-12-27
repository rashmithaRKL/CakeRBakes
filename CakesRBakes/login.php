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

* {
  box-sizing: border-box;
  font-family: sans-serif;
}
.login {
  width: 320px;
  height: 450px;
  border: 1px solid #CCC;
  background: url(https://i.pinimg.com/originals/ee/e6/5f/eee65f6ba60d0cb44f347b5cf57f5440.gif) center center no-repeat;
  background-size: cover;
  margin: 30px auto;
  border-radius: 20px;
}
.login .form {
  width: 100%;
  height: 100%;
  padding: 15px 25px;
}
.login .form h2 {
  color: #FFF;
  text-align: center;
  font-weight: normal;
  font-size: 18px;
  margin-top: 60px;
  margin-bottom: 80px;
}
.login .form input {
  width: 100%;
  height: 40px;
  margin-top: 20px;
  background: rgba(255,255,255,.5);
  border: 1px solid rgba(255,255,255,.1);
  padding: 0 15px;
  color: #FFF;
  border-radius: 5px;
  font-size: 14px;
}
.login .form input:focus {
  border: 1px solid rgba(255,255,255,.8);
  outline: none;
}
::-webkit-input-placeholder {
    color: #DDD;
}
.login .form input.submit {
  background: rgba(255,255,255,.9);
  color: #444;
  font-size: 15px;
  margin-top: 40px;
  font-weight: bold;
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

    <!-- about section -->

    <br><br>
    <div class="login">
  <div class="form">
    <h2>Welcome</h2>
    <input type="text" placeholder="Username">
    <input type="password" placeholder="Password">
    <input type="submit" value="Sign In" class="submit">
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

 

</body>

</html>