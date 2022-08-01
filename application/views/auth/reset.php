<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="<?= base_url() ?>" class="app-brand-link gap-2">
                  <img src="<?= base_url('frontend/') ?>assets/images/logo.png" width="150" alt="">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Lupa Password? </h4>
              <p class="mb-4">Direktori Mahasiswa Teknik Informatika Unimal Angkatan 2020</p>
              <form id="formAuthentication" class="mb-3" action="<?= base_url('auth/proses_reset') ?>" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                    required
                  />
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Reset Password</button>
              </form>
              <div class="text-center">
                <a href="<?= base_url('auth') ?>" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->