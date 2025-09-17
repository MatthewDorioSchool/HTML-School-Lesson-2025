<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="discription" content="Displays API gathered images of Dogs">
    <meta name="robots" content="noindex, nofollow">
    <title>The Dog Site</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
  </head>
<body>

<?php
require_once 'config.php';

$api_url = DOG_BASE_URL . '/images/search?limit=6'; 
$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-api-key: ' . DOG_API_KEY
]);

$response = curl_exec($ch);
curl_close($ch);

$dog_data = json_decode($response, true);

?>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<header>
  <div class="container-fluid">
      <img src="./Assets/Logo.png" alt="Logo" width="380" height="158">
  </div>
</header> 
<nav class="navbar" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Your first stop for daily dog pictures</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
      </div>
    </div>
  </div>
</nav>

<section>
<div class="row row-cols-1 row-cols-md-3 g-4 mx-4">
  <?php foreach ($dog_data as $dog): ?>
    <div class="col">
      <div class="card">
        <img src="<?= $dog['url']; ?>" class="card-img-top" alt="Dog Image">
      </div>
    </div>
  <?php endforeach; ?>
</div>

</section>
<footer class="bg-body-tertiary text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <form action="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-auto mb-4 mb-md-0">
          <p class="pt-2">
            <strong>Sign up for our newsletter</strong>
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-5 col-12 mb-4 mb-md-0">
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="form5Example22" class="form-control" />
            <label class="form-label" for="form5Example22">Email address</label>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-auto mb-4 mb-md-0">
          <!-- Submit button -->
          <button data-mdb-ripple-init type="button" class="btn btn-primary mb-4">
            Subscribe
          </button>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </form>
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2025 Copyright:
    <a class="text-body" href="https://mdbootstrap.com/">TheDogSite.com</a>
  </div>
  <!-- Copyright -->
</footer>

</body>
</html>

