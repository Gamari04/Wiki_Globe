<?php
include("includes/Navbar.php");
?>
<div class="container shadow min-vh-100 py-4 ">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="input-group p-5 ">
                <input class="form-control border-end-0 border rounded-pill " type="search" value=""
                    id="searchInput" placeholder="Find the topics you care about...">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5"
                        type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <div id="searchResults"></div>
        </div>
    </div>
    <script>
            document.getElementById('searchInput').addEventListener('keyup',async function(e){
            try {
                const query= e.target.value;
                const response =await fetch('search?q='+encodeURIComponent(query))
                if(response.ok){
                    const data =await response.text();
                    console.log(data);
                    document.getElementById('searchResults').innerHTML = data;
                }
                    
            } catch (error) {
                console.log(error)
            }
        })
    </script>