

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/signUp.css" />
</head>
<style>
                  .error{
                    width: 100%;
                    font-size: 15px;
                    color:red ;
                    font-family: Arial, Helvetica, sans-serif;
                    display: none;
                  }
            </style>
<body>
  
<section class="text-center text-lg-start">
 

  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign up now</h2>

          
            <form action="submituser" method="POST">
                <div class="form-outline mb-4">
                <label class="form-label d-flex flex-row" for="form3Example3">First name</label>
                <input type="text" id="name" class="form-control" name="firstname" />
                <span class="error">invalid name</span>
              
              </div>
              <div class="form-outline mb-4">
              <label class="form-label d-flex flex-row" for="form3Example3">Last name</label>
                <input type="text" id="lastname" class="form-control" name="lastname" />
                <span class="error">invalid email</span>
               
              </div>

        
              <div class="form-outline mb-4">
              <label class="form-label d-flex flex-row" for="form3Example3">Email address</label>
                <input type="email" id="email" class="form-control" name="email" />
                <span class="error">invalid email</span>
               
              </div>

              <div class="form-outline mb-4">
              <label class="form-label d-flex flex-row" for="form3Example4">Password</label>
                <input type="password" id="password" class="form-control" name="password" />
                <span class="error">invalid password</span>
              </div>

              <button type="submit" name="addUser" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>
              <p>I have an account <a href="login">Sign in</a></p>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="public/assets/globe3.jpg" class="w-100 rounded-4 shadow-4 h-100"
          alt="" />
      </div>
    </div>
  </div>
  
</section>


<script src="../assets/js/signUp.js"></script>
</body>
</html>