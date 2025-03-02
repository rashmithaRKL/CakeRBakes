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
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Custom animations -->
  <link href="css/animations.css" rel="stylesheet" />

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
  font-size:1.75rem;
  margin-bottom:20px;
  margin-top:5px;
}
.card-body{
  font-size:1rem;
}
.card-price{
  width:100px;
  height:100px;
  background-color:#FF6699;;
  color:#fff;
  margin-left:auto;
  font-size:1rem;
  display:flex;
  justify-content:center;
  align-items:center;
}

  </style>

</head>

<body>
  <!-- Loading Animation -->
  <div class="loading"></div>

  <!-- <div class="main_body_content"> -->

    <div class="hero_area">
      <!-- header section strats -->
      <?php require "header.php";?>
      <!-- end header section -->
      <!-- slider section -->
      <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="detail_box" data-aos="fade-right" data-aos-duration="1200">
                      <h1>
                        Fresh Cakes  <br>
                        <span>
                         Sweet Joy
                        </span>
                      </h1>
                      <a href="about.php">
                        <span>
                          Read More
                        </span>
                        <img src="images/white-arrow.png" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 ml-auto">
                    <div class="img-box" data-aos="fade-left" data-aos-duration="1200">
                      <img src="images/cake2.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="detail_box">
                      <h1>
                        Sweetness in<br>
                        <span>
                      Every Slice
                        </span>
                      </h1>
                      <a href="about.php">
                        <span>
                          Read More
                        </span>
                        <img src="images/white-arrow.png" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 ml-auto">
                    <div class="img-box">
                      <img src="images/slide4.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="detail_box">
                      <h1>
                        Indulge in  <br>
                        <span>
                          Freshness
                        </span>
                      </h1>
                      <a href="about.php">
                        <span>
                          Read More
                        </span>
                        <img src="images/white-arrow.png" alt="">
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 ml-auto">
                    <div class="img-box">
                      <img src="images/slide3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
      <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding fade-in">
      <div class="container  ">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container" data-aos="fade-right">
                <h2>
                  About Our Company
                </h2>
              </div>
              <p>
                CakesRBakes is your go-to destination for freshly baked, delicious cakes made with love and the finest ingredients. Whether for a special occasion or a treat, we offer a variety of flavors and designs to satisfy every sweet tooth. Enjoy the perfect cake, just a click away!
              </p>
              <a href="about.php">
                <span>
                  Read More
                </span>
                <img src="images/color-arrow.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img-box" data-aos="fade-left">
              <img src="images/cake3.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end about section -->

    <!-- chocolate section -->

    <!-- <section class="chocolate_section ">
      <div class="container">
        <div class="heading_container">
          <h2>
            Delicious Cake Creations 
          </h2>
          <p>
            Explore Our Wide Range of Flavors and Designs. Discover the Perfect Cake for Every Occasion
          </p>
        </div>
      </div>
      <div class="container">
        <div class="chocolate_container">
          <div class="box">
            <div class="img-box">
              <img src="images/item1.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Strawberry <span>Gateau</span>
              </h6>
              <h5>
                Rs. 2000.00
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="images/item2.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Fruit <span>Gateau</span>
              </h6>
              <h5>
                Rs. 1990.00
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="images/item3.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Blueberry <span>Cheesecake</span>
              </h6>
              <h5>
                Rs. 2500.00
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="images/item4.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Yummy <span>chocolate</span>
              </h6>
              <h5>
                $5.0
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="images/item5.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Yummy <span>chocolate</span>
              </h6>
              <h5>
                $5.0
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
          <div class="box">
            <div class="img-box">
              <img src="images/item6.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Yummy <span>chocolate</span>
              </h6>
              <h5>
                $5.0
              </h5>
              <a href="">
                BUY NOW
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- end chocolate section -->

       <!-- test -->
      
       <br>
      
       <!-- <div id="topic"> -->
        <div class="container">
        <div class="heading_container" data-aos="fade-up">
            <h2 class="offset-lg-4">
              Delicious Cake Creations 
            </h2>
            <p class="offset-lg-2">
              Explore Our Wide Range of Flavors and Designs. Discover the Perfect Cake for Every Occasion
            </p>
          </div>
        </div>

        <br><br>
        <!-- <div class="container"> -->
        <div class="row" style="margin-left: 10px;">
    <!-- Card 1 -->
    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <a href="product.php">
            <div class="card slide-in">
                <div class="card-image">
                    <img src="images/1.png" alt="Sutin Martin Cake">
                </div>
                <div class="card-text">
                    <p class="card-meal-type">Cakes</p>
                    <h2 class="card-title">Sutin Martin Cake</h2>
                </div>
                <div class="card-price">Rs. 7500.00</div>
            </div>
        </a>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <a href="product.php">
            <div class="card slide-in">
                <div class="card-image">
                    <img src="images/2.png" alt="Vanilla Car Design">
                </div>
                <div class="card-text">
                    <p class="card-meal-type">Cakes</p>
                    <h2 class="card-title">Vanilla Car Design</h2>
                </div>
                <div class="card-price">Rs. 6500.00</div>
            </div>
        </a>
    </div>

    <!-- Card 3 -->
    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <a href="product.php">
            <div class="card slide-in">
                <div class="card-image">
                    <img src="images/6.png" alt="Engagement Cake">
                </div>
                <div class="card-text">
                    <p class="card-meal-type">Cakes</p>
                    <h2 class="card-title">Engagement Cake</h2>
                </div>
                <div class="card-price">Rs. 13000.00</div>
            </div>
        </a>
    </div>

    <!-- Card 4 -->
    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <a href="product.php">
            <div class="card slide-in">
                <div class="card-image">
                    <img src="images/10.png" alt="Vanilla Cake">
                </div>
                <div class="card-text">
                    <p class="card-meal-type">Cakes</p>
                    <h2 class="card-title">Vanilla Cake</h2>
                </div>
                <div class="card-price">Rs. 7500.00</div>
            </div>
        </a>
    </div>
</div>

<div style="margin-left: 750px;">
  <a  style="color: #FEA4D4; border: none;"   href="cakes.php">See More<img src="images/color-arrow.png" alt=""></a>
</div>
        <!-- </div> -->
   
      

        <!-- test -->

    <!-- offer section -->

    <section class="offer_section layout_padding fade-in">
      <div class="container">
        <div class="box">
          <div class="detail-box">
            <h2>
              Offers on Ingredients
            </h2>
            <h3>
              Get 5% Offer <br>
              any item
            </h3>
            <!-- <a href="">
              Buy Now
            </a> -->
            <div class="btn-box">
          <a href="">
            <span>
              See More
            </span>
            <!-- <img src="images/color-arrow.png" alt=""> -->
          </a>
        </div>
          </div>
          <div class="img-box">
            <img src="images/offers.jpg" alt="">
          </div>
        </div>
        <div class="btn-box">
          <!-- <a href="">
            <span>
              See More
            </span>
            <img src="images/color-arrow.png" alt="">
          </a> -->
        </div>
      </div>
    </section>

    <!-- end offer section -->

    <!-- client section -->

    <section class="client_section fade-in">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 ml-auto" data-aos="fade-right" data-aos-duration="1000">
            <div class="img-box sub_img-box">
              <img src="images/about.webp" alt="">
            </div>
          </div>
          <div class="col-lg-6 px-0" data-aos="fade-left" data-aos-duration="1000">
            <div class="client_container">
              <div class="heading_container">
                <h2>
                  Testimonial
                </h2>
              </div>
              <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="box">
                      <div class="img-box">
                        <img src="images/client-img.jpg" alt="">
                      </div>
                      <div class="detail-box">
                        <h4>
                          Gero Miliya
                        </h4>
                        <p>
                          long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it haslong established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                        </p>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel_btn-box">
                  <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end client section -->


    <!-- contact section -->

    <section class="contact_section layout_padding fade-in">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
            <div class="form_container" data-aos="fade-up" data-aos-duration="1000">
              <div class="heading_container">
                <h2>
                  Contact Us
                </h2>
              </div>
              <form action="">
                <div>
                  <input type="text" placeholder="Full Name " />
                </div>
                <div>
                  <input type="text" placeholder="Phone number" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    SEND NOW
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-5  px-0">
            <div class="map_container" data-aos="fade-up" data-aos-delay="200">
              <div class="map">
                <div >
                <iframe style="border:0; width: 100%; height: 640px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507069.66972943005!2d79.46586627343751!3d6.832690400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253a3d37ac853%3A0x88205e1a91e6c19b!2sRK%20Software%20Solution!5e0!3m2!1sen!2slk!4v1701756448636!5m2!1sen!2slk" frameborder="0" allowfullscreen></iframe>
        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end contact section -->


    <!-- info section -->
    <?php require "footer.php";?>
  <!-- footer section -->

  <!-- jQery -->
  <script  src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script  src="js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- slick slider -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
  <!-- custom js -->
  <script  src="js/custom.js"></script>
  <!-- Google Map -->
  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <!-- Custom animations -->
  <script src="js/scroll-animations.js"></script>

  <script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        duration: 1000,
        once: true,
        offset: 100,
        easing: 'ease-in-out'
      });
    });

    // Remove loading animation when page is loaded
    window.addEventListener('load', function() {
      const loader = document.querySelector('.loading');
      if (loader) {
        loader.style.display = 'none';
      }
    });
  </script>

  <script>
  // JavaScript to toggle dropdown on click
  document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.querySelector('a[href="signup.php"]');
    if (dropdownToggle) {
      dropdownToggle.addEventListener('click', function(e) {
        e.preventDefault();
        const dropdownContent = this.nextElementSibling;
        if (dropdownContent) {
          dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }
      });
    }
  });
</script>

</body>

</html>