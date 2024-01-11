<?php

if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
  $displayStyle = "block";
  $displayStyle1 = "none";

} else {
  $displayStyle = "none";
  $displayStyle1 = "block";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
      
   
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="public/assets/Logoglobe.svg" alt="Logo" class="d-inline-block align-text-top p-3">
      </a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="http://localhost/Wiki">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active   fs-5" href="tags">Tags</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active  fs-5" href="#">Categories</a>
          </li>

        </ul>
      </div>
      <div class="d-flex gap-5">
        <i class="fa-solid fa-magnifying-glass  fa-2x"></i>
        <a href="signup" style="text-decoration: none;">
          <button type="button" class="btn btn-light border border-black fs-5"
            style="display: <?php echo $displayStyle1; ?>">Get started</button>

        </a>
        <a href="logout" style="text-decoration: none;">
          <button type="button" class="btn btn-light border border-black fs-5"
            style="display: <?php echo $displayStyle; ?> ">LogOut</button>
        </a>
    <a href="addwiki" style="text-decoration: none;">   
<button type="button"  class="btn btn-light border border-black fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: <?php echo $displayStyle; ?>">
        Write
    </button>
    </a> 
      </div>
    </div>

  </nav>
  <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>