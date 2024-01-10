<?php


include(__DIR__ . '../../includes/header.php');
?>
<section class="p-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Categories
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addCategories" method="post" enctype="multipart/form-data"
                        class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">

                        <h1 class="text-center pb-5 display-4 fs-3">
                            Add New Categorie
                        </h1>

                        <div class="mb-3">
                            <label class="form-label">Name of Categorie</label>
                            <input type="text" class="form-control border" placeholder="Enter the name of the categorie"
                                name="name">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addCategory">Add Categorie</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name of the Categorie</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach( $categories as $category): ?>
      <tr>
        <td><?php echo $category['id']?></td>
        <td><?php echo $category['name']?></td>
        <td><a class="btn btn-link text-dark px-3 mb-0" href="deleteCategorie?id=<?= $category['id']?>"><i class="fa-regular fa-trash">Delete</i></a></td>
        <td><a class="btn btn-link text-dark px-3 mb-0" href="editcategory?id=<?= $category['id']?>"><i class="fa-regular fa-trash">Up date</i></a></td>
    </tr>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

    <script src="public/js/bootstrap.bundle.min.js"></script>

</section>