
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data set paket voucher</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <!--  <div class="breadcrumb-item"><a href="#">Tambah Member</a></div> -->
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data set paket voucher</h4>
              </div>
              <div class="card-body">

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama paket</th>
                      <th scope="col">Voucher</th>
                      <th scope="col">Jml voucher</th>
                      <th scope="col">Tahun 1</th>
                      <th scope="col">Tahun 2</th>
                      <th scope="col">Tahun 3</th>
                      <th scope="col">Tahun 4</th>
                      <th scope="col">Tahun 5</th>
                      <th scope="col">Opsi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach ($data_set as $data) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['nama_paket'] ?></td>
                      <td><?= $data['voucher'] ?></td>
                      <td><?= $data['jml_voucher'] ?></td>
                      <td><?= $data['tahun_1'] ?></td>
                      <td><?= $data['tahun_2'] ?></td>
                      <td><?= $data['tahun_3'] ?></td>
                      <td><?= $data['tahun_4'] ?></td>
                      <td><?= $data['tahun_5'] ?></td>
                      
                      <td id="app">
                      <!--   <p>{{id}}</p> -->

                         <a href="logout.php" @click.prevent="hapus(<?= $data['id'] ?>)"  class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                         <!-- <a href="" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a> -->
                      </td>
                    </tr>

                  <?php } ?>
                    
                  </tbody>
                </table>

                

                <div id="tes"></div>

             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      var app = new Vue({
        el: '#app',
        data: {
          message: 'Hello Vue!',
          id: '1'
        },

        methods : {
          hapus : function(id2){
            this.id = id2;
           swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  
                $("#tes").load("<?= base_url('admin/hapus_setVocuher?id=') ?>"+id2);
                 window.location.href = 'http://localhost/mlm_ebunga/admin/data_setvoucher';
              } else {
                // swal("Your imaginary file is safe!");
              }
            });

          }
        }
      })
    </script>
     