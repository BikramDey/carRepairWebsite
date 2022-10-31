<?php include 'admin/connection.php'; ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap5 Car Project</title>


  <!-- Bootstrap links start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap links end -->
  <!-- Owl Carousel links start -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Owl Carousel links end -->

  <!-- Google Captcha link  -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <!-- Navbar Start-->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F03433;">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="#" style="font-weight: 900;">
        <img src="img/car-logo4.png" width="20px" alt="" srcset=""> REPCAR
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #FFFFFF;" href="#about">ABOUT US</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: #FFFFFF;" href="#service" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SERVICES
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#repair">REPAIRING</a></li>
              <li><a class="dropdown-item" href="#wash">CAR WASHING</a></li>
              <li><a class="dropdown-item" href="#design">DESIGNING</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #FFFFFF;" href="#rent">CARS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #FFFFFF;" href="#review">TEAM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #FFFFFF;" href="#contact">CONTACT US</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End-->

  <!-- Banner start -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php

      $sqls1 = "SELECT * FROM banner ORDER BY bid DESC";
      $count = 0;
      $preview = "";
      $result1 = $con->query($sqls1);

      while ($rows1 = $result1->fetch_assoc()) {
        $count++;
        if ($count == 1) {
          $preview = "active";
        } else {
          $preview = "";
        }


      ?>

        <div class="carousel-item <?php echo $preview; ?>">
          <img src="admin/photos/<?php echo $rows1['bimage']; ?>" class="img-fluid d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $rows1['title']; ?></h5>
            <p><?php echo $rows1['detail']; ?></p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Banner end -->


  <div class="container-fluid">

    <!-- About Us start -->
    <div class="row justify-content-evenly mt-4 mb-4" id="about">
      <div class="col-10">
        <h6 class="display-6 text-center mb-5">ABOUT US</h6>
        <?php

        $sqls2 = "SELECT * FROM about WHERE aid=1";
        $result2 = $con->query($sqls2);
        $rows2 = $result2->fetch_assoc();
        ?>

        <div class="row justify-content-evenly mb-5">
          <div class="col-md-5">
            <img src="admin/photos/<?php echo $rows2['aimage']; ?>" class="img-responsive d-block mx-auto" width="300px" alt="" srcset="">
          </div>
          <div class="col-md-5 mt-3">
            <p><?php echo $rows2['explanation']; ?></p> <br>
            <button type="button" class="btn btn-danger">Read More</button>
          </div>
        </div>
      </div>
    </div>
    <!-- About Us end -->


    <!-- Services start -->
    <div class="row justify-content-evenly mt-4 mb-4" id="service">
      <div class="col-11">
        <h6 class="display-6 text-center mt-1 mb-4">OUR SERVICES</h6>

        <div class="row row-cols-1 row-cols-md-3 justify-content-evenly mb-5">
          <div class="col-md-3 mb-4 mt-4 text-center p-4 text-white rounded shadow-sm" style="background-color: #212528;" id="repair">
            <h1 class="mt-2 mb-4"><i class="bi bi-gear-fill text-primary"></i></h1>
            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eum voluptatem
              reprehenderit. Nostrum culpa deleniti itaque. Nam laboriosam et esse repudiandae tempora, omnis.</p>
            <br>
            <button type="button" class="btn btn-danger">Read More</button>
          </div>
          <div class="col-md-3 mb-4 mt-4 text-center p-4 text-white rounded shadow-sm" style="background-color: #212528;" id="wash">
            <h1 class="mt-2 mb-4"><i class="bi bi-droplet-fill text-success"></i></h1>
            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eum voluptatem
              reprehenderit. Nostrum culpa deleniti itaque. Nam laboriosam et esse repudiandae tempora, omnis.</p>
            <br>
            <button type="button" class="btn btn-danger">Read More</button>
          </div>
          <div class="col-md-3 mb-4 mt-4 text-center p-4 text-white rounded shadow-sm" style="background-color: #212528;" id="design">
            <h1 class="mt-2 mb-4"><i class="bi bi-car-front-fill text-info"></i></h1>
            <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eum voluptatem
              reprehenderit. Nostrum culpa deleniti itaque. Nam laboriosam et esse repudiandae tempora, omnis.</p>
            <br>
            <button type="button" class="btn btn-danger">Read More</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Services end -->


    <!-- Rent Start  -->
    <div class="row justify-content-evenly mt-5 mb-5" id="rent">
      <div class="col-10">
        <h6 class="display-6 text-center mt-1 mb-5">RENT OUR BEST CARS</h1>

          <div class="row g-4 mb-4 owl-carousel owl-theme">

            <?php
            $sqls3 = "SELECT * FROM rent_car ORDER BY cid DESC";
            $result3 = $con->query($sqls3);
            while ($rows3 = $result3->fetch_assoc()) {

            ?>

              <div class="item">
                <div class="card h-100 shadow">
                  <img src="admin/photos/<?php echo $rows3['cimage']; ?>" class="card-img-top img-fluid" alt="...">
                  <div class="card-body shadow">
                    <h5 class="card-title text-center font-weight-bold font-7"><?php echo $rows3['name']; ?></h5>
                    <p class="card-text display-7">Capacity : <?php echo $rows3['capacity']; ?> passengers <br>
                      Mileage : <?php echo $rows3['mileage']; ?> <br>
                      Features : <?php echo $rows3['features']; ?> <br>
                      Category : <?php echo $rows3['category']; ?> <br></p>
                    <div class="row justify-content-between">
                      <div class="col-5">
                        <button type="button" class="btn btn-outline-danger display-8">Read More</button>
                      </div>
                      <div class="col-5">
                        <button type="button" class="btn btn-warning display-8">RENT NOW</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            }
            ?>

          </div>
      </div>
    </div>
    <!-- Rent End  -->


    <!-- Contact Start  -->
    <div class="row justify-content-evenly mt-4 mb-4" id="contact">
      <div class="col-10">
        <h1 class="display-6 text-center mt-2 mb-5">CONTACT US</h1>

        <div class="row justify-content-evenly  mt-4">
          <div class="col-md-5">
            <div class="col-12 mb-3">
              <h6 class="mb-4 font-weight-bold" style="font-size: 1.3rem; font-weight:600 ;">Contact Form</h6>
            </div>
            <form action="validate-captcha.php" enctype="multipart/form-data" method="post">
              <div class="mb-3">
                <label for="name1" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name1" name="name">
              </div>
              <div class="mb-3">
                <label for="phone1" class="form-label">Phone No.</label>
                <input type="text" class="form-control" id="phone1" name="phone">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
              </div>
              <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="6LezzhQiAAAAACQZTJw4DaEJO4vnZT60jfESbxas"></div>
              </div>

              <button type="submit" class="btn btn-danger" name="submit" value="Submit">Submit</button>
            </form>
          </div>
          <div class="col-md-5 mt-sm-5 mt-md-0">
            <div class="col-12 mb-3">
              <h6 class="mb-2 font-weight-bold" style="font-size: 1.3rem; font-weight:600 ;">Address</h6>
            </div>
            <p>33/Ollabibitala, Makhla <br>
              Uttarpara, Hooghly, WB - 712245 <br>
              <i class="bi bi-telephone-fill"></i> : +91 3345 8901
            </p>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7363.119199986563!2d88.34015100000002!3d22.670203000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1660205275158!5m2!1sen!2sin" style="border:0; width: 100%; height: 20rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End  -->

    <!-- Review Start  -->
    <div class="row justify-content-evenly mt-5 mb-5" id="review">
      <div class="col-10">
        <h6 class="display-6 text-center mt-1 mb-5">OUR REVIEWS</h1>

          <div class="row g-4 mb-4 owl-carousel owl-theme">
            <?php

            $sqls4 = "SELECT * FROM review ORDER BY rid DESC";
            $result4 = $con->query($sqls4);

            while ($rows4 = $result4->fetch_assoc()) {

            ?>

              <div class="item">
                <div class="card h-100 shadow">
                  <img src="admin/photos/<?php echo $rows4['rimage']; ?>" class="card-img-top rounded-circle" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold font-7"><?php echo $rows4['name']; ?></h5>
                    <h6 class="card-title text-left font-weight-bold display-9"><?php echo $rows4['job']; ?></h6>
                    <p class="card-text display-7 fst-italic"><span class="quote-10">"</span> <?php echo $rows4['comment']; ?><span class="quote-10">"</span></p>
                    <div class="text-center quote-10 text-warning"><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star-fill me-1"></i><i class="bi bi-star"></i>
                    </div>
                  </div>
                </div>
              </div>
              
            <?php
              }
            ?>
          </div>
      </div>
    </div>
    <!-- Review End  -->

    <!-- FAQ start  -->
    <div class="row justify-content-evenly mt-4 mb-4" id="faq">
      <div class="col-10">
        <h1 class="display-6 text-center mt-2 mb-5">FAQ</h1>

        <div class="accordion accordion-flush border" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Accordion Item #1
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the first item's accordion body.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Accordion Item #2
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being
                filled with some actual content.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Accordion Item #3
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                happening here in terms of content, but just filling up the space to make it look, at least at first
                glance, a bit more representative of how this would look in a real-world application.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FAQ end  -->

    <!-- FOOTER start  -->
    <div class="row justify-content-evenly bg-black text-white mt-5 pt-3 pb-3">
      <div class="col-md-3 m-4">
        <h5 class="display-6 mt-2 mb-4 font-weight-bold">FAQ</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nemo cumque facere. Molestiae quasi
          vitae consectetur provident sunt. Autem dolores ex omnis nesciunt molestiae explicabo.</p>
      </div>
      <div class="col-md-3 m-4">
        <h5 class="display-6 mt-2 mb-4 font-weight-bold">Important Links</h5>
        <a href="" class="link-light text-decoration-none mb-5">Home</a><br>
        <a href="" class="link-light text-decoration-none mb-5">About Us</a><br>
        <a href="" class="link-light text-decoration-none mb-5">Our Services</a><br>
        <a href="" class="link-light text-decoration-none mb-5">Contact Us</a><br>
        <a href="" class="link-light text-decoration-none mb-5">Our Clients</a><br>
      </div>
      <div class="col-md-3 m-4">
        <h5 class="display-6 mt-2 mb-4 font-weight-bold">Contact Us</h5>
        <p>33/Ollabibitala, Makhla <br>
          Uttarpara, Hooghly, WB - 712245 <br>
          <i class="bi bi-telephone-fill"></i> : +91 3345 8901
        </p>
      </div>
    </div>
    <!-- FOOTER end  -->


    <!-- CopyRight start  -->
    <div class="row bg-secondary text-white pt-3 text-center">
      <div class="col-12">
        <p>CopyRight by 2001 - 2022 by BikramDey. All Rights Reserved.</p>
      </div>
    </div>
    <!-- CopyRight start  -->


  </div>
  <!-- Bootstrap links start -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $('#rent .owl-carousel').owlCarousel({
      loop: true,
      margin: 25,
      nav: false,
      dots: true,
      autoplay: true,
      stagePadding: 20,
      autoplayTimeout: 3000, //2000ms = 2s;
      // autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })

    $('#review .owl-carousel').owlCarousel({
      loop: true,
      margin: 40,
      nav: false,
      dots: true,
      autoplay: true,
      stagePadding: 20,
      autoplayTimeout: 3000, //2000ms = 2s;
      // autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })
  </script>
</body>

</html>