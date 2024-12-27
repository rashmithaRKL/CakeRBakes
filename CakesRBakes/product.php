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

    <!-- about section -->

    <br><br>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="images/10.png" alt="">
                        </div>
                       
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label">Cakes</div>
                        <h4>Vanila Cake</h4>
                        <h5>Rs. 7500.00</h5>
                        <p>Vanila Cake:  Two layers butter icing cake (pink, white) 1.5kg</p>
                        <ul>
                          
                            <li>Category: <span>Cakes</span></li>
                            <li>Tags: <span>Chocolate, Cakes</span></li>
                            
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
                        </ul>
                        
                           
                        <div style="display: flex; align-items: center; gap: 10px;">
    <!-- Quantity Control -->
    <div style="display: flex; align-items: center; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
        <button style="background: none; border: none; font-size: 16px; cursor: pointer;">-</button>
        <span style="margin: 0 10px; font-weight: bold;">2</span>
        <button style="background: none; border: none; font-size: 16px; cursor: pointer;">+</button>
    </div>
    <!-- Add to Cart Button -->
    <a href="cart.php" style="background: #FFB6C1; border: none; color: white; padding: 10px 20px; font-weight: bold; border-radius: 5px; cursor: pointer;">
        ADD TO CART
</a>
    <!-- Heart Icon for Favorite List -->
    <img src="images/heart.png" alt="Favorite" style="width: 24px; height: 24px; cursor: pointer;">
</div>


                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <br><br>  <br><br>

    <div class="heading_container">
            <h2 class="offset-lg-1">
             Related Items
            </h2>
          
          </div>

          <br><br>
          <div class="row" style="margin-left: 10px;">
    <!-- Card 1 -->
    <div class="col-3">
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
    <div class="col-3">
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
    <div class="col-3">
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

    <!-- Card 4 -->
    <div class="col-3">
        <a href="product.php">
            <div class="card">
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

<script>
        let quantity = 2; // Initial quantity value

        function increaseQty() {
            quantity++;
            document.getElementById('qty').innerText = quantity;
        }

        function decreaseQty() {
            if (quantity > 0) { // Ensure quantity doesn't go below zero
                quantity--;
                document.getElementById('qty').innerText = quantity;
            }
        }
    </script>

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