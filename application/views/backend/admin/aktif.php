<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Data Mahsiswa</h5>
                      <div class="dropdown">
                        <a href="<?= base_url('admin/print')?>" class="btn btn-primary rounded-pill">
                          <i class="bx bx-printer"></i> Print
                        </a>
                        <div class="btn-group" id="dropdown-icon-demo">
                          <button type="button" class="btn btn-primary dropdown-toggle rounded-pill" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-menu"></i> Export</button>
                          <ul class="dropdown-menu">
                            <li><a href="<?= base_url('admin/pdf')?>" class="dropdown-item d-flex align-items-center"><i class="bx bx-chevron-right scaleX-n1-rtl"></i>PDF</a></li>
                            <li><a href="<?= base_url('admin/csv')?>" class="dropdown-item d-flex align-items-center"><i class="bx bx-chevron-right scaleX-n1-rtl"></i>CSV</a></li>
                          </ul>
                        </div>
                      </div>
                      
                    </div>
                    <!-- Account -->
                      <div class="card-body">
                        <div class="table-responsive text-nowrap">
                          <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Status Mahasiswa</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($hasil as $data) { ?>
                              <tr>
                                <td>
                                  <a class="test-popup-link" href="<?= base_url('file/').$data->foto ?>">
                                    <img
                                    src="<?= base_url('file/').$data->foto ?>"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="70"
                                    width="70"
                                    id="uploadedAvatar"
                                    />
                                  </a>
                                </td>
                                <td>
                                  <strong><strong><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></strong>
                                </td>
                                <td><?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></td>
                                <td>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#status<?= $data->id ?>">
                                    <?php if($data->status_mhs == 1){ ?>
                                      <span class="badge bg-primary"><em class="pt-5">Aktif </em><span class="tf-icons bx bx-dots-vertical-rounded"></span></span>
                                    <?php }elseif($data->status_mhs == 2){ ?>
                                      <span class="badge bg-danger"><em class="pt-5">Tidak Aktif </em><span class="tf-icons bx bx-dots-vertical-rounded"></span></span>
                                    <?php }elseif($data->status_mhs == 3){ ?>
                                      <span class="badge bg-success"><em class="pt-5">Lulus </em><span class="tf-icons bx bx-dots-vertical-rounded"></span></span>
                                    <?php } ?>

                                  </a>
                                        <!-- Modal Tambah -->
                                          <div class="modal fade" id="status<?= $data->id ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel2"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></h5>
                                                  <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                  ></button>
                                                </div>
                                                <form action="<?= base_url('admin/status_mhs') ?>" method="post">
                                                  <input type="hidden" name="id" value="<?= $data->id ?>">
                                                  <div class="modal-body">
                                                    <div class="row">
                                                      <div class="col-12 mmy-3">
                                                      <label for="nameSmall" class="form-label">Status</label>
                                                        <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                                                        <?php if($data->status_mhs == 1){ ?>
                                                          <option value="1">Aktif</option>
                                                          <option value="2">Tidak Aktif</option>
                                                          <option value="3">Lulus</option>
                                                        <?php }elseif($data->status_mhs == 2){ ?>
                                                          <option value="2">Tidak Aktif</option>
                                                          <option value="1">Aktif</option>
                                                          <option value="3">Lulus</option>
                                                        <?php }elseif($data->status_mhs == 3){ ?>
                                                          <option value="3">Lulus</option>
                                                          <option value="2">Tidak Aktif</option>
                                                          <option value="1">Aktif</option>
                                                          <?php } ?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                      Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                </td>
                                <td>
                                  <a href="<?= base_url('admin/mhs_detail/'.htmlentities($data->nim, ENT_QUOTES, 'UTF-8')) ?>" class="btn btn-primary btn-icon">
                                    <span class="tf-icons bx bx-info-circle"></span>
                                  </a>
                                  <a href="<?= base_url('admin/suspend/'.$data->id.'/mhs_aktif') ?>" class="btn btn-danger">
                                    <span class="tf-icons bx bx-x fw-bold"></span>
                                    Suspend
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