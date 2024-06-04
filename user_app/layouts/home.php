<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DressCode - eCommerce Website</title>
  <link rel="shortcut icon" href="/user/images/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/user/css/style-prefix.css">
  <link rel="stylesheet" href="/user/css/about.css">
  <link rel="stylesheet" href="/user/css/singleProduct.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="/user/css/profile.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body>
  <div class="header-main">

    <div class="container">
      <a href="../../user/home/index" class="header-logo" style="text-decoration:none">
        <h2 style="color: var(--salmon-pink);  text-decoration: none;">DressCode</h2>
        <!-- <img src="/user/images/logo/logo.svg" alt="DressCode's logo" width="120" height="36"> -->
      </a>

      <?php if (isset($_SESSION["user"]) && $_SESSION["user"] != null) : ?>
        <div class="header-search-container">
          <form action="../../user/home/search" method="post">
            <input type="text" name="search_data" class="search-field" placeholder="Enter your product name or brand...">

            <button class="search-btn" type="submit">
              <ion-icon name="search-outline"></ion-icon>
            </button>
          </form>
        </div>
      <?php endif ?>

      <div class="header-user-actions">



        <?php if (!isset($_SESSION["user"]) && $_SESSION["user"] == null) : ?>

          <a href="../../user/user/login" class="banner-btn" style="text-decoration:none">Login</a>
          <a href="../../user/user/registration" class="banner-btn" style="text-decoration:none">Sign up</a>
        <?php else : ?>
          <button class="action-btn">
            <a href="../../user/home/shoppingCart">
              <ion-icon name="bag-handle-outline" style="color: var(--salmon-pink)"></ion-icon>

            </a>
          </button>
          <button class="action-btn">
            <a href="../../user/home/profile">
              <ion-icon name="person-outline" style="color: var(--salmon-pink)"></ion-icon>
            </a>
          </button>

          <button class="action-btn">
            <a href="../../user/home/wishlist">
              <ion-icon name="heart-outline" style="color: var(--salmon-pink)"></ion-icon>

            </a>
          </button>
          <button class="action-btn">
            <a href="../../user/user/logout">
              <ion-icon name='exit-outline' style="color: var(--salmon-pink)"></ion-icon>

            </a>
          </button>
        <?php endif ?>
      </div>
    </div>

  </div>
  <main></main>
  <?php include $content; ?>


  <footer>



    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">
          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              419 State 414 Rte
              Beaver Dams, New York(NY), 14812, USA
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">example@gmail.com</a>
          </li>

        </ul>


        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>
        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Follow Us</h2>
          </li>

          <li>
            <ul class="social-link">

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>








      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">

        <img src="/user/images/payment.png" alt="payment method" class="payment-img">

        <p class="copyright">
          Copyright &copy; <a href="#">DressCode</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>
</body>
<script src="/user/js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>