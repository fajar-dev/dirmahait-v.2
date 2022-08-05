
     <!-- Footer -->
     <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  © Copyright
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <span class="footer-link me-4">V.2.5</span>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('backend/') ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- Main JS -->
    <script src="<?= base_url('backend/') ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('backend/') ?>assets/js/dashboards-analytics.js"></script>
    <script src="<?= base_url('backend/') ?>assets/js/pages-account-settings-account.js"></script>

              <?php if($user['agree']== 0){ ?>
                 <!-- Modal -->
                 <div class="modal fade" id="agree" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" method="POST" action="<?= base_url('auth/ubah_password') ?>" >
                              <div class="modal-content rounded-4 shadow">
                                <div class="modal-body p-lg-5">
                                  <h2 class="fw-bold mb-2">Ubah Password</h2>
                                  <span>Kamu masih menggunakan password default, harap ubah password kamu untuk meningkatkan keamanan</span>
                                    <div class="row pt-5">
                                      <div class="col-12 mb-3">
                                        <div class="form-password-toggle">
                                          <label class="form-label" for="basic-default-password32">Password Baru</label>
                                          <div class="input-group input-group-merge">
                                            <input type="password" minlength="6" class="form-control form-control-lg" id="pw1" required placeholder="Masukan Password Baru" aria-describedby="basic-default-password">
                                          </div>
                                        </div>
                                      </div>  
                                      <div class="col-12 mb-3">
                                        <div class="form-password-toggle">
                                          <label class="form-label" for="basic-default-password32">Ulangi Password</label>
                                          <div class="input-group input-group-merge">
                                            <input type="password" name="password" minlength="6" class="form-control form-control-lg" id="pw2" required placeholder="Ulangi Password Baru" aria-describedby="basic-default-password">
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                  <button type="submit" class="btn btn-lg btn-primary mt-5 w-100">Ubah Password</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Bootstrap modals -->
              <script type="text/javascript">
                  window.onload = function () {
                      document.getElementById("pw1").onchange = validatePassword;
                      document.getElementById("pw2").onchange = validatePassword;
                  }

                  function validatePassword(){
                  var pass2=document.getElementById("pw2").value;
                  var pass1=document.getElementById("pw1").value;
                  if(pass1!=pass2)
                      document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                  else
                      document.getElementById("pw2").setCustomValidity('');
                  }
              </script>
              <script type="text/javascript">
                $(window).on('load', function() {
                    $('#agree').modal('show');
                });
              </script>
              <?php } ?>

              <script>
                setTimeout(function () {
                    $("#toast").removeClass("show");
                  }, 3000);
              </script>

  </body>
</html>