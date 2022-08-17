<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Data Mahasiswa</h5>
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
                                  <a href="<?= base_url('admin/mhs_detail/'.htmlentities($data->nim, ENT_QUOTES, 'UTF-8')) ?>" class="btn btn-primary btn-icon">
                                    <span class="tf-icons bx bx-info-circle"></span>
                                  </a>
                                  <a href="<?= base_url('admin/aktifkan/'.$data->id.'/mhs_pending') ?>" class="btn btn-success">
                                    <span class="tf-icons bx bx-check fw-bold"></span>
                                    Aktifkan
                                  </a>
                                  <a href="<?= base_url('admin/suspend/'.$data->id.'/mhs_pending') ?>" class="btn btn-danger">
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