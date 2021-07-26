
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Admin</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Admin</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Tambah Admin</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <form method="post" action="">

                     
                    <div class="form-group">
                      <label>Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-user-shield"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="" name="username">
                      </div>
                      <small style="color: red;"><?php echo form_error('username'); ?></small>
                    </div>

                     <div class="form-group">
                      <label>Rule Admin</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </div>
                        </div>
                        <select class="form-control" name="rule">
                          <option>-- Pilih Rule --</option>
                          <option>Admin</option>
                          <option>Super Admin</option>
                        </select>
                      </div>
                      
                    </div>

                     
                    <div class="form-group">
                      <label>Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" class="form-control phone-number" value="" name="pass1">
                      </div>
                      <small style="color: red;"><?php echo form_error('pass1'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" class="form-control phone-number" value="" name="pass2">
                      </div>
                      <small style="color: red;"><?php echo form_error('pass2'); ?></small>
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
     