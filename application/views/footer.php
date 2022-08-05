<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>2022 © Copyright Angkatan 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <button type="button" class="btn act-btn" data-bs-toggle="modal" data-bs-target="#regulasi" id="myTooltip" data-bs-toggle="myTooltip" data-bs-placement="left" title="Baca Regulasi Terbaru Direktori Mahasiswa">
    <i class="bi bi-info-circle"></i> Regulasi
  </button>
  <a href="#" class="back-to-top btn btn-success d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!---------------Modal----------------------->
  <div class="modallogin modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent">
          <div class="modal-header bg-transparent ">
            <button type="button" class="btn-close text-white bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body content p-2">
                <div class="row">
                  <div class="col-lg-5 d-none d-lg-block">
                    <img src="<?= base_url('frontend/') ?>assets/images/login.jpg" class="img-fluid" alt="...">
                  </div>
                  <div class="col-lg-7 py-5 px-4">
                    <h4>Login</h4>
                    <h5 class="text-muted">Direktori Mahasiswa Teknik Informatika Universitas Malikussaleh Angkatan 2020</h5>
                    <form action="<?= base_url('auth/login_proses') ?>" method="POST" class="row g-4 pt-4">
                      <div class="col-12">
                          <label>Username<span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                              <input type="text" class="form-control" name="email" placeholder="Enter Username" required>
                          </div>
                      </div>

                      <div class="col-12">
                          <div class="d-flex justify-content-between">
                            <label>Password<span class="text-danger">*</span></label>
                            <a href="#" class="text-end text-primary">Lupa Password?</a>
                          </div>
                          <div class="input-group">
                              <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                              <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                          </div>
                      </div>

                      <div class="d-grid gap-2 ">
                        <button type="submit" class="btn btn-primary button-slave mx-3  rounded"> Log In</button>
                      </div>
                      <div class="col-sm-12 text-center">
                          Belum Memiliki Akun?<a href="#" class="text-primary">Daftar</a>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--------------- end Modal----------------------->

  <!---------------Modal----------------------->
  <div class="modallogin modal fade" id="regulasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-body p-5">
          <h2 class="fw-bold mb-0">What's new</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class="d-flex gap-4">
              <i class="bi bi-shield-check fs-1 text-success pt-3"></i>
              <div>
                <h5 class="mb-0">kebijakan & ketentuan privasi</h5>
                <small>Data yang bersifat pribadi seperti nomor telepon dan email tidak akan di publish, serta adanya proses encrypt data</small> 
              </div>
            </li>
            <li class="d-flex gap-4">
              <i class="bi bi-layout-wtf fs-1 text-warning pt-3"></i>
              <div>
                <h5 class="mb-0">Optimasi UI and System</h5>
                <small>Meningkatkan aplikasi dalam segi UI dan UX serta pembaruan teknologi yang diterapkan dalam sistem</small> 
              </div>
            </li>
            <li class="d-flex gap-4">
              <i class="bi bi-journal-code fs-1 text-info pt-3"></i>
              <div>
                <h5 class="mb-0">Penambahan Fitur</h5>
                <small>Menambahkan beberpa fitur baru yang dapat memudahkan pengguna, seperti dashboard mahasiswa dan Data Terbuka (API)</small> 
              </div>
            </li>
          </ul>
          <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal">Saya Mengerti !</button>
        </div>
      </div>
    </div>
  </div>
  <!--------------- end Modal----------------------->


  <!-- Scripts -->
  <script src="<?= base_url('frontend/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('frontend/') ?>assets/js/owl-carousel.js"></script>
  <script src="<?= base_url('frontend/') ?>assets/js/animation.js"></script>
  <script src="<?= base_url('frontend/') ?>assets/js/imagesloaded.js"></script>
  <script src="<?= base_url('frontend/') ?>assets/js/custom.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
  <script>
    var monkeyList = new List('test-list', {
      valueNames: ['name'],
      //  page: 10,
      //  pagination: false
    });

    var myTooltipEl = document.getElementById('myTooltip')
    var tooltip = new bootstrap.Tooltip(myTooltipEl)
    tooltip.show()
  </script>

</body>
</html>