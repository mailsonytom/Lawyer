<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
  <title>Lawyer management portal</title>
  <link href="assets/css/carousel.css" rel="stylesheet">
  <script src="assets/js/slim.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/holder.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="./index.php"><b>FYLAW</b></a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin/login.php"><button class="btn btn-outline-primary">Admin Portal</button> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lawyer/login.php"><button class="btn btn-outline-primary">Lawyer Portal</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user/index.php"><button class="btn btn-outline-primary">Client portal</button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="assets/images/slide1.jpg" alt="First slide">
          <div class="container-fluid">
            <div class="carousel-caption  ">
              <h1>Find the perfect lawyer for you</h1>
              <p>You don't have to wait in queues to find what works and what doesn't. Find the perfect lawyer for you online !! </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="assets/images/slide2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Easy interactions, for you and your lawyer</h1>
              <p>Everything made easy using personalised portal for you to interact with your lawyer !! </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="assets/images/slide3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Find who's best among the crowd</h1>
              <p>Find the best suiting lawyer for your need. The cases differ, and so does the expertise of people who work !! </p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <!-- Marketing messaging and featurettes
      ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-md-12 feature-heading text-center my-4 text-dark">
          <h2>What we offer for our cleints</h2>
          <p>We offer the best in the world features for our clients, no matter what !! </p>
        </div>
        <div class="col-md-4">
          <div class="card feature-card">
            <div class="col-md-4 offset-4 mt-5">
              <img src="./assets/images/register.png" class="card-img-top img-fluid">
            </div>
            <div class="card-body">
              <h5 class="card-title">Find the best !!</h5>
              <p class="card-text">Sign up for the portal to find the best lawyers suited for your needs. No need for long queues now. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card feature-card">
            <div class="col-md-4 offset-4 mt-5">
              <img src="./assets/images/update.png" class="card-img-top img-fluid">
            </div>
            <div class="card-body">
              <h5 class="card-title">Keep updated</h5>
              <p class="card-text">Don't wait for long calls from your lawyer. Get live updates about your cases from the office itself.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card feature-card">
            <div class="col-md-4 offset-4 mt-5">
              <img src="./assets/images/comment.png" class="card-img-top img-fluid">
            </div>
            <div class="card-body">
              <h5 class="card-title">Talk to your lawyer</h5>
              <p class="card-text">Talk to your lawyer about the case you gave them. Don't ever lie to lawyers and doctors ;)</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid feature-1 py-5 mt-5">
      <div class="container mt-5 ">
        <div class="row mt-5 text-light">
          <div class="col-md-6">
            <h2>Real updates on your case !! </h2>
            <br>
            <p>The lawyer will update all the details of your case lively. So it is easy to get updated on
              your cases. History of your cases will be stored safely. You can access case history anytime</p>
            <p>You'll never miss anything important regarding your case anymore. This is the best opportunity to sieze it. </p>
          </div>
          <div class="col-md-6">
            <img class="featurette-image img-fluid mx-auto" src="assets/images/563.png" alt="Generic placeholder image">
          </div>
        </div>
      </div>
    </div>



    </div>
  <?php include 'footer.php'; ?>
</body>

</html>