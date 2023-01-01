<?php
    include "header.php";
    $autoID = $_GET['id'];
    // echo $id;
    $db = new database;
    $db->select('banner','*',null,"autoID = '{$autoID}'",null,null);
    $result = $db->getResult();
    if(count($result) > 0){
      foreach( $result as $row){
         $title = $row['title'];
         $subTitle = $row['subTitle'];
         $logo = $row['logo'];
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
                <li class="breadcrumb-item ">Dhome</li>
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
            <div class="card  card-primary" id = "form-result">
              <!-- <div class="card-header  bg-danger">
                <h3 class="card-title">Quick Example </h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit" method = "POST">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="main-title">Main Title</label>
                                <input type="text" name="main-title" class="form-control" id="main-title" placeholder="Main-Title" value="<?php echo $title?>">
                            </div>
                            <div class="form-group">
                                <label for="sub-title">Sub-Title</label>
                                <input type="text" name="Sub-Title" class="form-control" id="Sub-Title" placeholder="Sub-Title" value="<?php echo $subTitle?>">
                            </div>
                        </div>
                        <!-- col-left -->
                        <div class="col-md-6 col-sm-12">
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
                  <button type="submit" data = "<?php echo $autoID;?>" class="btn btn-danger" id = "Edit">Submit</button>
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