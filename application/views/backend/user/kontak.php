<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-12 mb-4">
                  <div class="alert alert-primary alert-dismissible" role="alert">
                    <div class="me-auto fw-semibold pb-2"><i class="bx bx-error pb-1"></i> pemberitahuan !</div>
                    Kontak darurat bertujuan untuk pendataan wali dari mahasiswa yang dapat dihubungi, apabila terjadi hal hal yang tidak diinginkan pada mahasiswa. <br> 
                    Data ini bersifat pribadi dan tidak publish secara umum, hanya admin yang punya kewenangan yang dapat mengakses
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Daftar Kontak</h5>
                      <div class="dropdown">
                        <button class="btn btn-primary btn-sm rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#tambah">
                          <i class="bx bx-plus"></i> Tambah Kontak
                        </button>
                      </div>
                    </div>
                    <!-- Account -->
                      <div class="card-body">
                        <div class="table-responsive text-nowrap">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($kontak as $data) { ?>
                              <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></strong>
                                </td>
                                <td><?php echo htmlentities($data->nomor, ENT_QUOTES, 'UTF-8');?></td>
                                <td>
                                  <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $data->id ?>" class="btn btn-icon btn-warning">
                                    <span class="tf-icons bx bx-pencil"></span>
                                  </button>
                                  <a href="<?= base_url('user/kontak_hapus/'.$data->id) ?>" class="btn btn-icon btn-danger">
                                    <span class="tf-icons bx bx-trash"></span>
                                  </a>
                                </td>
                                    <!-- Modal edit -->
                                    <div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit Kontak</h5>
                                            <button
                                              type="button"
                                              class="btn-close"
                                              data-bs-dismiss="modal"
                                              aria-label="Close"
                                            ></button>
                                          </div>
                                          <form action="<?= base_url('user/kontak_edit') ?>" method="post">
                                            <div class="modal-body">
                                              <div class="row">
                                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                                <div class="col-12 mb-3">
                                                  <label for="nameSmall" class="form-label">Nama</label>
                                                  <input type="text" id="nameSmall" name="nama" value="<?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?>" class="form-control" required placeholder="Contoh: Ibu" />
                                                </div>
                                                <div class="col-12 mb-0">
                                                  <label class="form-label" for="emailSmall">Nomor HP</label>
                                                  <input type="number" class="form-control" name="nomor" value="<?php echo htmlentities($data->nomor, ENT_QUOTES, 'UTF-8');?>" id="emailSmall" required placeholder="08..." />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                              </button>
                                              <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
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

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Kontak</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="<?= base_url('user/kontak_add') ?>" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <label for="nameSmall" class="form-label">Nama</label>
                          <input type="text" id="nameSmall" class="form-control" name="nama" required placeholder="Contoh: Ibu" />
                        </div>
                        <div class="col-12 mb-0">
                          <label class="form-label" for="emailSmall">Nomor HP</label>
                          <input type="number" class="form-control" id="emailSmall" name="nomor" required placeholder="08..." />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>