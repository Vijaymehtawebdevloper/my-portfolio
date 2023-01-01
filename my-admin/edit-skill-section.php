<?php
    include "header.php";
    $db = new database();
    $skillid = $_GET['id'];
    $db->select('myskills', '*', null, "skillID = '{$skillid}'");
    $result = $db->getResult();
    if(count($result) != 0){
        foreach($result as $row){

        }
    }
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
                <li class="breadcrumb-item">Dhome</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- jquery validation -->
            <div class="card  card-primary skill-sesction">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit-skill" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="title">Main Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Main-Title" value = "<?php echo $row['title']?>">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub-Title</label>
                                <textarea type="text" rows="4" cols="40" name="subtitle" class="form-control" id="subtitle" placeholder="Sub-Title" value = ""><?php echo $row['subtitle']?></textarea>
                            </div>
                        </div>
                        <!-- col-left -->
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                                <label for="skillName">Skill Name</label>
                                <input type="text" name="skillName" class="form-control" id="skillName" placeholder="Skills" value = "<?php echo $row['skillName']?>" >
                            </div>
                            <div class="form-group">
                                <label for="skillPercentage">Skill Percentage</label>
                                <input type="number" name="skillPercentage" class="form-control" id="skillPercentage" placeholder="Percentage" value = "<?php echo $row['skillPercentage']?>">
                            </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" data-id = "<?php echo $row['skillID']?>" id = "edit" class="btn btn-danger">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-wrapper -->


  <?php include "footer.php";