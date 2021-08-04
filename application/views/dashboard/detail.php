<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Detail Produk</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>

 <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
      <input type="hidden" name="name" id="name" value="<?= $this->session->name  ?>">
      <input type="hidden" name="email" id="email" value="<?= $this->session->email  ?>">
      <input type="hidden" name="kode_produk" value="<?= $det['kode_produk'] ?>">
      <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $det['judul_produk'] ?>">
      <input type="hidden" name="harga" id="harga" value="<?= $det['harga'] ?>">
      <input type="hidden" name="cashback" id="cashback" value="<?= $det['bonus'] ?>">
       <input type="hidden" name="kode_user" id="kode_user" value="<?= $this->session->kode_user ?>">

  </form>

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
            <li class="list-group-item"><b>Detail Produk </b> </li>

            <li class="list-group-item"><b>Judul Produk : </b> <?= $det['judul_produk']  ?></li>
            <li class="list-group-item"><b>Keterangan : </b><?= $det['keterangan_produk']  ?></li>

            <li class="list-group-item"><b>Harga : </b><?= $det['harga']  ?></li>
            <li class="list-group-item"><b>Nilai voucher : </b><?= $det['nilai_voucher'] ?> /vcr </li>

             <li class="list-group-item"><b>Jumlah Voucher : </b><?= $det['jumlah_voucher'] ?> </li>


            <li class="list-group-item"><button type="button" id="pay-button" data-amount="800" class="btn btn-primary btn-lg btn-block">Pay!</button></li>           
          </ul>
        </div>
      </div>


  </div>
</div>

<script type="text/javascript">
  
    $("#pay-button").click(function (event) {
      // var gross =  $(this).data('amount');
      // var nama = $(this).data('nama');
      event.preventDefault();
      $(this).attr("disabled", "disabled");


    var nama_produk = $('#nama_produk').val();
    var harga = $('#harga').val();
    var name = $('#name').val();
    var email = $('#email').val();

    
    $.ajax({
      type:'POST',
      url: '<?=base_url()?>/snap/token',
      cache: false,

      data: {
        harga: harga,
        nama_produk: nama_produk,
        name: name,
        email: email,
      },

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          // resultType.innerHTML = type;
          // resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>

  <br>
  <br>
  <br>
