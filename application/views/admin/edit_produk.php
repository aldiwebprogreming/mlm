
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Produk</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Edit Produk</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <form method="post" action="">
                    <div class="form-group">
                      <label>Kode Produk</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" readonly="" class="form-control phone-number" value="<?= $produk['kode_produk'] ?>" name ="kd_produk">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Judul Produk</label>
                      <input type="text" class="form-control" placeholder="" name="judul_produk" value="<?php echo set_value('judul_produk'); ?> <?= $produk['judul_produk'] ?>">
                      <small style="color: red;"><?php echo form_error('judul_produk'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Keterangan Produk</label>
                      <textarea class="form-control" placeholder="" name="ket_produk"><?php echo set_value('ket_produk'); ?> <?= $produk['keterangan_produk'] ?></textarea>
                       <small style="color: red;"><?php echo form_error('ket_produk'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Harga Produk</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <strong>Rp.</strong>
                          </div>
                        </div>
                        <input type="number" class="form-control phone-number" placeholder="" name="harga_produk" value="<?= $produk['harga'] ?>">
                      </div>
                       <small style="color: red;"><?php echo form_error('harga_produk'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Jumlah Voucher</label>
                      <input type="number" class="form-control" placeholder="" name="jml_voucher" value="<?= $produk['jumlah_voucher'] ?>">
                       <small style="color: red;"><?php echo form_error('jml_voucher'); ?></small>
                    </div>

                    
                    <div class="form-group">
                      <label>Nilai Pervoucher</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <strong>Rp.</strong>
                          </div>
                        </div>
                        <input type="number" class="form-control phone-number" placeholder=" " name="nilai_voucher" value="<?= $produk['nilai_voucher'] ?>">
                      </div>
                       <small style="color: red;"><?php echo form_error('nilai_voucher'); ?></small>
                    </div>

                    
                    <div class="form-group">
                      <label>Kode Voucher</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="<?= $produk['kode_voucher'] ?>" name="kd_voucher" readonly>
                      </div>
                    </div>

                    <input type="submit" name="kirim" class="btn btn-primary" value="Edit Produk">
                    <a href="<?= base_url('dashboard/produk') ?>" class="btn btn-success">Kembali </a>
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
     