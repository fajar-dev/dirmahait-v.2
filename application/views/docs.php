
<?= $this->session->flashdata('msg'); ?>

<main class="api"> 
    <div class="api-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12 align-self-center">
                <div class="left-content show-up header-text wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row justify-content-center">
                    <div class="col-lg-12">
                      <h6>API Json</h6>
                      <h2>Documentation</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12">
            <h4>Definisi</h4>
            <p>
              API adalah singkatan dari Application Programming Interface. <br>
              API digunakan sebagai penghubung jalur data antar platform aplikasi yang berbeda bahasa pemrograman sekalipun. <br>
              API biasanya digunakan dalam bisnis, penelitian dan lainnya. diakses secara online dengan kondisi dan ketentuan tertentu. <br>
            </p>
            <div class="alert alert-warning" role="alert">
              <strong>Note : </strong>API direktori mahasiswa hanya dapat digunakan untuk penelitian Mahasiswa diharapkan API KEY tidak disebar luaskan. <br> beberapa result data yang bersifat pribadi tidak dapat ditampilkan !
            </div>
            <h4 class="pb-0 pt-5">Request Type</h4>
            <p>Untuk mendapatkan list data Mahasiswa, dapat mengakses url dengan method :</p>
            <div class="card">
              <div class="card-body p-4">
                GET
              </div>
            </div>
            <h4 class="pb-0 pt-5">Get URL</h4>
            <p>Contoh curl untuk mendapatkan hasil data :</p>
            <div class="card">
              <div class="card-body p-4">
               <pre>
                <?= site_url() ?>api/{KEY API} 

                <span class="text-muted">//contoh:</span>
                <?= site_url() ?>api/4553eb3ff328b4868a7a1e6e53cd28b4
               </pre>
              </div>
            </div>
            <h4 class="pb-1 pt-5">Query Parameters</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Field</th>
                  <th scope="col">Type</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
            <h4 class="pb-1 pt-5"><span class="text-success">Sukses</span> Responses example in json</h4>
            <div class="card">
              <div class="card-body p-4">
                <pre>
                  {
                    "Responses": "200 OK",
                    "status": "failed",
                    "data": {
                        "message": "Key Tidak Terdaftar / key Kosong"
                    }
                  }
                </pre>
              </div>
            </div>
            <h4 class="pb-1 pt-5"><span class="text-danger">Failed</span> Responses example in json</h4>
            <div class="card">
              <div class="card-body p-4">
                <pre>
                  {
                    "Responses": "200 OK",
                    "status": "failed",
                    "data": {
                        "message": "Key Tidak Terdaftar / key Kosong"
                    }
                  }
                </pre>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="contact" class="contact-us section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">

          </div>
          <div class="col-lg-12 wow fadeInUp animated" data-wow-duration="0.5s" data-wow-delay="0.25s" style="visibility: visible;-webkit-animation-duration: 0.5s; -moz-animation-duration: 0.5s; animation-duration: 0.5s;-webkit-animation-delay: 0.25s; -moz-animation-delay: 0.25s; animation-delay: 0.25s;">
            <form id="contact"  method="post" action="<?= base_url('page/request') ?>">
              <div class="row">
                <div class="col-lg-5">
                  <div id="map">
                    <img src="<?= site_url('frontend/') ?>assets/images/contact-dec-v3.png" alt="">
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="row">
                    <div class="col-12 pb-0 mb-0 pt-5">
                      <div class="section-heading wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible;-webkit-animation-duration: 1s; -moz-animation-duration: 1s; animation-duration: 1s;-webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                        <h6>Request</h6>
                        <h4>Permintaan Penggunaan API</h4>
                        <div class="line-dec"></div>
                      </div>
                    </div>
                  </div>
                  <div class="fill-form">
                    <div class="row">
                      <div class="col-lg-6">
                          <input type="text" name="nama"  placeholder="Nama" required="">
                          <input type="text" name="email"  pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                          <input type="number" name="hp" placeholder="No HP" required>
                        </div>
                        <div class="col-lg-6">
                            <textarea name="tujuan" type="text" class="form-control"  placeholder="Tujuan Penggunaan.." required=""></textarea>  
                        </div>
                        <div class="col-lg-12">
                          <button type="submit" id="form-submit" class="main-button ">Kirim</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>

