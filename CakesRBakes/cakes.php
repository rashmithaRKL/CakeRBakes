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
    <br><br>

    
  <!-- filter section -->
   
  <!-- filter section -->

    <!-- cake section -->
    <br><br>
    <div class="container">
      <div class="heading_container">
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
   
    <div class="row">

    <div class="col-3">
        <!-- Card Grid -->
<div class="container content-space-1">
  <div class="row">
    <div class="col-6">
      <!-- Navbar -->
      <div class="navbar-expand-lg mb-5">
        <!-- Navbar Toggle -->
        <div class="d-grid">
          <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenuEg2" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenuEg2">
            <span class="d-flex justify-content-between align-items-center">
              <span class="text-dark">Filter</span>

              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>

              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </span>
          </button>
        </div>
        <!-- End Navbar Toggle -->

        <!-- Navbar Collapse -->
        <div id="navbarVerticalNavMenuEg2" class="collapse navbar-collapse">
          <div class="w-100">
            <!-- Form -->
            <form>
            <div class="mb-5">
                <h5 class="mb-3">Item</h5>

                <!-- Select -->
                <select class="form-select form-select-sm">
                  <option value="within last day">Cakes</option>
                  <option value="within last week">Cup Cakes</option>
                  <option value="within last month">Sweets</option>
                  <option value="within last 3 months">Brownies</option>
                 
                </select>
                <!-- End Select -->
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h5>Type</h5>

                <div class="d-grid gap-2">
                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="adidasCheckbox">
                    <label class="form-check-label" for="adidasCheckbox">Chocolate</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="newBalanceCheckbox">
                    <label class="form-check-label" for="newBalanceCheckbox">Vanila</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="nikeCheckbox">
                    <label class="form-check-label" for="nikeCheckbox">Double</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="fredPerryCheckbox">
                    <label class="form-check-label" for="fredPerryCheckbox">Marble</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="tnfCheckbox">
                    <label class="form-check-label" for="tnfCheckbox">Ribbon</label>
                  </div>
                  <!-- End Checkboxes -->
                </div>

                <!-- View More - Collapse -->
                <div class="collapse" id="collapseBrand">
                  <div class="d-grid gap-2">
                    <!-- Checkboxes -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="gucciCheckbox">
                      <label class="form-check-label" for="gucciCheckbox">Gucci (5)</label>
                    </div>
                    <!-- End Checkboxes -->

                    <!-- Checkboxes -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="mangoCheckbox">
                      <label class="form-check-label" for="mangoCheckbox">Mango (1)</label>
                    </div>
                    <!-- End Checkboxes -->
                  </div>
                </div>
                <!-- End View More - Collapse -->

              
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h5>Weight</h5>

                <div class="d-grid gap-2">
                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeSCheckbox" checked>
                    <label class="form-check-label" for="sizeSCheckbox">500g</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeMCheckbox">
                    <label class="form-check-label" for="sizeMCheckbox">1 Kg </label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeLCheckbox" checked>
                    <label class="form-check-label" for="sizeLCheckbox">1.5 Kg</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeXLCheckbox">
                    <label class="form-check-label" for="sizeXLCheckbox">2 Kg</label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeXLCheckbox">
                    <label class="form-check-label" for="sizeXLCheckbox">2.5 Kg</label>
                  </div>
                  <!-- End Checkboxes -->

                  <!-- Checkboxes -->
                  <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="sizeXXLCheckbox">
                    <label class="form-check-label" for="sizeXXLCheckbox">XXL (2)</label>
                  </div> -->
                  <!-- End Checkboxes -->
                </div>
              </div>

              <div class="border-bottom pb-4 mb-4">
              <h5>Price Range</h5>
             <input placeholder="min price" >
             <br><br>
             <input placeholder="max price" >
              </div>

              <div class="border-bottom pb-4 mb-4">
                <h5>Rating</h5>

                <div class="d-grid gap-2">
                <div id="rating" style="font-size: 2rem; color: #ccc; display: flex; gap: 5px; cursor: pointer;">
        <span data-value="1" style="color: #ccc;">&#9733;</span>
        <span data-value="2" style="color: #ccc;">&#9733;</span>
        <span data-value="3" style="color: #ccc;">&#9733;</span>
        <span data-value="4" style="color: #ccc;">&#9733;</span>
        <span data-value="5" style="color: #ccc;">&#9733;</span>
    </div>
    <p id="result" style="font-size: 1rem; color: #333; margin-top: 10px;">Click a star to rate!</p>

                </div>
              </div>

              <div class="d-grid">
                <button type="button" style="background-color: #FEA4D4; color: #fff; border: none;" class="btn-btn primary btn-transition">Clear all</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Navbar Collapse -->
      </div>
      <!-- End Navbar -->
    </div>
    <!-- End Col -->
  </div>
  <!-- End Row -->
</div>
<!-- End Card Grid -->
    </div>

   
    

    <div class="col-9">   

    <div class="row" >
    <!-- Card 1 -->
    <div class="col-lg-4">
        <a href="product.php">
            <div class="card">
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
    <div class="col-lg-4">
        <a href="product.php">
            <div class="card">
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
    <div class="col-lg-4">
        <a href="product.php">
            <div class="card">
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

    


    </div>

       
      </div>



    </div>


    <!-- test -->





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
        const stars = document.querySelectorAll('#rating span');
        const result = document.getElementById('result');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                stars.forEach((s, i) => {
                    s.style.color = i <= index ? '#FFD700' : '#ccc'; // Highlight stars up to the clicked one
                });
                result.textContent = `You rated this ${index + 1} stars!`;
            });
        });
    </script>


</body>

</html>