
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Vendor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <!--  <div class="breadcrumb-item"><a href="#">Tambah Admin</a></div> -->
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Vendor</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                   <div class="form-group">
                      <label>Bonus Vendor</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                        <form  method="post" action="">
                        <input type="hidden" name="id" value="<?= $vendor['id'] ?>">
                        <input type="text" required="" class="form-control daterange-cus" value="<?= $vendor['bonus_vendor'] ?>" name="bonus">
                      </div>
                      <input type="submit" name="update" value="Update bonus" class="btn btn-primary mt-3">
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
     