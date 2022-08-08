          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <div class="row">
                <?php
                  if($user['status']==0){
                    echo'
                    <div class="col-12 mb-4">
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="me-auto fw-semibold pb-2"><i class="bx bx-error pb-1"></i> Perhatian !</div>
                        Akun kamu dalam status pending, data belum dapat ditampilkan pada direktori mahasiswa. <br> 
                        Silahkan menghubungi ketua angkatan kamu untuk dapat diverifikasi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    </div>
                    ';
                  }
                ?>
                <div class="col-lg-8 mb-4 order-0">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="d-flex align-items-end row">
                          <div class="col-sm-7">
                            <div class="card-body">
                              <h5 class="card-title text-primary">HI, <?php echo htmlentities($user['nama'], ENT_QUOTES, 'UTF-8');?>! 🎉</h5>
                              <p class="mb-4">
                                <?= $salam ?>
                              </p>
    
                              <a href="<?= site_url('user/biodata') ?>" class="btn btn-sm btn-outline-primary">Atur Biodata</a>
                            </div>
                          </div>
                          <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                              <img
                                src="<?= base_url('backend/') ?>assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="<?= base_url('backend/') ?>illustrations/man-with-laptop-dark.png"
                                data-app-light-img="<?= base_url('backend/') ?>illustrations/man-with-laptop-light.png"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="m-0 me-2">Pengumuman</h5>
                        </div>
                        <div class="card-body">
                          <?= $set->pengumuman; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">What's New?</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="d-grid gap-4 my-5 mx-3 list-unstyled">
                        <li class="d-flex gap-4">
                          <i class="bi bi-shield-check fs-1 text-success"></i>
                          <div>
                            <h5 class="mb-0">kebijakan &amp; ketentuan privasi</h5>
                            <small>Data yang bersifat pribadi seperti nomor telepon dan email tidak akan di publish, serta adanya proses encrypt data</small> 
                          </div>
                        </li>
                        <li class="d-flex gap-4">
                          <i class="bi bi-layout-wtf fs-1 text-warning "></i>
                          <div>
                            <h5 class="mb-0">Optimasi UI and System</h5>
                            <small>Meningkatkan aplikasi dalam segi UI dan UX serta pembaruan teknologi yang diterapkan dalam sistem</small> 
                          </div>
                        </li>
                        <li class="d-flex gap-4">
                          <i class="bi bi-journal-code fs-1 text-info"></i>
                          <div>
                            <h5 class="mb-0">Penambahan Fitur</h5>
                            <small>Menambahkan beberpa fitur baru yang dapat memudahkan pengguna, seperti dashboard mahasiswa dan Data Terbuka (API)</small> 
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->
              </div>

              <?php
                if( $user['level'] == 1 ) {
              ?>
              <div class="row">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-3 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <div class="alert alert-primary p-2" role="alert"><i class="menu-icon tf-icons bx bx-user"></i></div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Admin</span>
                          <h3 class="card-title mb-2"><?= $admin ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <div class="alert alert-success p-2" role="alert"><i class="menu-icon tf-icons bx bx-user"></i></div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Aktif</span>
                          <h3 class="card-title mb-2"><?= $aktif ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <div class="alert alert-warning p-2" role="alert"><i class="menu-icon tf-icons bx bx-user"></i></div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Pending</span>
                          <h3 class="card-title mb-2"><?= $pending ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <div class="alert alert-danger p-2" role="alert"><i class="menu-icon tf-icons bx bx-user"></i></div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Suspend</span>
                          <h3 class="card-title mb-2"><?= $suspend ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Log Aktifitas</h5>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                      <?php foreach ($log as $data) { ?>
                        <li class="d-flex mb-4 pb-1">
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></h6>
                              <small class="text-muted d-block mb-1"><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <small class="text-muted"><?= $data->date ?></small>
                            </div>
                          </div>
                        </li>
                      <?php } ?>  
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>

            </div>
            <!-- / Content -->
