<header class="header_section">
        <div class="container-fluid fixed-top bg-white">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.php" data-aos="fade-right">
              CakesRBakes
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto" data-aos="fade-left">
                <li class="nav-item <?php echo isActivePage('index.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php echo isActivePage('about.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shop
                  </a>
                  <ul class="dropdown-menu fade-in" aria-labelledby="shopDropdown">
                    <li><a class="dropdown-item" href="cakes.php">Cakes</a></li>
                    <li><a class="dropdown-item" href="ingredients.php">Ingredients</a></li>
                    <li><a class="dropdown-item" href="decorations.php">Decorations</a></li>
                  </ul>
                </li>
                <li class="nav-item <?php echo isActivePage('contact.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <?php if (isLoggedIn()): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                      <i class="fa fa-shopping-cart"></i>
                      <span class="cart-count badge bg-danger"><?php echo getCartCount(); ?></span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-user"></i>
                      <?php echo htmlspecialchars(Session::getUsername()); ?>
                    </a>
                    <ul class="dropdown-menu fade-in" aria-labelledby="userDropdown">
                      <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                  </li>
                <?php else: ?>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </nav>
        </div>
      </header>

<!-- CSRF Token for AJAX requests -->
<meta name="csrf-token" content="<?php echo generateCSRFToken(); ?>">

<!-- Cart Styles -->
<style>
.cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    font-size: 0.7em;
    padding: 2px 5px;
    border-radius: 50%;
    background-color: #FF6699;
    color: white;
}

.nav-item {
    position: relative;
}

.dropdown-menu {
    border-color: #FEA4D4;
}

.dropdown-item:hover {
    background-color: #FEA4D4;
    color: white;
}

.navbar-nav .nav-link {
    color: #333;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #FF6699;
}

.navbar-nav .active .nav-link {
    color: #FF6699;
}

.navbar-brand {
    font-family: 'SnellBT-Regular', cursive;
    color: #FF6699;
    font-size: 1.8rem;
}

.navbar-brand:hover {
    color: #FEA4D4;
}
</style>

<!-- Include cart.js -->
<script src="js/cart.js" defer></script>
