<?php 
 


include(__DIR__ .'../../includes/header.php');

foreach ($wikis as $wiki) {
    // var_dump($wiki);
    // die();
    ?>
    <div class="card mb-3 container " style="max-width: 700px;">
      <div class="row g-0">

        <div class="col-md-4 ">
          <img src="<?php echo $wiki['image'] ?>" class="img-fluid rounded-start" alt="globe">
        </div>

        <div class="col-md-8">

          <div class="card-body">
          <p class="card-text " style="color: rgba(28, 28, 28, 0.50);font-family: Open Sans;font-size: 15px;font-style: normal;font-weight: 400;">
              <?php echo strtoupper($wiki['Cname']) ?>
            </p>
            <h5 class="card-title" style="color: #000;font-family: Libre Baskerville;font-size: 33px;font-style: normal;font-weight: 700;line-height: normal;">
              <?php echo $wiki['title'] ?>
            </h5>
            
            <?php
            $tagsArray = explode(',', $wiki['tags']);

            foreach ($tagsArray as $tag) {
              echo '<span class="tag">' . trim($tag) . '</span>';
            }
            ?>
            <p class="card-text">
              <?php echo $wiki['content'] ?>
            </p>

            <p class="card-text"><small class="text-body-secondary">
               Created By: <?php echo $wiki['Fname'] ?>
                <?php echo $wiki['Lname'] ?>
                
              </small></p>
              <p><?php echo $wiki['created_at'] ?></p>
          </div>
          <a href="deletewiki?id=" style="text-decoration: none;">   
<button type="button"  class="btn btn-light border border-black fs-5" >
      Archiver
    </button>
    </a> 
        </div>
      </div>
    </div>
  <?php } ?>