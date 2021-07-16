<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Jaringan Anda</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>

 

<div class="container">
  <div class="row">

      <div class="col-sm-4">
        <div class="card" style="height: 250px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Produk</b> </li>
            <?php foreach ($produk as $data ) { ?>
         
            <li class="list-group-item"><a href="<?= base_url() ?>ebunga/detail/<?= $data['kode_produk'] ?>"><?= $data['judul_produk']  ?></a> / <b>Rp <?= $data['harga'] ?></b></li>

          <?php } ?>
            
          </ul>
        </div>
      </div>

      <div class="col-sm-8" style="margin-bottom: 30px;">
        <div class="card" style="height: 250px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Detail jaringan anda </b> </li>

            <?php foreach ($jaringan as $data2) {?>
             <li class="list-group-item"><?= $data2['name'] ?> | <?= $data2['email'] ?> | <?= $data2['no_telp'] ?>| <?= $data2['kode_jaringan'] ?> <button id="lihat">Lihat Jaringan</button><button id="tutup" style="display: none">Tutup</button>

                <div id="det" style="display: none">
                <hr>
                 <?php

                      $lavel2 = $this->db->get_where('tbl_register')

                   ?>
                </div>

             </li>

           <?php } ?>

                   
          </ul>
        </div>
      </div>


  </div>
</div>


<script>
  $(document).ready(function(){
    $("#lihat").click(function(){
      $("#det").show();
      $("#tutup").show();
      $("#lihat").hide();
    })

    $("#tutup").click(function(){
      $("#det").hide();
      $("#tutup").hide();
      $("#lihat").show();
    })
  })
</script>

