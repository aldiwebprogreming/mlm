
<div class="container" style="margin-top: 100px;">
  <div class="jumbotron jumbotron-fluid" style="background-color: #fff0a9">
  <div class="container">
    <h1 class="display-4">Login</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</div>



<div class="container">
  <div class="row">
    <div class="col-sm-6">

       <img src="https://blush.design/api/download?shareUri=TUbm_X_evyeig0GJ&c=Skin_0%7E7362a5-0.5%7E9f91ca-0.6%7E9f91ca&w=800&h=800&fm=png" alt="" style="height: 400px;">
    </div>



    <div class="col-sm-6">
        <div class="card3" style="color: orange;">
          Masukkan email dan password anda dengan benar.
        </div>
        <hr>
      <form method="post" action="<?= base_url('bisnis/login') ?>">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                </div>


                
                <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan password">
                  </div>
                   <?= form_error('password', '<small class="text-danger pl-3">', '</sm
                                  <div class="form-group">'); ?>
                </div>


                
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Member me.</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
    </div>

  </div>
</div>

</div>