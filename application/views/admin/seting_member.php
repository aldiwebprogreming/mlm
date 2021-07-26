
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Seting Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Member</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Seting Member</h4>
              </div>
              <div class="card-body">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">No Telp</th>
                      <th scope="col">Status</th>
                      <th scope="col">Opsi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach ($member as $data) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['name'] ?></td>
                      <td><?= $data['username'] ?></td>
                      <td><?= $data['email'] ?></td>
                      <td><?= $data['no_telp'] ?></td>
                      <td>
                        <?php 
                          if ($data['lider'] == null) {
                            
                          }else { ?>
                          <span class="badge badge-success"><?= $data['lider'] ?></span>
                          
                         <?php } ?>
                       
                      </td>
                      
                      <td>
                        <a href="<?= base_url('dashboard/set-detail/') ?><?= $data['kode_user'] ?>" class="btn btn-icon btn-info" id="modal-1"><i class="fas fa-user-cog"></i></a>
                        
                         <a href="<?= base_url('admin/hapus-lider/') ?><?= $data['kode_user'] ?>" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a>
                      </td>
                    </tr>

                  <?php } ?>
                    
                  </tbody>
                </table>

             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
     