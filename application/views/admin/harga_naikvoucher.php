<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-content">
     
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <!-- <div class="card-stats-title">Order Statistics -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div> -->
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Data Set Harga Voucher</h4>
                  </div>
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Set Harga Voucher</h4>
                  
                </div>



                <div class="card-body p-0">

                  <div class="container">
                   <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                               
                                <th>Harga Naik</th>
                                <th>Opsi</th>

                               
                                
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                
                                
                                <th>#</th>
                               
                                <th>Harga Naik</th>
                                <th>Opsi</th>
                               
                                
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $no = 1;
                           foreach ($set as $data) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>Rp.<?= $data['naik_harga'] ?></td>
                                <td>
                                  
                                 
                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalalert<?= $data['id'] ?>">
                                  Edit
                                </button>
                                </td>

                                
                               
                            </tr>

                            



                           <div class="modal fade" id="exampleModalalert<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              
                              <form method="post" action="">
                                <label><strong>Jenis voucher</strong></label>

                              <input type="hidden"  readonly="" name="id" class="form-control" value="<?= $data['id'] ?>">

                                <label><strong>Harga</strong></label>
                                <input type="number" required="" name="naik_harga" class="form-control" value="<?= $data['naik_harga'] ?>">

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


                          <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                  
                </div>
              </div>
            </div>


           
          </div>

      

      </div>

       








      <!-- Button trigger modal -->


<!-- Modal -->



   
               

      <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>