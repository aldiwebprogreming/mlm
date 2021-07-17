<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Invoices anda</h1>
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
            <li class="list-group-item"><b>Invoices </b> </li>

            <li class="list-group-item">
              
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Order id</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Tgl Invoices</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>

                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($invo as $invo1) {?>
                  <tr>
                    <th scope="row"><?= $invo1['order_id'] ?></th>
                    <td><?= $invo1['nama_produk'] ?></td>
                    <td><?= $invo1['tgl_order'] ?></td>
                    <td><?= $invo1['total'] ?></td>
                    <td>
                      <?php 

                        if ($invo1['status_code'] == 200) {
                          echo '<span class="badge badge-secondary">Terbayar</span>';
                        }else{
                           echo '<span class="badge badge-secondary">Pending</span>';
                        }

                       ?>
                    </td>
                    <td><a href="<?= $invo1['pdf_url'] ?>" target="
                      _blank">Download</a></td>
                  </tr>

                <?php } ?>
                  
                </tbody>
              </table>
            </li>
            
          </ul>
        </div>
      </div>


  </div>
</div>


