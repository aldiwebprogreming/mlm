
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Member</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data Member</h4>
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
                        <a href="<?= base_url('dashboard/detail-member/') ?><?= $data['kode_user'] ?>" class="btn btn-icon btn-info" id="modal-1"><i class="fas fa-info-circle"></i></a>
                        
                         <a href="<?= base_url('dashboard/hapus-member/') ?><?= $data['kode_user'] ?>" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a>
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
     