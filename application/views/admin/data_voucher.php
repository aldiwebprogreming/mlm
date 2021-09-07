
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Voucher</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
             <!--  <div class="breadcrumb-item"><a href="#">Tambah Admin</a></div> -->
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data Voucher</h4>

              </div>

              <div class="card-body">
                <a href="<?= base_url('dashboard/tambah-voucher') ?>" class="btn btn-primary mb-4">Tambah Voucher</a>

                <!-- Button trigger modal -->


                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name voucher</th>
                      <th scope="col">Bonus Sponsor</th>
                      <!-- <th scope="col">Bonus Cashback</th> -->
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                    foreach ($voucher as $data) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><?= $data['name'] ?></td>
                      <td><?= $data['bonus_sponsor'] ?>%</td>
                     <!--  <td><?= $data['bonus_cashback'] ?>%</td> -->
                     
                      
                      <td>
                         <a href="<?= base_url('admin/hapus_voucher') ?>?id=<?= $data['id'] ?>" class="btn btn-icon btn-danger" id="modal-1"><i class="fas fa-times"></i></a>
                      </td>
                    </tr>

                  <?php } ?>
                    
                  </tbody>
                </table>

             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
     