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
            <div class="card  card-primary about-section">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id="about" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class=" col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="title">Main Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Main-Title">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub-Title</label>
                                <textarea rows="4" cols="40" type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Sub-Title"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your name">
                            </div>
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input type="text" name="education" class="form-control" id="education" placeholder="Education">
                            </div>
                        </div>
                        <!-- col-left -->
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="@example.com">
                            </div>
                            <div class="form-group">
                                <label for="telnumber">Phone number</label>
                                <input type="number" name="telnumber" class="form-control" id="telnumber" placeholder="Phone number">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="date-input">Date</label>
                                <input type="date" name="Sub-Title" class="form-control" id="date-input">
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="file-input">Select Image</label>
                              <input type="file" class="form-control" id="logo-img" />
                            </div>
                            <div class="preview-img d-none" style="width : 100px; height :100px">
                              <img src="" alt="preview-img" class="img-fluid">
                            </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Submit</button>
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