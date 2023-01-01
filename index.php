<?php
    include "my-admin/php-files/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/responsive-style.css">
    <link rel="stylesheet" href="my-admin/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body data-bs-spy = "scroll" data-ds-target = ".navbar" data-bs-offset = "75" id="body">
    <!-- NAVBAR SECTION -->
    <?php
        $db = new database();
        $db->select('banner','*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
        <header class="header_wrapper">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <span><img src="image/img/<?php echo $row['logo']?>" alt=""></span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls = "navbarNav" aria-expanded = "false" aria-label = "Togglenavigationn">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav menu-navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current = "page" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current = "page" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current = "page" href="#skill">Skill</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current = "page" href="#services">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current = "page" href="#portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current = "page" href="#contact">Contect</a>
                            </li>
                            <li class="nav-item mt-3 mt-lg-0">
                                <a class="main-btn" aria-current = "page" href="#contact">Hire Me</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <!-- header banner -->
    
    <section id="home" class="banner_wrapper">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 text-center order-1 order-lg-1 pe-lg-5 text-lg-start mb-4">
                    <h6><?php echo $row['title']?></h6>
                    <h2>I am Vijay Mehta <span class="maintitle" data-wait="3000" data-words='["Web Designer","Web Doveloper", "Graphic Designer"]'>Web Designer</span><br>
                        <?php echo $row['subTitle']?>
                    </h2>
                    <div class="mt-4">
                        <a href="" class="main-btn">Download CV</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->

    <?php 
        $db->select('about', '*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
    <section id="about" class="about_wrapper">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="image/img/<?php echo $row['profile']?>" class="img-fluid rounded-3" alt="about-us">
                </div>
                <div class="col-lg-7 ps-lg-5 text-center text-lg-start">
                    <div class="my-3 mb-lg-0">
                        <span class="subtitle"> My Details</span>
                        <h2><?php echo $row['title']?></h2>
                        <p><?php echo $row['subtitle']?></p>
                    </div>
                    <div class="">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-skill" role="tabpane1" aria-labelledby="pills-skill-tab">
                            <div class="single-progress">
                                    <h6>Name</h6>
                                    <span class="label"><?php echo $row['name']?></span>
                                </div>
                                <div class="single-progress">
                                    <h6>Education</h6>
                                    <span class="label"><?php echo $row['education']?></span>
                                </div>
                                <div class="single-progress">
                                    <h6>Date of birth</h6>
                                    <span class="label"><?php echo $row['dob']?></span>
                                </div>
                                <div class="single-progress">
                                    <h6>Phone Number</h6>
                                    <span class="label"><?php echo $row['telNumber']?></span>
                                </div>
                                <div class="single-progress">
                                    <h6>Email</h6>
                                    <span class="label"><?php echo $row['email']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- skills -->
    <?php 
        $db->select('myskills', '*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
    <section id="skill" class="skill_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="subtitle">My skills</span>
                    <h2><?php echo $row['title']?></h2>
                    <p><?php echo $row['subtitle']?></p>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
            <?php 
                $db->select('myskills', '*', null, null, null, null);
                $result = $db->getResult();
                if(count($result) != 0){
                    foreach($result as $row){
                        ?>
                        <div class="col-lg-6 ps-lg-5 text-center">
                            <div class="">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-skill" role="tabpane1" aria-labelledby="pills-skill-tab">
                                        <div class="single-progress">
                                            <h6><?php echo $row['skillName']?></h6>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo $row['skillPercentage']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="label"><?php echo $row['skillPercentage']?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                        <?php
                    }
                }
            ?>
                
            </div>
        </div>
    </section>
    <!-- SERVICES -->
    <?php 
        $db->select('service', '*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
    <section class="services_wrapper" id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <span class="subtitle">What can i do for you</span>
                    <h2><?php echo $row['title']?></h2>
                    <p><?php echo $row['subtitle']?></p>
                </div>
            </div>
            <div class="row">
            <?php 
                $db->select('service', '*', null, null, null, null);
                $result = $db->getResult();
                if(count($result) != 0){
                    foreach($result as $row){
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="<?php echo $row['fonticon']?>"></i>
                                    <h3><?php echo $row['serviceName']?></h3>
                                    <p><?php echo $row['serviceInfo']?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
                
            </div>
        </div>
    </section>

    <!-- portfolio -->
    <section id="portfolio" class="portfolio_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <span class="subtitle">My complete Project</span>
                    <h2>My Latest Project</h2>
                    <p>Ther are many variation of wesite layout design project<br class="d-none d-md-block">but the majority have suffered alteration</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url(image/2.jpg)"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 m-card">
                        <div class="card p-0">
                            <span style="background-image:url()"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <?php 
        $db->select('about', '*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
    <section id="contact" class="contact_wrapper">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 pe-lg-5 text-lg-start text-center">
                    <span class="subtitle"> My Complete Project</span>
                    <h2>Hire Me</h2>
                    <div class="row call-details mb-4">
                        <label for="" class="col-sm-3 col-lg-4">Call Us Directely</label>
                        <div class="col-sm-9 col-lg-8 mb-lg-2 mb-3 text-md-start">
                            <a href="javascript:void(0)"><?php echo $row['telNumber']?></a>
                        </div>
                        
                        <label for="" class="col-sm-3 col-lg-4">Contect Email</label>
                        <div class="col-sm-9 col-lg-8 mb-3 mb-lg-2 text-md-start">
                            <a href="mailto:vijaysinghmehta25@gmail.com"><?php echo $row['email']?></a>
                        </div>
                    </div>

                    <form id="user" method="POST">
                        
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Your Name..." autocomplete="off" id="name">
                        </div>
                        <div class="mb-4">
                            <input type="number" class="form-control" placeholder="Your Phone..." autocomplete="off" id="phonenumber">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" placeholder="Your Email..." autocomplete="off" id="email">
                        </div>
                        <div class="mb-4">
                            <textarea rows="4" cols="40"  class="form-control" placeholder="Write a Massage" id="massage"></textarea>
                        </div>
                        <button type="submit" class="main-btn">Submit</button>
                    </form>
                </div>
                <div class="col-lg-6 order-1 mb-4 order-lg-1 mb-lg-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40632.55435834254!2d79.42016512729634!3d29.382520393675133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a0a1bc28fd9d61%3A0x7cae7ba916987db3!2sNainital%2C%20Uttarakhand!5e1!3m2!1sen!2sin!4v1668324497808!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php
        $db = new database();
        $db->select('banner','*', null, null, null, null);
        $result = $db->getResult();
        if(count($result) != 0){
            foreach($result as $row){

            }
        }
    ?>
    <section id="contact" class="footer_wrapper mt-3 mt-md-0" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 text-center text-md-start">
                    <div class="footer-logo col-mb-3 mb-md-0">
                        <img src="image/img/<?php echo $row['logo']?>" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5 md-6">
                    <ul class="list-unstyled d-flex justify-content-center  social-icon mb-3 ">
                        <li>
                            <a href="#"> <i class="fa-brands fa-facebook"></i> </i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="copyright-text text-lg-start text-center mb-3 mb-lg-0">
                        <p class="mb-3">copyright o@ 2022 <a href="">VijayMehta</a>All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="script/jquery.min.js"></script>
    <script src="script/script.js"></script>
    <script src="script/bootstrap.js"></script>
</body>
</html>
