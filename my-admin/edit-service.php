<?php
    include "header.php";
    $serviceid = $_GET['id'];
    $db = new database();
    $db->select('service', '*', null, "serviceID = '{$serviceid}'");
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
              <h1 class="m-0">Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item ">Home</li>
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
            <div class="card  card-primary" id = "service-section">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit-service" method = "POST">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $row['title']?>">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub Title</label>
                                <textarea rows="4" cols="40" type="text" name="SubTitle" class="form-control" id="SubTitle" placeholder="Sub Title" value=""><?php echo $row['subtitle']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Service Name</label>
                                <textarea rows="4" cols="40" type="text" name="serviceName" class="form-control" id="serviceName" placeholder="Service Name" value=""><?php echo $row['serviceName']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fonticon">Font class</label>
                                <input type="text" name="fonticon" class="form-control" id="fonticon" placeholder="Font icon" value="<?php echo $row['fonticon']?>">
                            </div>
                        </div>
                        <!-- col-left -->
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="serviceInformation">Service Information</label>
                                <input type="text" name="serviceInformation" class="form-control" id="serviceInformation" placeholder="Service Information" value="<?php echo $row['serviceInfo']?>">
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="file-input">Select Image</label>
                              <input type="file" class="form-control" id="logo-img" />
                            </div>
                            <div class="preview-img d-none" style="width : 100px; height :100px">
                              <img src="" alt="preview-img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" data-id="<?php echo $row['serviceID']?>" class="btn btn-danger" id = "edit">Submit</button>
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
<script>
  // show image
  const fileInput = document.querySelector("#logo-img");
  const previewImg = document.querySelector(".preview-img img");
  const chooseImage = document.querySelector("#chose-img");

  const loadImage = () => {
      let file = fileInput.files[0]; //getting user selected file
      if(!file) return; //return if user hasn't selected file
      previewImg.src = URL.createObjectURL(file); //passing file url as preview img src
      // chooseImage.innerHTML = previewImg.src
      previewImg.addEventListener("load", () =>{
          document.querySelector(".preview-img").classList.remove("d-none");
      })
  }
fileInput.addEventListener("change", loadImage);
</script>
  <?php include "footer.php";