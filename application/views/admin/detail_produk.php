
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Produk</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Detail Produk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    
                   <table class="table table-striped">
                     
                      <tbody>
                        <tr>
                          
                          <td>Kode Produk</td>
                          <td>:</td>
                          <td><?= $produk['kode_produk'] ?></td>
                         
                        </tr>
                        <tr>
                         
                       
                        <tr>
                          <td>Harga Produk</td>
                          <td>:</td>
                          <td><?= $produk['harga'] ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Paket</td>
                          <td>:</td>
                          <td><?= $produk['jenis_produk'] ?></td>
                        </tr>

                         <tr>
                          <td>Jenis Voucher</td>
                          <td>:</td>
                          <td><?= $produk['jenis_voucher'] ?></td>
                        </tr>
                        <tr>
                          <td>Jumlah Voucher</td>
                          <td>:</td>
                          <td><?= $produk['jumlah_voucher'] ?> voucher</td>
                        </tr>
                        <tr>
                          <td>Nilai  Pervoucher</td>
                          <td>:</td>
                          <td>Rp.<?= $produk['nilai_voucher'] ?></td>
                        </tr>
                       <!--  <tr>
                          <td>Kode Voucher</td>
                          <td>:</td>
                          <td><?= $produk['kode_voucher'] ?></td>
                        </tr> -->
                        <tr>
                          <td>Bonus</td>
                          <td>:</td>
                          <td><?= $produk['bonus_sponsor'] ?>%</td>
                        </tr>

                        <tr>
                          <td>Bonus Point</td>
                          <td>:</td>
                          <td><?= $produk['bonus_point'] ?></td>
                        </tr>
                        <!-- <tr>
                          <td>Tgl Terbit</td>
                          <td>:</td>
                          <td><?= $produk['tgl_terbit'] ?></td>
                        </tr>

                        <tr>
                          <td>Tgl Batas Berlaku</td>
                          <td>:</td>
                          <td><?= $produk['tgl_batasterbit'] ?></td>
                        </tr> -->
                      </tbody>
                    </table>

                    <a href="<?= base_url('dashboard/produk') ?>" class="btn btn-success">Kembali </a>
                    
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
     