<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <link rel="icon" href="<?= base_url('frontend/') ?>assets/images/logo-it.png" type="image/gif" sizes="16x16">
    <meta name="description" content="Selamat datang di direktori mahasiswa Teknik Informatika angkatan 2020 Universitas Malikussaleh">
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="Direktori Mahasiswa IT 2020 " />
    <meta property="og:image" content="<?= base_url('frontend/') ?>assets/images/logo-it.png" />
    <meta property="og:description" content="Selamat datang di direktori mahasiswa Teknik Informatika angkatan 2020 Universitas Malikussaleh" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>Dirmahasiswa2020 | <?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('frontend/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/animated.css">
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/owl.css">

    <!-- Recapthca -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <!--
  ======================================
      DEVELOPER: Fajar Rivaldi Chan
      GITHUB: github.com/fajar-dev
      SITUS: fajar-dev.my.id
  =======================================
  -->

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
      <h1 class="text-primary fw-semibold mt-4 pt-4">Loading...</h1>
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
            <a href="<?= base_url() ?>" class="logo">
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