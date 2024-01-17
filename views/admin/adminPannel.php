

<?php 
session_start();
if(isset($_SESSION['role']) &&  $_SESSION['role']!='admin' && empty($_SESSION['role']) ){
    header("Location: login");
}

include(__DIR__ .'../../includes/header.php');

?>
<div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2">
                             
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person_add</i>
                                </div>
                                <div class="text-end pt-1">
                                    <b class="text-sm mb-0 text-capitalize text-primary">All Users</b>
                                    <h4 class="mb-0"><?php echo $total?> </h4>
                                </div>
                            </div>

                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                    last week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">leaderboard</i>
                                </div>
                                <div class="text-end pt-1">
                                    <b class="text-sm mb-0 text-capitalize text-primary">All Categories</b >
                                    <h4 class="mb-0"><?php echo $allCat ?></h4>
                                </div>
                            </div>

                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                                    last month</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card  mb-2">
                            <div class="card-header p-3 pt-2 bg-transparent">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">store</i>
                                </div>
                                <div class="text-end pt-1">
                                    <b class="text-sm mb-0 text-capitalize text-primary ">All Tags</b>
                                    <h4 class="mb-0 "><?php echo $allTag ?></h4>
                                </div>
                            </div>
    
                            <hr class="horizontal my-0 dark">
                            <div class="card-footer p-3">
                                <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">+1% </span>than
                                    yesterday</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card mb-2">
                            <div class="card-header p-3 pt-2 bg-transparent">
                            <div
                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <b class="text-sm mb-0 text-capitalize text-primary ">Total Wikis</b>
                                    <h4 class="mb-0 "><?php echo $allWiki?></h4>
                                </div>
                            </div>
    
                            <hr class="horizontal my-0 dark">
                            <div class="card-footer p-3">
                                <p class="mb-0 ">Just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <h2 class="text-center">Last Wikis Added</h2>
<?php 
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
                <?php echo $wiki['Fname'] ?>
                <?php echo $wiki['Lname'] ?>
                <?php echo $wiki['created_at'] ?>
              </small></p>
          </div>

        </div>
      </div>
    </div>
  <?php } ?>

    
    


<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>
