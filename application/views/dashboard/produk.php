<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Produk</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>

<div class="container">
  <div class="row">

      <?php foreach ($produk as $data) { ?>
        <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 40px; margin-top: 20px;">
          <div class="pri_table_list">
            <h3><?= $data['judul_produk'] ?> <br/> <span>Rp. <?= $data['harga'] ?></span></h3>
            
            <button><a href="<?= base_url() ?>ebunga/detail/<?= $data['kode_produk'] ?>">Buy </a></button>
          </div>
        </div>

      <?php } ?>
        
  </div>
</div>

<script type="text/javascript">
  
    $("#pay-button").click(function (event) {
      var gross =  $(this).data('amount');
      var nama = $(this).data('nama');
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=base_url()?>/snap/token',
      cache: false,

      data: {
        gross: gross,
        nama: nama
      },

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
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
