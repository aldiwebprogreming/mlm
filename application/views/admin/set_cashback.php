
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Set Cashback</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <!--  <div class="breadcrumb-item"><a href="#">Tambah Admin</a></div> -->
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Set Cashback</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                   <div class="form-group">
                     <?php foreach ($cashback as $data) {?>
                      <label>Bonus Cashback</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                        <form  method="post" action="">
                       
                        <input type="text" required="" class="form-control daterange-cus" value="<?= $data['cashback'] ?>" name="bonus">
                      <?php } ?>
                      </div>
                      <input type="submit" name="update" value="Set Cashback" class="btn btn-primary mt-3">
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
     