
     <!-- Footer -->
     <footer class="content-footer footer bg-footer-theme">
              <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  © Direktori Mahasiswa IT UNIMAL 2020
                </div>
                <div>
                  <span class="footer-link me-4">V.2.5.12</span>
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
    <script src="<?= base_url('frontend/') ?>assets/js/jquery.magnific-popup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('backend/') ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('backend/') ?>assets/js/dashboards-analytics.js"></script>
    <script src="<?= base_url('backend/') ?>assets/js/pages-account-settings-account.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/user/dashboard') AND ( $user['level'] == 1)){ ?>
    <script>
      var options = {
        chart: {
          type: 'bar'
        },
        series: [{
          name: 'sales',
          data: [<?php foreach($provinsi as $data){echo '"'.$data->hasil.'" ,';}?>]
        }],
        xaxis: {
          categories: [<?php foreach($provinsi as $data){echo '"'.$data->provinsi.'" ,';}?>]
        }
      }

      var chart = new ApexCharts(document.querySelector("#provinsi"), options);

      chart.render();
    </script>
        <script>
      var options = {
        chart: {
          type: 'bar'
        },
        series: [{
          name: 'sales',
          data: [<?php foreach($kabkota as $data){echo '"'.$data->hasil.'" ,';}?>]
        }],
        xaxis: {
          categories: [<?php foreach($kabkota as $data){echo '"'.$data->kabkota.'" ,';}?>]
        }
      }
      var chart = new ApexCharts(document.querySelector("#kabkota"), options);
      chart.render();
    </script>
    <script>
        var options = {
          series: [<?= $laki ?>, <?= $perempuan ?>],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Laki-Laki', 'Perempuan'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };
        var chart = new ApexCharts(document.querySelector("#jk"), options);
        chart.render();
    </script>
        <script>
        var options = {
          series: [<?= $islam ?>, <?= $kristen ?>, <?= $katolik ?>, <?= $hindu ?>, <?= $budha ?>],
          chart: {
          width: 410,
          type: 'pie',
        },
        labels: ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Budha'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };
        var chart = new ApexCharts(document.querySelector("#agama"), options);
        chart.render();
    </script>
    <?php } ?>
    <script>
      $('.test-popup-link').magnificPopup({
        type: 'image'
        // other options
      });
      $(document).ready(function() {
        $('#summernote').summernote({
          height: 300
        });
      });
      
    $('.btn-del').on('click',function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Hapus Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'delete'
        }).then((result) => {
            if (result.value) {
            document.location.href = href;
            }
        })
        })
    $( '#select2' ).select2( {
        theme: 'bootstrap-5',
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style'
    } );
    $( '#select21' ).select2( {
        theme: 'bootstrap-5',
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style'
    } );
    </script>

                        <!-- Modal -->
                        <div class="modal fade" id="ubah" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <form action="<?= base_url('auth/ubah_password') ?>" method="post">
                                <div class="modal-header">
                                  <h3 class="modal-title" id="modalCenterTitle fw-bold display-5">Ubah Password</h3>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                      <div class="col-12 mb-3">
                                          <div class="form-password-toggle">
                                            <label class="form-label" for="basic-default-password32">Password Lama</label>
                                            <div class="input-group input-group-merge">
                                              <input type="password" minlength="6" name="lama" class="form-control form-control-lg"  required placeholder="Password Lama" aria-describedby="basic-default-password">
                                            </div>
                                          </div>
                                        </div>  
                                        <div class="col-12 mb-3">
                                          <div class="form-password-toggle">
                                            <label class="form-label" for="basic-default-password32">Password Baru</label>
                                            <div class="input-group input-group-merge">
                                              <input type="password" minlength="6" class="form-control form-control-lg" id="pw3" required placeholder="Masukan Password Baru" aria-describedby="basic-default-password">
                                            </div>
                                          </div>
                                        </div>  
                                        <div class="col-12 mb-3">
                                          <div class="form-password-toggle">
                                            <label class="form-label" for="basic-default-password32">Ulangi Password</label>
                                            <div class="input-group input-group-merge">
                                              <input type="password" name="password" minlength="6" class="form-control form-control-lg" id="pw4" required placeholder="Ulangi Password Baru" aria-describedby="basic-default-password">
                                            </div>
                                          </div>
                                        </div>  
                                      </div>
                                  </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                  window.onload = function () {
                      document.getElementById("pw3").onchange = validatePassword;
                      document.getElementById("pw4").onchange = validatePassword;
                  }

                  function validatePassword(){
                  var pass2=document.getElementById("pw4").value;
                  var pass1=document.getElementById("pw3").value;
                  if(pass1!=pass2)
                      document.getElementById("pw4").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                  else
                      document.getElementById("pw4").setCustomValidity('');
                  }
              </script>
    
              <?php if($user['agree']== 0){ ?>
                 <!-- Modal -->
                 <div class="modal fade" id="agree" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <form class="modal-content" method="POST" action="<?= base_url('auth/ubah_password') ?>" >
                              <div class="modal-content rounded-4 shadow">
                                <div class="modal-body p-lg-5">
                                  <h2 class="fw-bold mb-2">Ubah Password</h2>
                                  <span>password kamu sudah kadaluwarsa, harap ubah password kamu untuk meningkatkan keamanan</span>
                                    <div class="row pt-5">
                                    <div class="col-12 mb-3">
                                        <div class="form-password-toggle">
                                          <label class="form-label" for="basic-default-password32">Password Lama</label>
                                          <div class="input-group input-group-merge">
                                            <input type="password" minlength="6" name="lama" class="form-control form-control-lg"  required placeholder="Password Lama" aria-describedby="basic-default-password">
                                          </div>
                                        </div>
                                      </div>  
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
                <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
              </script>

  </body>
</html>