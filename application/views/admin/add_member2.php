
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>

          <div class="section-body">

            

           <!-- <form id="app" method="post" action="<?= base_url('admin/kirim') ?>">
             <section v-if="step == 1">
               <h3>Stap 1</h3>
               <input type="text"  v-model="message.nama" name="nama" class="form-control">
             </section>
             <section v-if="step == 2">
               <h3 >Stap 2</h3>
               <input type="number" v-model="message.hp" name="hp" class="form-control">
             </section>

             <section v-if="step == 3">
               <h3>Stap 3</h3>
               <input type="text" v-model="message.hp" name="hp" class="form-control">
                <input type="text" v-model="message.nama" name="nama" class="form-control">
               <textarea class="form-control" name="alamat"></textarea>
             </section>
              <br>
              <button 
              v-if="step != 1"
              @click.prevent="prevtStep" class="btn btn-primary">Prev stap</button>

              <button 
              v-if="step != totalStap"
              @click.prevent="nextStep" class="btn btn-primary">next</button>

             <input v-if="step == 3" type="submit" name="kirim" class="btn btn-danger" value="Sumbit">


           </form> -->
            
            <div class="card">
              <div class="card-header">
                <h4>Add Member</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-12 col-lg-12">

                  <div class="card-body">
                   
                    <form id="app" method="post" action="">
                      <section v-if = "step == 1">
                      <div class="form-group">
                      <label>Kode Vendor</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="" name="kd_vendor" readonly>
                      </div>
                    </div>

                      <div class="form-group">
                      <label>Kode Member</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="<?= $kode_user ?>" name="kd_user" readonly>
                      </div>
                    </div>
                      
                    <div class="form-group">
                      <label>Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <input type="text" v-model="name" class="form-control phone-number" value="" name="name" required="">
                      </div>
                      <small style="color: red;"><?php echo form_error('name'); ?></small>
                    </div>


                    <div class="form-group">
                      <label>Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-user-shield"></i>
                          </div>
                        </div>
                        <input type="text" v-model="username" class="form-control phone-number" value="" name="username">
                      </div>
                      <small style="color: red;"><?php echo form_error('username'); ?></small>
                    </div>

                     <div class="form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </div>
                        </div>
                        <input type="text" v-model="email" class="form-control phone-number" value="" name="email">
                      </div>
                      <small style="color: red;"><?php echo form_error('email'); ?></small>
                    </div>

                     <div class="form-group">
                      <label>No Telp</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" v-model="nohp" class="form-control phone-number" value="" name="no_telp">
                      </div>
                      <small style="color: red;"><?php echo form_error('no_telp'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" v-model="pass1" class="form-control phone-number" value="" name="pass1">
                      </div>
                      <small style="color: red;"><?php echo form_error('pass1'); ?></small>
                    </div>

                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" v-model="pass2" class="form-control phone-number" value="" name="pass2">
                      </div>
                      <small style="color: red;"><?php echo form_error('pass2'); ?></small>
                    </div>
                    
                    </section>
                    <section v-else>
                     <div class="form-group">
                      <label>Jenis Voucher</label>
                        <select class="form-control" @change="changeVoucher($event)" name="jenis_voucher" id="voucher">
                          <option>-- Pilih jenis voucher --</option>
                          <?php foreach ($voucher as $data) {?>
                             <option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
                           <?php } ?>
                        </select>
                      
                    </div>

                      <div id="vc">

                        

                      </div>
                    </section>

                      <button type="submit" @click.prevent="nextStep" class="btn btn-primary">Next</button>

                     <button v-if="step != 1 " @click.prevent="prevtStep" class="btn btn-primary">Prev Next</button>
                    
                    

                    <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">

                    </form>
                    
                  </div>

                  </div>
                </div>

              
             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    
  <script>
       $(document).ready(function(){
          $('#voucher').change(function(){
            var id = $(this).val();
             alert(id);
          });
        });

      </script>

      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
     <script>
        var app = new Vue({
          el: '#app',
          data: {
            errors :'',
            step : 1,
            totalStap : 3,
            name : '',
            username: '',
            email : '',
            nohp : '',
            pass1 : '',
            pass2 : '',

            val : ''
            // message: {
            //   nam : '',
            //   hp : '',
            //   pesan : '',

            // }
          },
          methods: {
            nextStep : function(){
              if (this.step == 1) {
                if (!this.name) {
                  this.errors="Nama masih kosong";
                  return false;
                }
                if (!this.username) {
                  this.errors="Username masih kosong";
                  return false;
                }
                if (!this.email) {
                  this.errors="email masih kosong";
                  return false;
                }

                if (!this.nohp) {
                  this.errors="No telp masih kosong";
                  return false;
                }

                if (!this.pass1) {
                  this.errors="Password masih kosong";
                  return false;
                }
                if (!this.pass2) {
                  this.errors="konfirmasi password masih kosong";
                  return false;
                }
              }
              this.step++;
            },
            prevtStep: function(){
              this.step--;
            },

            changeVoucher: function(){
              var a = event.target.value;
              var url2 = "<?= base_url('admin/get_produk?id=') ?>"+a;
              $("#vc").load(url2);
            }
          }
        })
     </script>

   