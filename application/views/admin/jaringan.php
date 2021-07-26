
      <!-- Main Content -->
 

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Jaringan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Tambah Admin</a></div>
             
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Data Jaringan</h4>
              </div>
              <div class="card-body">

            <div id="accordion">

                    <?php foreach ($jaringan as $data) {?>
                     
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                          <h4><?= $data['name'] ?> <img alt="image" class="mr-3 rounded-circle" width="50" src="<?= base_url() ?>/assets_admin/img/avatar/avatar-4.png"> <?php if ($data['lider'] == null) {
                          }else{ ?>
                            <i class="fas fa-star"> </i>
                        <?php } ?></h4>
                          
                        </div>
                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                          <p class="mb-0">
                            <?php 
                              $level1 = $this->db->get_where('tbl_register',['kode_rule' => $data['kode_user']])->result_array();
                              foreach ($level1 as $data2) {
                                echo $data2['name'] ?> <img alt="image" class="mr-3 rounded-circle" width="30" src="<?= base_url() ?>/assets_admin/img/avatar/avatar-5.png">
                              <?php
                                }
                             ?>
                          </p>
                        </div>
                      </div>
                      
                      <?php } ?>

                

             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div>
        </section>
      </div>
     