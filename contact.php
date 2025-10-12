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

  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/creativetim.min.css" type="text/css">

  <!-- Additional Custom Styles -->
  <style>
    .section-shaped .shape-style-1.shape-primary {
      background: linear-gradient(150deg, #28a745 15%, #218838 70%, #1e7e34 94%);
    }
    .bg-gray-100 {
      background-color: #f8f9fa;
    }
    .text-gray-900 {
      color: #212529;
    }
    .text-gray-600 {
      color: #6c757d;
    }
    .bg-indigo-500 {
      background-color: #6610f2;
    }
    .bg-indigo-500:hover {
      background-color: #5a0fd8;
    }
    .modal-content {
      border-radius: 10px;
    }
    .modal-header {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .modal-footer {
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
    }
  </style>
</head>

<body class="bg-white" id="top">
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
              <span class="text-success nav-link-inner--text"><i class="text-success fas fa-address-card"></i> Contact</span>
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

  <!-- Contact Form Section -->
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>

    <div class="text-gray-100">
      <form action="contact-script.php" method="post" onsubmit="return validateForm()">
        <div class="max-w-screen-xl px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
          <div class="flex flex-col justify-between">
            <div class="mt-2">
              <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Let's talk about everything!</h2>
            </div>
            <div class="mt-2">
              <span class="uppercase text-sm text-gray-600 font-bold">Full Name</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" id="user_name" name="user_name" placeholder="Enter your Full Name" required>
            </div>
            <div class="mt-2">
              <span class="uppercase text-sm text-gray-600 font-bold">Mobile Number</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="tel" id="user_mobile" name="user_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number (Ex. 76435654XX)" placeholder="Enter your Mobile Number" required>
            </div>
            <div class="mt-2">
              <span class="uppercase text-sm text-gray-600 font-bold">Email Id</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="email" id="user_email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Id (Ex. abc@xyz.com)" placeholder="Enter your Email Id" required>
            </div>
          </div>
          <div class="flex flex-col justify-between">
            <div class="mt-2">
              <span class="uppercase text-sm text-gray-600 font-bold">Address</span>
              <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" id="user_address" name="user_address" title="Enter your City Name and Pincode" placeholder="Enter your City/Pincode" required>
            </div>
            <div class="mt-2">
              <span class="uppercase text-sm text-gray-600 font-bold">Message</span>
              <textarea class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-7 rounded-lg focus:outline-none focus:shadow-outline" rows="8" id="user_message" name="user_message" title="Enter your Issue in Detail" placeholder="Enter your Issue" required autofocus></textarea>
            </div>
            <div class="mt-2">
              <button class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" name="submit" value="Submit">
                Send Message
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="mysuccessModal" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #1A4E85;color: white;">
            <h4 class="modal-title">Message</h4>
            <button type="button" class="close" onclick="pagesuccessRedirect()">&times;</button>
          </div>
          <div class="modal-body">
            <h3>Thank you for contacting us.</h3>
            <h6>You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.</h6>
          </div>
          <div class="modal-footer" style="background-color: #1A4E85;color: white;">
            <button type="button" class="btn btn-danger" onclick="pagesuccessRedirect()">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Unsuccess Modal -->
    <div class="modal fade" id="myunsuccessModal" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #1A4E85;color: white;">
            <h4 class="modal-title">Message</h4>
            <button type="button" class="close" onclick="pageunsuccessRedirect()">&times;</button>
          </div>
          <div class="modal-body">
            Error in sending message!!! Please try again.
          </div>
          <div class="modal-footer" style="background-color: #1A4E85;color: white;">
            <button type="button" class="btn btn-danger" onclick="pageunsuccessRedirect()">Close</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php require("footer.php"); ?>

  <!-- Bootstrap JS and Dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Form Validation Script -->
  <script>
    function validateForm() {
      const name = document.getElementById('user_name').value;
      const mobile = document.getElementById('user_mobile').value;
      const email = document.getElementById('user_email').value;
      const address = document.getElementById('user_address').value;
      const message = document.getElementById('user_message').value;

      if (!name || !mobile || !email || !address || !message) {
        alert('Please fill all the fields.');
        return false;
      }
      return true;
    }

    function pagesuccessRedirect() {
      window.location.href = 'index.php';
    }

    function pageunsuccessRedirect() {
      window.location.href = 'contact.php';
    }
  </script>
</body>
</html>