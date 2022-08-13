<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-xl-12">
                  <div class="nav-align-top mb-4 mt-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active py-3" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><i class="tf-icons bx bx-mail-send"></i> Kirim ke Mahasiswa </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link py-3" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><i class="tf-icons bx bx-mail-send"></i> Kirim ke Tamu</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link py-3" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false"><i class="tf-icons bx bx-message-square"></i> Outbox</button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
                      <h5 class="py-2">Kirim ke Mahasiswa</h5>
                        <div class="row">
                          <form action="" method="POST">
                          <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">User</label>
                            <select class="form-select" id="email" name="email" aria-label="Default select example">
                              <option selected="" disabled>--- Pilih User --</option>
                              <?php foreach ($mhs as $data) { ?>
                                <option value="<?php echo htmlentities($data->email, ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($data->nama, ENT_QUOTES, 'UTF-8');?>, <?php echo htmlentities($data->nim, ENT_QUOTES, 'UTF-8');?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="Subject" class="form-label">Subject</label>
                            <input
                              type="text"
                              class="form-control"
                              id="Subject"
                              name="subject"
                              placeholder="Subject"
                            />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="quotes" class="form-label">Isi</label>
                            <textarea class="form-control" id="quotes" name="isi" rows="3"></textarea>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-primary" >Kirim</button>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                      <h5 class="py-2">Kirim ke Tamu</h5>
                        <div class="row">
                          <form action="" method="POST">
                          <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Email"
                            />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="Subject" class="form-label">Subject</label>
                            <input
                              type="text"
                              class="form-control"
                              id="Subject"
                              name="subject"
                              placeholder="Subject"
                            />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="quotes" class="form-label">Isi</label>
                            <textarea class="form-control" id="quotes" name="isi" rows="3"></textarea>
                          </div>
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" >Kirim</button>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                        <h5 class="py-2">Outbox</h5>
                        <div class="table-responsive text-nowrap">
                          <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>NO</th>
                                <th>Date</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Isi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1;
                               foreach ($hasil as $data) { ?>
                              <tr>
                                <td><?= $no++?></td>
                                <td><?php echo htmlentities($data->date, ENT_QUOTES, 'UTF-8');?></td>
                                <td><?php echo htmlentities($data->email, ENT_QUOTES, 'UTF-8');?></td>
                                <td><?php echo htmlentities($data->subjek, ENT_QUOTES, 'UTF-8');?></td>
                                <td><?php echo htmlentities($data->isi, ENT_QUOTES, 'UTF-8');?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->