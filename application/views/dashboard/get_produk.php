<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Produk anda</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>

 <div class="container" style="margin-bottom: 80px;">
  <div class="row">

      <div class="col-sm-4">
        <div class="card" style="height: 250px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Produk</b> </li>
            <?php foreach ($produk as $data ) { ?>
         
            <li class="list-group-item"><?= $data['judul_produk']  ?> / <b>Rp <?= $data['harga'] ?></b></li>

          <?php } ?>
            
          </ul>
        </div>
      </div>

      <div class="col-sm-8" style="margin-bottom: 30px;">
        <div class="card" style="height: 250px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Produk </b> </li>

            <li class="list-group-item">
              
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Nilai voucher</th>
                    <th scope="col">Jumlah voucher</th>
                
                  </tr>
                </thead>
                <tbody>

                  <?php 
                    if ($produk_anda == false) {
                      echo "tidak ada produk";
                    } else {
                   ?>

                  <?php foreach ($produk_anda as $data2) {?>
                  <tr>
                    <td><?= $data2['judul_produk'] ?></td>
                    <td><?= $data2['keterangan_produk'] ?></td>
                     <td><?= $data2['harga'] ?></td>
                    <td><?= $data2['nilai_voucher'] ?></td>
                    <td><?= $data2['jumlah_voucher'] ?></td>
                  
                  </tr>

                <?php }} ?>
                  
                </tbody>
              </table>
            </li>
            
          </ul>
        </div>
      </div>


  </div>
</div>


