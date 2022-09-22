  <!---------------Modal----------------------->
  <div class="modallogin modal fade" id="regulasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-body p-5">
          <h2 class="fw-bold mb-0">What's new</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class="d-flex gap-4">
              <i class="bi bi-shield-check fs-1 text-success"></i>
              <div>
                <h5 class="mb-0">kebijakan & ketentuan privasi</h5>
                <small>Data yang bersifat pribadi seperti nomor telepon dan email tidak akan di publish, serta adanya proses encrypt data</small> 
              </div>
            </li>
            <li class="d-flex gap-4">
              <i class="bi bi-layout-wtf fs-1 text-warning"></i>
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
          <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal">Saya Mengerti !</button>
        </div>
      </div>
    </div>
  </div>
  <!--------------- end Modal----------------------->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('backend/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('backend/') ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url('backend/') ?>assets/js/main.js"></script>
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>

    <!-- Page JS -->
    <script>
       setTimeout(function () {
          $("#toast").removeClass("show");
        }, 3000);
    </script>
 
    <script type="text/javascript">
        window.onload = function () {
          document.getElementById("pw").onchange = validatePassword;
          valid = /^[0-9]{1,}$/;
        }

        function validatePassword(){
          var pass=document.getElementById("pw").value;
            if(pass.match(valid))
              document.getElementById("pw").setCustomValidity("Password Juga Harus berisi minimal 1 huruf");
            else
              document.getElementById("pw").setCustomValidity('');
        }
    </script> 

  </body>
</html>