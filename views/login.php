

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/signUp.css" />
</head>
<body>

<section class="text-center text-lg-start">
 


  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign in </h2>

          
            <form action="../controllers/users/login.php" method="post">
            
          
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

         
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <button type="submit" name="login" class="btn btn-primary btn-block mb-4">
                Sign in
              </button>
              <p>Creat an account <a href="signup">Sign Up</a></p>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="public/assets/globe3.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>