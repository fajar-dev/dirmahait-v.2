<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('frontend/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/animated.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/owl.css">
<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="<?= base_url('frontend/') ?>assets/images/logo.png" width="10" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="<?= site_url() ?>">Home</a></li>
              <li class="scroll-to-section"><a href="<?= site_url('page/docs') ?>">Docs API</a></li>
              <?php
                if($this->session->userdata('status') == "login"){
                  echo'
                  <li class="scroll-to-section  d-lg-block d-md-none d-lg-none"><a href="'.base_url("user/dashboard").'" style="background-color: #696CFF !important; color:#fff !important;">Dashboard</a></li>
                  <li class="scroll-to-section d-lg-block d-md-block "> <div class="border-first-button"><a href="'.base_url("user/dashboard").'">Dashboard</a></div></li> 
                  ';
                }else{
                  echo'
                  <li class="scroll-to-section  d-lg-block d-md-none d-lg-none"><a href="#about" style="background-color: #696CFF !important; color:#fff !important;" data-bs-toggle="modal" data-bs-target="#modallogin">Login</a></li>
                  <li class="scroll-to-section d-lg-block d-md-block "> <div class="border-first-button"><a href="#" data-bs-toggle="modal" data-bs-target="#modallogin" >Login</a></div></li> 
                  ';
                }
              ?>
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->