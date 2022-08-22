<main id="test-list"> 
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12 align-self-center text-center">
                <div class="left-content show-up header-text wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row justify-content-center">
                    <div class="col-lg-12">
                      <h6>Direktori Mahasiswa</h6>
                      <h2>Teknik Informatika Angkatan 2020</h2>
                      <h4>Universitas Malikussaleh</h4>
                    </div>
                    <div class="col-lg-6 mt-5 pt-lg-4 search">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-floating">
                            <input type="text" class="form-control search" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">cari Mahasiswa...</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div id="services" class="services section">
      <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
          <div class="row justify-content-center list">
                <?php
                  $no=1;
                  foreach($mhs as $data){
                ?>
              <div class=" col-xl-1-5 col-lg-3 col-md-6 col-sm-6 col-12 mb-lg-4">
                <div class="item">
                  <a href="#" class="image" data-bs-toggle="modal" data-bs-target="#detail<?php echo $data->id ?>"">
                    <div class="mahasiswa">
                      <div class="thumb">
                        <img src="<?php echo base_url()?>file/<?php echo $data->foto;?>" alt="">
                      </div>
                      <div class="down-content p-3">
                          <div class="row align-items-center">
                            <?php if($data->status_mhs == 1){?>
                              <small class="text-success"><span class="badge bg-primary text-white fw-light mb-2">Aktif</span></small>
                            <?php }elseif($data->status_mhs == 2){?>
                              <small class="text-success"><span class="badge bg-danger text-white fw-light mb-2">Tidak Aktif</span></small>
                            <?php }elseif($data->status_mhs == 3){?>
                              <small class="text-success"><span class="badge bg-success text-white fw-light mb-2">Lulus</span></small>
                            <?php }?>
                            <div class="col-10">
                              <h4 class="name"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></h4>
                              <span class="name"><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></span>
                            </div>
                            <div class="col-2">
                              <i class="bi bi-chevron-right text-dark"></i>
                            </div>
                          </div>
                        <p class="pt-3">"<?php echo htmlentities($data->quotes, ENT_QUOTES, 'UTF-8');?>"</p>
                      </div>
                    </div>
                  </a>  
                </div>
              </div>
                <?php
                  }
                ?>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination"></ul>
            </nav>
          </div>
        </div>
      </main>
  
              <!---------------Modal----------------------->
                <?php
                  foreach($mhs as $data){
                ?>
              <div class="modallogin  modal fade detail" id="detail<?php echo $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content rounded-4 shadow">
                      <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h5 class="modal-title">Modal title</h5> -->
                        <h2 class="fw-bold mb-0">Profile</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                
                      <div class="modal-body p-5 pt-0">
                        <div class="row align-items-center">
                          <div class="col-md-2 col-12 mb-3">
                            <img src="<?php echo base_url()?>file/<?php echo $data->foto;?>" height="1000" class="rounded" alt="">
                          </div>
                          <div class="col-md-10">
                            <h2 class="fs-5 fw-bold"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></h2>
                            <small class="text-muted"><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></small>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 mt-3">
                            <div class="table-responsive">
                              <table class="table fw-normal">
                                <tbody>
                                    <tr>
                                      <td>Status Mahasiswa </td>
                                      <td>:</td>
                                      <td>
                                      <?php if($data->status_mhs == 1){?>
                                        <small class="text-success"><span class="text-primary">Aktif</span></small>
                                      <?php }elseif($data->status_mhs == 2){?>
                                        <small class="text-success"><span class="text-danger">Tidak Aktif</span></small>
                                      <?php }elseif($data->status_mhs == 3){?>
                                        <small class="text-success"><span class="text-success">Lulus</span></small>
                                      <?php }?>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Jenis Kelamin </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($data->kelamin, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->tempat_lahir, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->tgl_lahir, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->agama, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->provinsi, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Kab/Kota Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->kabkota, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->alamat_asal, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Kost </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->alamat_kost, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Sekolah</td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->asal_sekolah, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Hobi </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($data->hobi, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                      <td>Instagram </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($data->ig, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                      <td>Quotes </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($data->quotes, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <?php
                    }
                  ?> 
                <!--------------- end Modal----------------------->