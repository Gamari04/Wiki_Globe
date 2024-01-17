<?php
include("includes/Navbar.php");
?>



<div class="row">
  <div class="col-md-5 mx-auto">
    <div class="input-group p-5 ">
      <input class="form-control border-end-0 border rounded-pill " type="search" value="" id="searchInput"
        placeholder="Find the topics you care about...">
      <span class="input-group-append">
        <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
          <i class="fa fa-search"></i>
        </button>
      </span>
    </div>


  </div>
</div>


<section class="p-5">
  <!-- <div class="card mb-3 container " style="max-width: 700px;">
    <div class="row g-0">
      <div class="col-md-4 ">
        <img src="public/assets/globe3.jpg" class="img-fluid rounded-start" alt="globe">
      </div>
      <div class="col-md-8">

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
            content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div> -->
  <div id="cardContainer">
    <?php foreach ($wikis as $wiki) {
      // var_dump($wiki);
      // die();
      ?>
      <div class="card mb-3 container " style="max-width: 700px; " id="card">
        <div class="row g-0">

          <div class="col-md-4 ">
            <img src="<?php echo $wiki['image'] ?>" class="img-fluid rounded-start" alt="globe">
          </div>

          <div class="col-md-8">

            <div class="card-body">
              <p class="card-text "
                style="color: rgba(28, 28, 28, 0.50);font-family: Open Sans;font-size: 15px;font-style: normal;font-weight: 400;">
                <?php echo strtoupper($wiki['Cname']) ?>
              </p>
              <h5 class="card-title"
                style="color: #000;font-family: Libre Baskerville;font-size: 33px;font-style: normal;font-weight: 700;line-height: normal;">
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
                  Created By :
                  <?php echo $wiki['Fname'] ?>
                  <?php echo $wiki['Lname'] ?>


                </small></p>
              <p>
                <?php echo $wiki['created_at'] ?>
              </p>
            </div>
            <a href="learn?id=<?= $wiki['id']?>" style="text-decoration: none;">
              Learn more
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

</section>
<script>
 const search = document.getElementById('searchInput');
 const cardContainer = document.getElementById('cardContainer');

  search.addEventListener('keyup', async function (e) {
  const response = await fetch('search?q=' + encodeURIComponent(search.value));

  if (response.ok) {
    cardContainer.innerHTML = ""; 
    const data = await response.json();
    data.forEach(wiki => {
  
  cardContainer.innerHTML += `
    <div class="row g-0">
      <div class="col-md-4">
        <img src="${wiki.image}" class="img-fluid rounded-start" alt="globe">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text" style="color: rgba(28, 28, 28, 0.50); font-family: Open Sans; font-size: 15px; font-style: normal; font-weight: 400;">
            ${wiki.Cname ? wiki.Cname.toUpperCase() : ''}
          </p>
          <h5 class="card-title" style="color: #000; font-family: Libre Baskerville; font-size: 33px; font-style: normal; font-weight: 700; line-height: normal;">
            ${wiki.title}
          </h5>
          ${wiki.tags ? wiki.tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join('') : ''}
          <p class="card-text">
            ${wiki.content}
          </p>
          <p class="card-text"><small class="text-body-secondary">
            ${wiki.Fname} ${wiki.Lname} ${wiki.created_at}
          </small></p>
        </div>
      </div>
    </div>
  `;
});
  } else {
    console.error('La requête vers le serveur a échoué.');
  }
});





</script>