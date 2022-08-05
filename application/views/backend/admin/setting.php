 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h5 class="m-0 me-2">Setting</h5>
                        </div>
                        <div class="card-body">
                          <form method="post" action="<?= base_url('admin/setting_update') ?>">
                            <div class="mb-3">
                              <label class="form-label mb-2" for="">Pengumuman: </label>
                              <textarea id="summernote" name="pengumuman"><?= $setting->pengumuman ?></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlSelect1" class="form-label">Status Registrasi</label>
                              <select class="form-select" id="exampleFormControlSelect1" name="reg" aria-label="Default select example">
                                <?php if($setting->register == 1){ ?>
                                  <option value="1">Buka</option>
                                  <option value="0">Tutup</option>
                                <?php }else{?>
                                  <option value="0">Tutup</option>
                                  <option value="1">Buka</option>
                                <?php } ?>  
                              </select>
                            </div>
                            <div class="mt-2">
                              <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
