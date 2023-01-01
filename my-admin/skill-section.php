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
                  <a href="add-skill.php" type="button " class="btn btn-danger" >Add-header</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th >Skill Name</th>
                        <th >Skill Percentage</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $db = new database;
                        $db->select('myskills','*',null, null, null, null);
                        $result = $db->getResult();
                        if(count($result) > 0){
                          $number = 0;
                          foreach($result as $row){
                            $number = $number + 1;
                            ?>
                            <tr>
                              <td><?php echo $number?></td>
                              <td><?php echo $row ['title']?></td>
                              <td><?php echo $row ['subtitle']?></td>
                              <td><?php echo $row ['skillName']?></td>
                              <td><?php echo $row ['skillPercentage']?></td>
                              
                              <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="edit-skill-section.php?id=<?php echo $row['skillID'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                  <a href="javascript:void()" data-id = "<?php echo $row['skillID'] ?>" class="btn btn-danger" data-title="<?php echo $row['title'] ?>" id = "delete-banner"><i class="fas fa-trash"></i></a>
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


  <section class="content">
    
  </section>
  <?php include "footer.php";