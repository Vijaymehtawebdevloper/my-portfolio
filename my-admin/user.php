<?php
    include "header.php";
    

?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dhome</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item ">User</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">S.no</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th style="width: 70px;">Email</th>
                        <th>Massage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new database;
                        $db->select('user','*',null, null, null, null);
                        $result = $db->getResult();
                        if(count($result) > 0){
                          $number = 0;
                          foreach($result as $row){
                            $number = $number + 1;
                            ?>
                            <tr>
                              <td><?php echo $number?></td>
                              <td><?php echo $row ['name']?></td>
                              <td><?php echo $row ['phoneNumber']?></td>
                              <td><?php echo $row ['email']?></td>
                              <td><?php echo $row ['massage']?></td>
                              
                            </tr>
                            <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header --><!-- Content Wrapper. Contains page content -->
    </div>
  <!-- /.content-wrapper -->


  <section class="content">
    
  </section>
  <?php include "footer.php";