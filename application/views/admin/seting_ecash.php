
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Seting Bonus</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Seting Bonus</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <form method="post" action="<?= base_url('admin/edit_level') ?>">

                        <?php foreach ($level as $data) {?>
                      <div class="form-group">
                      <label><?= $data['name_level'] ?></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-percent"></i>
                          </div>
                        </div>
                        <input type="number" class="form-control phone-number" value="<?= $data['jml_level'] ?>" name="level[]" maxlength="3">
                        <input type="hidden" class="form-control phone-number" value="<?= $data['id'] ?>" name="id[]" maxlength="3">
                      </div>
                    </div>

                  <?php } ?>

                     

                    <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
                     <a href="<?= base_url('dashboard/seting-ecash') ?>" class="btn btn-success"><i class="fas fa-redo"></i> Refresh </a>
                    </form>
                    
                  </div>

                  </div>
                </div>
             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
