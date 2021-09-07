
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Jenis Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah jenis</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data Jenis Paket Produk</h4>

              </div>
              <div class="card-body">
                <a href="<?= base_url('dashboard/tambah-jenis-produk') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Jenis Paket Produk </a>

                <!-- Button trigger modal -->


                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Jenis</th>
                       <th scope="col">Bonus Point</th>
                      <th scope="col">Date Create</th>

                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach ($jenis as $data) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['jenis'] ?></td>
                      <td><?= $data['bonus_point'] ?></td>
                      <td><?= $data['date'] ?></td>
                     
                      
                      <td>
                         <a href="<?= base_url('admin/hapus_jenis_produk?id=') ?><?= $data['id'] ?>" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a>
                         <a href="<?= base_url('dashboard/edit-jenis-produk/') ?><?= $data['id'] ?>" class="btn btn-icon btn-warning" id="modal-1"><i class="fas fa-edit"></i></a>
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
     