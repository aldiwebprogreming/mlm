<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-content">
     
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <!-- <div class="card-stats-title">Order Statistics -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div> -->
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Keranjang Upgrade</h4>
                  </div>
                  <div class="card-body">
                    <?= $jml ?>
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Keranjang Upgrade</h4>
                  
                </div>



                <div class="card-body p-0">

                  <div class="container">
                   <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>No Telp</th>
                                <th>Paket Voucher</th>
                                <th>Opsi</th>

                               
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                
                                
                                <th>Name</th>
                                <th>No Telp</th>
                                <th>Paket Voucher</th>
                                <th>Opsi</th>
                               
                                
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $no = 1;
                           foreach ($keranjang as $data) { ?>
                            <tr>
                               
                                <td><?= $data['name'] ?></td>
                               
                                <td><?= $data['no_telp'] ?></td>
                                <td>
                                  <?php 

                                      $prd = $this->db->get_where('tbl_produk',['kode_produk' => $data['kode_produk']])->row_array();

                                      echo $prd['jenis_produk'];

                                   ?>

                                </td>
                                <td>
                                  <a href="" class="btn btn-danger">Hapus</a>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                                    Detail
                                  </button>
                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalalert<?= $data['id'] ?>">
                                  Setujuia
                                </button>
                                </td>

                                
                               
                            </tr>

                            <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detail Keranjang Belanja</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <label><strong>Nama</strong></label><br>
                                  <?= $data['name'] ?>
                                  <hr>

                                  <label><strong>Email</strong></label><br>
                                  <?= $data['email'] ?>
                                  <hr>

                                  <label><strong>No Telo</strong></label><br>
                                  <?= $data['no_telp'] ?>
                                  <hr>
                                  <?php 

                                    $produk = $this->db->get_where('tbl_produk',['kode_produk' => $data['kode_produk']])->row_array();

                                   ?>
                                  <label><strong>Jenis Paket</strong></label><br>
                                  <?= $produk['jenis_produk'] ?>
                                  <hr>
                                  
                                <label><strong>Nilai Voucher</strong></label><br>
                                  Rp.<?= $produk['nilai_voucher'] ?>
                                  <hr>
                                  <label><strong>Jumlah Voucher</strong></label><br>
                                  <?= $produk['jumlah_voucher'] ?> voucher
                                  <hr>

                                  <label><strong>Bonus Sponsor</strong></label><br>
                                  <?= $produk['bonus_sponsor'] ?>%
                                  <hr>

                                   <label><strong>Bonus Point</strong></label><br>
                                  <?= $produk['bonus_point'] ?> 
                                  <hr>
                                   <label><strong>Harga</strong></label><br>
                                  Rp.<?= $produk['harga'] ?> 
                               

                                  <hr>
                                   <label><strong>Status</strong></label><br>
                                  <?php 

                                    $status = $this->db->get_where('tbl_bukti_transaksi',['kode_user' => $data['kode_user'], 'kode_produk' => $data['kode_produk']])->result_array();

                                    if ($status == true) { 
                                      echo "<span class='badge badge-success'>Sudah ada bukti</span>";
                                    }else{

                                      echo "<span class='badge badge-danger'>Belum ada proses pembayaran</span>";


                                    }

                                   ?>
                                  <hr>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                              </div>
                            </div>
                          </div>



                           <div class="modal fade" id="exampleModalalert<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <h4>Apakah anda ingin menyetujuinya?</h4>
                              <form method="post" action="<?= base_url() ?>admin/action_keranjang_upgrade">
                              <input type="hidden" name="kode_user" value="<?= $data['kode_user'] ?>">
                               <input type="hidden" name="kode_produk" value="<?= $data['kode_produk'] ?>">
                              <input type="hidden" name="upgrade" value="upgrade">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <input type="submit" name="kirim" value="Submit" class="btn btn-primary">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


                          <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                  
                </div>
              </div>
            </div>


           
          </div>

      

      </div>

       








      <!-- Button trigger modal -->


<!-- Modal -->



   
               

      <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>