<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/zgz37y1lik4necz8ruoorr7znjuk9l8xw2lk5xrtpaipcpod/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container shadow min-vh-100 py-4 ">
        <div>

            <form action="addNewWiki" method="post" enctype="multipart/form-data"
                style="width: 100%; max-width: 60rem; " class="mx-auto ">

                <h1 class="text-center pb-5 display-4 fs-3 fw-bold fst-italic ">
                    Add New Wiki
                </h1>

                <div class="mb-3">
                    <label class="form-label">Wiki Title</label>
                    <input type="text" class="form-control border" placeholder="Enter a title" name="title">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Content"></textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Category:</label><br>
                    <select class="js-example-basic-single" name="categorie_id">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    </select>
                </div>





                <div class="mb-3">
                    <label class="form-label">Tags</label><br>
                    <select class="js-example-basic-multiple" id="tag" name="tag_id[]" multiple
                        style="padding-inline: 10px;">
                        <?php foreach ($tags as $tag) { ?>
                            <option value="<?= $tag['id'] ?>">
                                <?= $tag['name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label"> Image </label>
                    <input type="file" class="form-control border" name="image">
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-dark" name="addwiki">Add Wiki</button>
                </div>
            </form>

        </div>
    </div>
    <script>    $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });

    </script>

</body>

</html>