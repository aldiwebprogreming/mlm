<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Tambah member</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>



<div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <!-- <h2>About eBusiness</h2> -->
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-4 col-sm-4 col-xs-12">

          <div class="card" style=";">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Data member</li>
            
          </ul>
        </div>

          <div class="card" style=";">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
        </div>
          
        </div>
        <!-- single-well end-->
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
             
              <div class="card1" style="border:">
              <form method="post" action="<?= base_url('bisnis/tambah_member') ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama">
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</sm <div class="form-group">all>'); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username"  placeholder="Masukkan username">
                 <?= form_error('username', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No Telp</label>
                  <input type="number" class="form-control" name="no_telp" placeholder="Masukan nomor telp">

                  <?= form_error('no_telp', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                  </div>
               
                <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan password">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi password">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                  </div>
                </div>
              </div>

                <!-- <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Menyetujui persyaratan ini.</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
    </div>
    </div>
    </div>
