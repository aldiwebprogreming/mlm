
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Member</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Detail Member</h4>
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
                        
                      </tbody>
                    </table>

                    <a href="<?= base_url('dashboard/member') ?>" class="btn btn-success">Kembali </a>
                    
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
     