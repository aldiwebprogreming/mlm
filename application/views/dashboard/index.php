<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Dashboard</h1>
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
  margin: 20px;
  padding: 20px;
  display: grid;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.5s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}

.card__exit {
  grid-row: 1/2;
  justify-self: end;
}

.card__icon {
  grid-row: 2/3;
  font-size: 30px;
}

.card__title {
  grid-row: 3/4;
  font-weight: 400;
  color: #ffffff;
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
}

.card-1 {
  background: radial-gradient(#1fe4f5, #3fbafe);
}

.card-2 {
  background: radial-gradient(#fbc1cc, #fa99b2);
}

.card-3 {
  background: radial-gradient(#76b2fe, #b69efe);
}

.card-4 {
  background: radial-gradient(#60efbc, #58d5c9);
}

.card-5 {
  background: radial-gradient(#f588d8, #c0a3e5);
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
            <li class="list-group-item"><i class="fas fa-user"></i> <b>Info anda</b> </li>
            <li class="list-group-item"><?= $this->session->name  ?></li>
            <li class="list-group-item"><?= $this->session->username  ?></li>
            <li class="list-group-item"><?= $this->session->email  ?></li>
            <li class="list-group-item"><a href="<?= base_url() ?>dashboard/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>

        </div>

        <div class="card" style="height: 130px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Invoices</b></li>
            <li class="list-group-item">
              
              <?php 
                if ($jml_invo == 0) {
                  echo '<b>Tidak ada invoice</b>';
                }else{ ?>
                 
                  <p style="font-weight: bold"><a href="<?= base_url() ?>ebunga/invoices"><?= $jml_invo ?> ( Pending )</a></p>
              
              <?php } ?>

            </li>
            
          </ul>

        </div>


        
    </div>

    <div class="col-sm-8">
    <div class="row">

    <div class="col-md-6">
     <div class="card" style="background: radial-gradient(#f588d8, #c0a6e5);">
      <div class="card-body">
        <i class="fas fa-street-view"  style="font-size: 70px; color: white;"></i>
        <span style="margin-left: 10px; font-size: 24px; color: white; font-weight: bold;">Jaringan</span>
      </div>
      </div>
    </div>
    <div class="col-md-6">
     <div class="card" style="background: radial-gradient(#76b2fe, #b69efe);">
      <div class="card-body">
       <i class="fas fa-wallet" style="font-size: 70px; color: white;"></i>
        <span style="margin-left: 10px; font-size: 25px; color: white; font-weight: bold;">E-cash</span>
      </div>
      </div>
    </div>
    <div class="col-md-6">
       <a href="<?= base_url('ebunga/produk') ?>">
      <div class="card" style="background: radial-gradient(#60efbc, #58d5c9);">
      <div class="card-body">
        <i class="fas fa-apple-alt" style="font-size: 70px; color: white;"></i>
          <span style="margin-left: 10px; font-size: 25px; color: white; font-weight: bold;">Produk</span>
      </div>
      </div>
    </a>
    </div>

    <div class="col-md-6">
       <a href="<?= base_url('ebunga/member') ?>">
        <div class="card" style="background: radial-gradient(#1fe4f5, #3fbafe);">
      <div class="card-body">
        <i class="fas fa-user" style="font-size: 60px; color: white;"></i>
        <span style="margin-left: 20px; font-size: 25px; color: white; font-weight: bold;">Daftar Member</span>
        <!-- This is some text within a card body. -->
      </div>

      </div>
        </a>
    </div>

  </div>
</div>

    

  </div>
</div>


