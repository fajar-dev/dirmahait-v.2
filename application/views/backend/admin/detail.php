<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 py-4">
                    <!-- Account -->
                    <div class=" p-lg-4 pt-0">
                    <div class="card-body mb-0 pb-0">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <a class="test-popup-link" href="<?= base_url('file/').$mhs->foto ?>">
                            <img
                            src="<?= base_url('file/').$mhs->foto ?>"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            id="uploadedAvatar"
                          />
                            </a>
                          <div class="button-wrapper">
                            <h4 class="fw-bold"><?php echo htmlentities($mhs->nama, ENT_QUOTES, 'UTF-8');?></h4>
                            <p class="mb-0 pt-0">(<?php echo htmlentities($mhs->kelas, ENT_QUOTES, 'UTF-8');?>) <?php echo htmlentities($mhs->nim, ENT_QUOTES, 'UTF-8');?></p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-12 mt-3">
                            <div class="table-responsive">
                              <table class="table fw-normal">
                                <tbody>
                                <tr>
                                      <td>Email </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($mhs->email, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                  <tr>
                                      <td>Jenis Kelamin </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($mhs->kelamin, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->tempat_lahir, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->tgl_lahir, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->provinsi, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Kab/Kota Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->kabkota, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->agama, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Asal </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->alamat_asal, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Kost </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->alamat_kost, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Sekolah</td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->asal_sekolah, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                        <td>Hobi </td>
                                        <td>:</td>
                                        <td><?php echo htmlentities($mhs->hobi, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                      <td>Instagram </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($mhs->ig, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                      <td>No. HP </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($mhs->wa, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                    <tr>
                                      <td>Quotes </td>
                                      <td>:</td>
                                      <td><?php echo htmlentities($mhs->quotes, ENT_QUOTES, 'UTF-8');?></td>
                                    </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Account -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Kontak Darurat</h5>
                    </div>
                    <!-- Account -->
                      <div class="card-body">
                        <div class="table-responsive text-nowrap">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($kontak as $data) { ?>
                              <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></strong>
                                </td>
                                <td><?php echo htmlentities($data->nomor, ENT_QUOTES, 'UTF-8');?></td>
                              </tr>
                              <?php } ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    <!-- /Account -->
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->