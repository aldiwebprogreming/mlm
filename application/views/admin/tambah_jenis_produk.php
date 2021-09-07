
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Jenis Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Jenis Produk</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Tambah Jenis Produk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <form method="post" action="">

                     
                    <div class="form-group">
                      <label>Tambah Jenis Produk</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-clipboard-check"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="" name="jenis">
                      </div>
                      <small style="color: red;"><?php echo form_error('jenis'); ?></small>
                    </div>

                     <div class="form-group">
                      <label>Bonus Point</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-percent"></i>
                          </div>
                        </div>
                        <input type="number" class="form-control " value="" name="point">
                      </div>
                      <small style="color: red;"><?php echo form_error('persen'); ?></small>
                    </div>

                    

                    <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
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
     