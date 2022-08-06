<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Inbox</h5>
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
                                  <a href="<?= base_url('admin/pesan_hapus/'.$data->id) ?>" class="btn btn-warning btn-icon">
                                    <span class="tf-icons bx bx-pencil"></span>
                                  </a>
                                  <a href="<?= base_url('admin/pesan_hapus/'.$data->id) ?>" class="btn btn-danger btn-icon">
                                    <span class="tf-icons bx bx-trash"></span>
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