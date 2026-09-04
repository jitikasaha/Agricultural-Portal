<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/logo.png" />
  <title>Agriculture Portal</title>

  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/creativetim.min.css" type="text/css">
</head>

<body class="bg-white" id="top" onload="myFunction()">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-default navbar-light position-sticky top-0 shadow py-0">
    <div class="container">
      <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
        <li class="nav-item dropdown">
          <a href="index.php" class="navbar-brand mr-lg-5 text-white">
            <img src="assets/img/nav.png" alt="Logo">
          </a>
        </li>
      </ul>

      <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbar_global"
        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>
      <div class="navbar-collapse collapse bg-default" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-10 collapse-brand">
              <a href="index.html">
                <img src="assets/img/nav.png" alt="Logo">
              </a>
            </div>
            <div class="col-2 collapse-close bg-danger">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global"
                aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <ul class="navbar-nav align-items-lg-center ml-auto">
          <li class="nav-item">
            <a href="contact.php" class="nav-link">
              <span class="text-white nav-link-inner--text"><i class="text-white fas fa-address-card"></i> Contact</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-white nav-link-inner--text"><i class="text-white fas fa-user-plus"></i> Sign Up</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="farmer/fregister.php">Farmer</a>
                <a class="dropdown-item" href="customer/cregister.php">Customer</a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-white nav-link-inner--text"><i class="text-white fas fa-sign-in-alt"></i> Login</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="farmer/flogin.php">Farmer</a>
                <a class="dropdown-item" href="customer/clogin.php">Customer</a>
                <a class="dropdown-item" href="admin/alogin.php">Admin</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Hero Section -->
  <div class="wrapper">
    <header class="jumbotron bg-gradient-warning">
      <div class="container">
        <div class="row row-header">
          <div class="col-12 col-sm-6">
            <h1 class="text-white">Agriculture Portal</h1>
            <p class="text-white">A True Farmer's Friend.</p>
            <div class="cg">
              <div class="card card-body bg-gradient-success">
                <blockquote cite="blockquote">
                  <h6 class="mb-0 text-dark">
                    <em><b id="quote">“Farming looks mighty easy when your plow is a pencil, and you're a thousand miles from the corn field.”</b></em>
                  </h6>
                  <br />
                  <footer class="blockquote-footer vg text-dark">
                    <span id="author">DWIGHT D. EISENHOWER</span>
                    <button id="sendButton" class="btn btn-sm btn-outline-secondary pull-right mx-auto mr-auto bg-gradient-danger" onclick="myFunction()">
                      <i class="fa fa-refresh text-white"></i>
                    </button>
                  </footer>
                </blockquote>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-3 offset-sm-2 align-self-center">
            <img src="assets/img/plant-bulb.png" class="img-fluid" alt="Plant Bulb">
          </div>
        </div>
      </div>
    </header>

    <!-- Features Section -->
    <div class="section features-6 text-dark bg-white" id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-primary badge-pill mb-3">Insight</span>
            <h3 class="display-3">Features</h3>
          </div>
        </div>
        <br>
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="info info-horizontal info-hover-success">
              <div class="description pl-4">
                <h3 class="title">Farmers</h3>
                <p class="">Farmers can get recommendations for crops and fertilizers, predict the weather, and get news related to agriculture. Farmers can directly sell crops to customers.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-10 mx-md-auto d-none d-md-block">
            <img class="ml-lg-5 pull-right" src="assets/img/agri.png" width="100%">
          </div>
        </div>

        <div class="row align-items-center">
          <div class="col-lg-6 col-10 mx-md-auto d-none d-md-block">
            <img class="ml-lg-5" src="assets/img/customers.png" width="80%">
          </div>
          <div class="col-lg-6">
            <div class="info info-horizontal info-hover-warning mt-5">
              <div class="description pl-4">
                <h3 class="title">Customers</h3>
                <p class="">Customers can buy crops directly from farmers without the involvement of middlemen.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Technology Section -->
    <div class="section features-2 text-dark bg-white" id="features">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 col-md-8 mr-auto text-left">
            <div class="pr-md-5">
              <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mb-5">
                <i class="ni ni-favourite-28"></i>
              </div>
              <h3 class="display-3 text-justify">Features</h3>
              <p>The time is now for the next step in farming. We bring you the future of farming along with great tools for assisting farmers.</p>
              <ul class="list-unstyled mt-5">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-primary mr-3"><i class="ni ni-settings-gear-65"></i></div>
                    </div>
                    <div>
                      <h6 class="mb-0">Highly Reliable and Accurate.</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-primary mr-3"><i class="ni ni-html5"></i></div>
                    </div>
                    <div>
                      <h6 class="mb-0">Faster & Responsive Website.</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-primary mr-3"><i class="ni ni-settings-gear-65"></i></div>
                    </div>
                    <div>
                      <h6 class="mb-0">Real-Time Weather Forecast.</h6>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-primary mr-3"><i class="ni ni-satisfied"></i></div>
                    </div>
                    <div>
                      <h6 class="mb-0">Integrated News Feature.</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-7 col-md-12 pl-md-0">
            <img class="img-fluid ml-lg-5" src="assets/img/features.png" width="100%">
          </div>
        </div>
      </div>
    </div>

    <!-- Technologies Used Section -->
    <div class="section features-6 text-dark bg-white" id="tech">
      <div class="container-fluid shado">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-primary badge-pill mb-3">Stack</span>
            <h3 class="display-3">Technologies Used</h3>
            <p class="">Our Development Stack</p>
          </div>
        </div>

        <div class="row text-lg-center align-self-center">
          <div class="col-md-4">
            <div class="info">
              <img class="img-fluid" src="assets/img/html.png" alt="HTML5">
              <h6 class="info-title text-uppercase text-primary">HTML5</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <img class="img-fluid" src="assets/img/css3.png" alt="CSS3">
              <h6 class="info-title text-uppercase text-primary">CSS3</h6>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <img class="img-fluid" src="assets/img/js.png" alt="JavaScript">
              <h6 class="info-title text-uppercase text-primary">JavaScript</h6>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/bootstrap.png" alt="Bootstrap4">
              <h6 class="info-title text-uppercase text-primary">Bootstrap4</h6>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/apache.png" alt="Apache">
              <h6 class="info-title text-uppercase text-primary">Apache</h6>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/mysql.png" alt="MySQL">
              <h6 class="info-title text-uppercase text-primary">MySQL</h6>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/jquery.png" alt="jQuery">
              <h6 class="info-title text-uppercase text-primary">jQuery</h6>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/openai2.png" alt="OpenAI">
              <h6 class="info-title text-uppercase text-primary">OpenAI</h6>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <div class="info">
              <img class="img-fluid" src="assets/img/php2.png" alt="PHP">
              <h6 class="info-title text-uppercase text-primary">PHP</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php require("footer.php"); ?>

    <!-- JavaScript for Quote Generation -->
    <script>
      const agriculturalQuotes = [
        { quote: "“Farming looks mighty easy when your plow is a pencil, and you're a thousand miles from the corn field.”", author: "DWIGHT D. EISENHOWER" },
        { quote: "“Agriculture is our wisest pursuit, because it will in the end contribute most to real wealth, good morals, and happiness.”", author: "THOMAS JEFFERSON" },
        { quote: "“The ultimate goal of farming is not the growing of crops, but the cultivation and perfection of human beings.”", author: "MASANOBU FUKUOKA" },
        { quote: "“Agriculture is the most healthful, most useful, and most noble employment of man.”", author: "GEORGE WASHINGTON" },
        { quote: "“To forget how to dig the earth and to tend the soil is to forget ourselves.”", author: "MAHATMA GANDHI" },
        { quote: "“If agriculture goes wrong, nothing else will have a chance to go right in the country.”", author: "M. S. SWAMINATHAN" },
        { quote: "“Food is the moral right of all who are born into this world.”", author: "NORMAN BORLAUG" },
        { quote: "“The discovery of agriculture was the first big step toward a civilized life.”", author: "ARTHUR KEITH" }
      ];

      let lastQuoteIndex = 0;
      function myFunction() {
        const chatbox = document.getElementById("quote");
        const authorN = document.getElementById("author");
        let nextIndex;
        do {
          nextIndex = Math.floor(Math.random() * agriculturalQuotes.length);
        } while (nextIndex === lastQuoteIndex && agriculturalQuotes.length > 1);
        
        lastQuoteIndex = nextIndex;
        const selected = agriculturalQuotes[nextIndex];
        chatbox.textContent = selected.quote;
        authorN.textContent = selected.author;
      }
    </script>
  </body>
</html>