<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Jaringan</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
    Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

.heading-container {
  text-align: center;
}

.heading {
  font-weight: 600;
}

.credit {
  margin: 10px 0px;
  color: #888888;
  font-size: 25px;
  transition: all 0.5s;
}

.credit a {
  color: inherit;
}





.main-container {
  padding: 30px;
}

.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  margin: 10px;
  padding: 10px;
  display: grid;

  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.5s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}



@media (max-width: 1600px) {
  .card-container {
    justify-content: center;
  }
}

</style>

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


    <div class="col-sm-8">
   <?php foreach ($jaringan as $data) { ?>
   <div id="accordion">

 
  
  <div class="card" style="">
    <div class="card-header" id="heading<?= $data['name'] ?>">
      <h5 class="mb-0">
        <button class="btn btn-success btn-lg btn-block collapsed" data-toggle="collapse" data-target="#collapse<?= $data['name'] ?>" aria-expanded="false" aria-controls="collapseTwo">
         <?= $data['username'] ?>
        </button>
      </h5>
    </div>
   
    <div id="collapse<?= $data['name'] ?>" class="collapse" aria-labelledby="heading<?= $data['name'] ?>" data-parent="#accordion">
      <div class="card-body">
        <p class="mt-3">
              
              <?php 

                  $lavel = $this->db->get_where('tbl_register',['kode_rule' => $data['kode_user']])->result_array();

                  foreach ($lavel as $data2) {
                      
                      echo "<center> <b>".$data2['username']."<br></b></center>";
                  }

               ?>
           
        </p>
      </div>
    </div>

  </div>

   <?php } ?>


     <!--  <div class="table">
        <table class="table table-striped">
          <thead>
            <tr>
            
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              
            </tr>
          </thead>
          <tbody>
            <?php foreach ($jaringan as $data) {?>
            <tr>
             
              <td><?= $data['username'] ?></td>
              <td><?= $data['email'] ?></td>
              
            </tr>
          <?php } ?>
          </tbody>
        </table> -->
      </div>

    </div>

    

    

  </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>



