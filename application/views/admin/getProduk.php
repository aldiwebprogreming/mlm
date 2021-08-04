
<div class="row">

<?php foreach ($getProduk as $data) { ?>
<div class="col-sm-4">
<div class="card shadow" style="">
  <img class="card-img-top" src="<?= base_url('assets_admin/img/news/img04.jpg') ?>" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title"><?= $data['jenis_produk'] ?></h3>
    <hr>
    <h5 class="card-title"><?= $data['jenis_voucher'] ?></h5>
    <p class="card-text text-center">Rp <?= $data['harga'] ?>.</p>
    <p class="text-center text-center"><strong>Jumlah voucher : <?= $data['jumlah_voucher'] ?></strong></p>
    <center>
    <a href="<?= base_url('produk/detail-produk/') ?><?= $data['kode_produk'] ?>" class="btn btn-primary">Beli Paket</a>
</center>
  </div>
</div>
</div>
<?php } ?>

</div>