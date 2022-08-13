<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Data API</h5>
                      <div class="dropdown">
                        <button class="btn btn-primary btn-sm rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#api">
                          <i class="bx bx-plus"></i> Generate Key
                        </button>
                      </div>
                    </div>
                    <!-- Account -->
                      <div class="card-body">
                        <div class="table-responsive text-nowrap">
                          <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>Nama pJ</th>
                                <th>No.HP PJ</th>
                                <th>Key</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1;
                               foreach ($hasil as $data) { ?>
                              <tr>
                                <td><?= $no++?></td>
                                <td><?php echo htmlentities($data->pj, ENT_QUOTES, 'UTF-8');?></td>
                                <td><strong><?php echo htmlentities($data->hp_pj, ENT_QUOTES, 'UTF-8');?></strong></td>
                                <td>
                                  <div class="form-password-toggle">
                                    <div class="input-group">
                                      <input
                                        type="password"
                                        class="form-control"
                                        id="basic-default-password12"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2"
                                        value="<?php echo htmlentities($data->apikey, ENT_QUOTES, 'UTF-8');?>"
                                      />
                                      <span id="basic-default-password2" class="input-group-text cursor-pointer"
                                        ><i class="bx bx-hide"></i
                                      ></span>
                                    </div>
                                  </div>  
                                <td>
                                  <a href="#" class="btn btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#apiedit<?= $data->id ?>">
                                    <span class="tf-icons bx bx-pencil"></span>
                                  </a>
                                  <a href="<?= base_url('admin/apikey_hapus/'.$data->id) ?>" class="btn btn-danger btn-icon btn-del">
                                    <span class="tf-icons bx bx-trash"></span>
                                  </a>
                                </td>
                              </tr>
                              <!-- Modal Tambah -->
                              <div class="modal fade" id="apiedit<?= $data->id ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel2">Edit Data API Key</h5>
                                      <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                      ></button>
                                    </div>
                                    <form action="<?= base_url('admin/apikey_edit') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-12 mb-3">
                                            <label for="nameSmall" class="form-label">Nama PJ</label>
                                            <input type="text" id="nameSmall" class="form-control" name="pj" value="<?php echo htmlentities($data->pj, ENT_QUOTES, 'UTF-8');?>" required placeholder="Contoh: Ibu" />
                                          </div>
                                          <div class="col-12 mb-0">
                                            <label class="form-label" for="emailSmall">Nomor HP</label>
                                            <input type="number" class="form-control" id="emailSmall" value="<?php echo htmlentities($data->hp_pj, ENT_QUOTES, 'UTF-8');?>" name="hp" required placeholder="08..." />
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
             <div class="modal fade" id="api" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Generate API Key</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="<?= base_url('admin/apikey_add') ?>" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12 mb-3">
                          <label for="nameSmall" class="form-label">Nama PJ</label>
                          <input type="text" id="nameSmall" class="form-control" name="pj" required placeholder="Contoh: Ibu" />
                        </div>
                        <div class="col-12 mb-0">
                          <label class="form-label" for="emailSmall">Nomor HP</label>
                          <input type="number" class="form-control" id="emailSmall" name="hp" required placeholder="08..." />
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