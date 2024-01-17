<?php 

include("includes/Navbar.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Announcement Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 8px;
        }
        .comment{
         background-color: gainsboro;
         border-radius: 8px;
        }
      
    </style>
</head>
<body>

<div class="container">

        <div class="card">
        
            <h1 class="text-center  fs-3"><strong><?php echo $wikis['title'] ?></strong></h1><br>
            <img src="<?php echo $wikis['image'] ?>" alt="">
            <p><strong>Category:</strong> <?php echo strtoupper($wikis['Cname']) ?>;?></p>
            <p><strong>Tags:</strong>   <?php
              $tagsArray = explode(',', $wikis['tags']);

              foreach ($tagsArray as $tag) {
                echo '<span class="tag">' . trim($tag) . '</span>';
              }
              ?></p>
            <p><strong>Content:</strong>   <?php echo $wikis['content'] ?></p>
            <p><strong>Created By:</strong> <?php echo $wikis['Fname'] ?>   <?php echo $wikis['Lname'] ?></p>
            <p><strong>At:</strong> <?php echo $wikis['created_at'] ?></p>

            <a href="deletewiki?id=<?php echo $wikis['id'] ?>" style="text-decoration: none;">   
<button type="button"  class="btn btn-light border border-black fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal" >
      Delete
    </button>
    </a> 
       
</div>

</body>
</html>
