
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail  Set Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Member</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Detail Set Member</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    
                   <table class="table table-striped">
                     
                      <tbody>
                        <tr>
                          
                          <td>Kode User</td>
                          <td>:</td>
                          <td><?= $member['kode_user'] ?></td>
                         
                        </tr>
                        <tr>
                         <td>Name</td>
                          <td>:</td>
                          <td><?= $member['name'] ?></td>
                        </tr>
                          
                        <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td><?= $member['username'] ?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td><?= $member['email'] ?></td>
                        </tr>
                        <tr>
                          <td>No Telp</td>
                          <td>:</td>
                          <td><?= $member['no_telp'] ?></td>
                        </tr>

                        <tr>
                          <td>Set Lider</td>
                          <td>:</td>
                          <td>
                            <form method="post" action="<?= base_url('dashboard/set-detail/') ?><?= $member['kode_user'] ?>">
                            <select class="form-control" name="lider">
                              <?php 

                                for ($i=1; $i <= 20 ; $i++) { ?>
                                  <option>Lider <?= $i ?></option>
                                <?php } ?>
                            </select>
                          </td>
                          <td><input type="submit" name="kirim" class="btn btn-primary" value="Set Lider"></td>
                          </form>
                        </tr>
                        
                      </tbody>
                    </table>

                    <a href="<?= base_url('dashboard/seting-member/') ?>" class="btn btn-success">Kembali </a>
                    
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
     