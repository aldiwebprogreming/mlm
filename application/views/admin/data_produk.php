
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Produk</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data Produk</h4>
              </div>
              <div class="card-body">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kode produk</th>
                      <th scope="col">Jenis Paket</th>
                      <th scope="col">Jenis Voucher</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach ($produk as $data) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['kode_produk'] ?></td>
                      <td><?= $data['jenis_produk'] ?></td>
                      <td><?= $data['jenis_voucher'] ?></td>
                      
                      <td>
                        <a href="<?= base_url('dashboard/produk/') ?><?= $data['kode_produk'] ?>" class="btn btn-icon btn-info" id="modal-1"><i class="fas fa-info-circle"></i></a>
                        <a href="<?= base_url('dashboard/edit-produk/') ?><?= $data['kode_produk'] ?>" class="btn btn-icon btn-warning" id="modal-1"><i class="fas fa-edit"></i></a>
                         <a href="<?= base_url('dashboard/hapus-produk/') ?><?= $data['kode_produk'] ?>" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a>
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
     