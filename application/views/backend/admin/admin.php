 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Data Admin</h5>
                      <div class="dropdown">
                        <button class="btn btn-primary btn-sm rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#tambahadmin">
                          <i class="bx bx-plus"></i> Tambah Admin
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
                                <th>NIM</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($admin as $data) { ?>
                              <tr>
                                <td>
                                  <strong><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></strong>
                                </td>
                                <td><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></td>
                                <td>
                                  <a href="<?= base_url('admin/admin_hapus/'.$data->nim) ?>" class="btn btn-danger btn-del">
                                    <span class="tf-icons bx bx-trash"></span>Cabut Akses
                                  </a>
                                </td>
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
            <div class="modal fade" id="tambahadmin" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah admin</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form method="post" action="<?= base_url('admin/admin_add') ?>" >
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <label for="nameSmall" class="form-label">Nama</label>
                          <select class="form-select" id="exampleFormControlSelect1" name="user" aria-label="Default select example">
                            <option selected="" disabled>--- Pilih User --</option>
                              <?php foreach ($mhs as $data) { ?>
                                <option value="<?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?>, <?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></option>
                              <?php } ?>
                          </select>
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