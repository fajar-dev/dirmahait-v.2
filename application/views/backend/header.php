<!DOCTYPE html>
<html
  lang="en"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <link rel="icon" href="<?= base_url('frontend/') ?>assets/images/logo-it.png" type="image/gif" sizes="16x16">
    <meta name="description" content="Selamat datang di direktori mahasiswa Teknik Informatika angkatan 2020 Universitas Malikussaleh">
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:type" content="article">
    <meta property="og:title" content="Direktori Mahasiswa IT 2020 | <?= $title ?>" />
    <meta property="og:image" content="<?= base_url('frontend/') ?>assets/images/logo-it.png" />
    <meta property="og:description" content="Selamat datang di direktori mahasiswa Teknik Informatika angkatan 2020 Universitas Malikussaleh" />

    <title>Dirmahasiswa2020 | <?= $title ?></title>

    <meta name="description" content="" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('backend/') ?>assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?= base_url('frontend/') ?>assets/css/magnific-popup.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url('backend/') ?>css/select2-bootstrap-5-theme.min.css" />

    <!-- Recapthca -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('backend/') ?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('backend/') ?>assets/js/config.js"></script>
  </head>

  <!--
  ======================================
      DEVELOPER: Fajar Rivaldi Chan
      GITHUB: github.com/fajar-dev
      SITUS: https://fajar-dev.my.id
  =======================================
  -->

  <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?= base_url() ?>" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="<?= base_url('frontend/') ?>assets/images/logo.png" height="60" alt="">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
            <!-- Admin -->
          <ul class="menu-inner py-1">
            <li class="menu-item mt-4 <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/user/dashboard')){ echo 'active';} ?>">
              <a href="<?= site_url('user/dashboard') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
              <?php
                if( $user['level'] == 1 ) {
              ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Admin</span>
            </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/setting')){ echo 'active';} ?>">
              <a href="<?= site_url('admin/setting') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">Setting</div>
              </a>
            </li>
              <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_aktif') OR ($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_suspend') OR ($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_pending')){ echo 'active open';} ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-group"></i>
                  <div data-i18n="Layouts">Mahasiswa</div>
                </a>
  
                <ul class="menu-sub">
                  <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_pending')){ echo 'active';} ?>">
                    <a href="<?= site_url('admin/mhs_pending') ?>" class="menu-link">
                      <div data-i18n="Without menu">Pending</div>
                    </a>
                  </li>
                  <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_aktif')){ echo 'active';} ?>">
                    <a href="<?= site_url('admin/mhs_aktif') ?>" class="menu-link">
                      <div data-i18n="Without navbar">Aktif</div>
                    </a>
                  </li>
                  <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/mhs_suspend')){ echo 'active';} ?>">
                    <a href="<?= site_url('admin/mhs_suspend') ?>" class="menu-link">
                      <div data-i18n="Container">Suspend</div>
                    </a>
                  </li>
                </ul>
              </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/kirim_email')){ echo 'active';} ?>">
              <a href="<?= site_url('admin/kirim_email') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Analytics">Kirim Email</div>
              </a>
            </li>  
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/pesan')){ echo 'active';} ?>">
              <a href="<?= site_url('admin/pesan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Analytics">pesan</div>
              </a>
            </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/apikey')){ echo 'active';} ?>">
              <a href="<?= site_url('admin/apikey') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-code"></i>
                <div data-i18n="Analytics">Api</div>
              </a>
            </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/admin/admin')){ echo 'active';} ?>">
              <a href="<?= site_url('admin/admin') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Admin</div>
              </a>
            </li>
              <?php
                }
              ?>
            <!-- user -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">User</span>
            </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/user/biodata')){ echo 'active';} ?>">
              <a href="<?= site_url('user/biodata') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Biodata</div>
              </a>
            </li>
            <li class="menu-item <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/user/kontak')){ echo 'active';} ?>">
              <a href="<?= site_url('user/kontak') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-phone"></i>
                <div data-i18n="Analytics">Kontak Darurat</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="<?= site_url('auth/logout') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <li class="menu-item text-center mt-5">
              <a href="<?= site_url() ?>" class="btn btn-primary w-75 mx-3">
                <i class="bx bx-globe"></i> Halaman Utama
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <h4 class="fw-semibold pt-3"><?= $title ?></h4>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <span class="fw-light d-md-block d-lg-block d-none"><?php echo htmlentities($user['nama'], ENT_QUOTES, 'UTF-8');?></span>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('file/').$user['foto'] ?>" style="height: 40px !important; width:40px !important; object-fit: cover !important;" alt="<?php echo htmlentities($user['nama'], ENT_QUOTES, 'UTF-8');?>" class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="<?= base_url('user/biodata') ?>">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                            <img src="<?= base_url('file/').$user['foto'] ?>" style="height: 40px !important; width:40px !important; object-fit: cover !important;" alt="<?php echo htmlentities($user['nama'], ENT_QUOTES, 'UTF-8');?>" class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo htmlentities($user['nama'], ENT_QUOTES, 'UTF-8');?></span>
                            <small class="text-muted"><?php echo htmlentities($user['nim'], ENT_QUOTES, 'UTF-8');?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah">
                        <i class="bx bx-edit me-2"></i>
                        <span class="align-middle">Ubah Password</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->
          <?= $this->session->flashdata('msg'); ?>
