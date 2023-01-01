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
                <li class="breadcrumb-item ">Dhome</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                  <h3 class=" card-title">card header</h3>
                  <a href="add-about-section.php" type="button " class="btn btn-danger" >Add-header</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">S.No</th>
                        <th>Title</th>
                        <th>Sub-title</th>
                        <th>Phone number</th>
                        <th style="width: 100px; overflow : hidden">email</th>
                        <th>Date of birrth</th>
                        <th>Education</th>
                        <th>Profile</th>
                        <td> Action </td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new database();
                        $db->select('about', '*', null, null, null, null);
                        $result = $db->getResult();
                        if(count($result) != 0){
                          $sNo = 0;
                          foreach ($result as $row){
                            $sNo = $sNo + 1;
                            ?>
                              <tr>
                                <td><?php echo $sNo ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['subtitle'] ?></td>
                                <td><?php echo $row['telNumber'] ?></td>
                                <td style="width: 100px; overflow : hidden"><?php echo $row['email'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['education'] ?></td>
                                <td><img style="width: 50px ; height: 50px"  src="../image/img/<?php echo $row['profile']?>" alt=""></td>
                                <td class="text-center py-0 align-middle">
                                  <div class="btn-group btn-group-sm">
                                    <a href="edit-about-section.php?id=<?php echo $row['aboutID']?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                  </div>
                                </td>
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

  <?php include "footer.php";