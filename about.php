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

.accordian {
  width: 960px;
  height: 300px;
  overflow: hidden;
  display: flex;
  padding: 0;
  box-shadow: 0 0 30px black;
  list-style-type: none;
}
.accordian li {
  width: 20%;
  box-shadow: -4px 0px 20px rgba(0,0,0,0.8);
  transition: all 0.8s ease;
}
.accordian:hover li {
  width: 10%;
}
.accordian li:hover {
  width: 60%;
}
img {
  width: 590px;
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
    <section class="about_section layout_padding ">
      <div class="container  ">
        <div class="row">
          <div class="col-md-8">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  About Our Company
                </h2>
              </div>
              <br>
              <p>
                Get in best  Us For The Best high Quality Cake Ingredients and Tools. 
                <br><br>
               <b> Mission </b>
                <br>
                What you do now fro whom how you  do it what this achievement.
                <br><br>
              <b>Vision </b>
                <br>
                Wherever you go, whatever you need to succeed at the end of your mission, <br>
                you can get from us.
              </p>
              
               
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="img-box">
              <img src="images/about.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="heading_container">
        <h2 class="offset-lg-5">
          Our Collection
        </h2>
        <p class="offset-lg-3">
        Discover Our Stunning Image Collection. Find the Perfect Visuals for Every Occasion!
        </p>

      </div>

      <ul class="accordian offset-2"  >
 
    <li>
      <img src="https://images.tv9bangla.com/wp-content/uploads/2021/12/Cup-Cake-recipe-for-kid.jpg">
    </li>
    <li>
      <img src="https://www.eatlanka.com/wp-content/uploads/2023/10/Naked-Cake-Recipe-Card.jpg">
    </li>
    <li>
      <img src="https://images.slurrp.com/prodrich_article/l9kulc7ezaj.webp?impolicy=slurrp-20210601&width=1200&height=675">
    </li>
    <li>
      <img src="https://cdn.pixabay.com/photo/2014/11/28/08/03/brownie-548591_1280.jpg">
    </li>
    <li>
      <img src="https://png.pngtree.com/background/20230525/original/pngtree-an-image-of-a-chocolate-covered-cupcake-on-a-dark-surface-picture-image_2731065.jpg">
    </li>
  </ul>
<!-- Work of Juston Cheney -->


<br><br>
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