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
                                <th>Date</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Tujuan</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1;
                               foreach ($hasil as $data) { ?>
                              <tr>
                                <td><?= $no++?></td>
                                <td><?php echo htmlentities($data->date, ENT_QUOTES, 'UTF-8');?></td>
                                <td><strong><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?></strong></td>
                                <td><?php echo htmlentities($data->email, ENT_QUOTES, 'UTF-8');?></td>
                                <td><?php echo htmlentities($data->hp, ENT_QUOTES, 'UTF-8');?></td>
                                <td><?php echo htmlentities($data->tujuan, ENT_QUOTES, 'UTF-8');?></td>
                                <td>
                                  <a href="<?= base_url('admin/pesan_hapus/'.$data->id) ?>" class="btn btn-danger btn-del">
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