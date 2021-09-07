
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Set Paket Voucher</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Voucher</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Set Paket Voucher</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <form method="post" action="" id="paket">

                     
                    <div class="form-group">
                      <label>Nama Paket</label>
                      <div class="input-group">
                       <select class="form-control" @change="jenis"  v-model="selected" name="jenis_paket" id="jenis_paket">
                        <option disabled="" value="">-- Pilih Paket Voucher -- </option>
                         <option >Paket Agen Silver</option>
                         <option >Paket Agen Gold</option>
                         <option >Paket Agen Platinum</option>
                         <option >Paket Stockist Silver</option>
                         <option >Paket Stockist Gold</option>
                         <option >Paket Stockist Platinum</option>
                       </select>
                      
                      </div>
                    
                    </div>


                    <div class="form-group">
                      <label>Jenis Voucher</label>
                      <div class="input-group">
                        <input type="text" name="voucher" class="form-control" v-model="voucher" required="" readonly="">
                      </div>
                    
                    </div>


                      <div class="form-group">
                      <label>Jumlah Voucher</label>
                      <div class="input-group">
                        <input type="number" name="jml_voucher" class="form-control" required="">
                        
                      </div>
                    
                    </div>


                    <div class="form-group">
                      <label>Tahun Ke-1</label>
                      <div class="input-group">
                        <input type="number" name="tahun1" class="form-control" required="">
                      </div>
                    
                    </div>

                   <div class="form-group">
                      <label>Tahun Ke-2</label>
                      <div class="input-group">
                        <input type="number" name="tahun2" class="form-control" required="">
                      </div>
                    
                    </div>


                   <div class="form-group">
                      <label>Tahun Ke-3</label>
                      <div class="input-group">
                        <input type="number" name="tahun3" class="form-control" required="">
                      </div>
                    
                    </div>


                   <div class="form-group">
                      <label>Tahun Ke-4</label>
                      <div class="input-group">
                        <input type="number" name="tahun4" class="form-control" required="">
                      </div>
                    
                    </div>


                   <div class="form-group">
                      <label>Tahun Ke-5</label>
                      <div class="input-group">
                        <input type="number" name="tahun5" class="form-control" required="">
                      </div>
                    
                    </div>

                    
                    
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

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<script>
  var app = new Vue({
  el: '#paket',
  data: {
    message: 'aldi',
    selected:  '',
    voucher : '',
  

  },

methods : {

      jenis : function(){
       if (this.selected == 'Paket Agen Silver') {
        this.voucher = "Silver";
       }else if (this.selected == 'Paket Agen Gold') {
         this.voucher = "Gold";
       }else if (this.selected == 'Paket Agen Platinum') {
         this.voucher = "Platinum";
       }
       else if (this.selected == 'Paket Stockist Platinum') {
         this.voucher = "Platinum";
       }else if (this.selected == 'Paket Stockist Gold') {
         this.voucher = "Gold";
       }
       else if (this.selected == 'Paket Stockist Silver') {
         this.voucher = "Silver";
       }


      }
   
  }
})
</script>