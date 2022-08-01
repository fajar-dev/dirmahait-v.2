    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
              <a href="<?= base_url() ?>" class="app-brand-link gap-2">
                  <img src="<?= base_url('frontend/') ?>assets/images/logo.png" width="150" alt="">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Daftar Mahasiswa</h4>
              <p class="mb-4">Direktori Mahasiswa Teknik Informatika Unimal Angkatan 2020</p>

              <form id="formAuthentication" class="mb-3" action="<?= base_url('auth/proses_daftar') ?>" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="nama"
                    placeholder="Nama Lengkap"
                    value="<?= $this->session->flashdata('nama'); ?>"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">NIM</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nim"
                    name="nim"
                    placeholder="NIM"
                    value="<?= $this->session->flashdata('nim'); ?>"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" required name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      Saya telah membaca 
                      <a href="#" data-bs-toggle="modal" data-bs-target="#regulasi">Regulasi Terbaru</a>
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Sudah Memiliki Akun?</span>
                <a href="<?= base_url('auth') ?>">
                  <span>Masuk</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->