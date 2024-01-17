<?php
include("includes/Navbar.php");
?>
<!-- <div class="container shadow min-vh-100 py-4 ">
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
            <div id="searchResults">

            </div>
        </div>
    </div> -->
    <script>
        //     document.getElementById('searchInput').addEventListener('keyup',async function(e){
        //     try {
        //         const query= e.target.value;
        //         const response =await fetch('search?q='+encodeURIComponent(query))
        //         if(response.ok){
        //             const data =await response.json();
        //             var html = '';
        //              data.array.forEach(wiki => {
        //                 html += `
        //                 <span class="input-group-append">${wiki['title']}</span>
        //                 `;
        //             });
                    
        //             document.getElementById('searchResults').innerHTML = html;
        //         }
                    
        //     } catch (error) {
        //         console.log(error)
        //     }
        // })
    //     document.getElementById('searchInput').addEventListener('keyup',async function(e){
    //         try {
    //             const query= e.target.value;
    //             const response =await fetch('search?q='+encodeURIComponent(query))
    //             if(response.ok){
    //                 const data =await response.json();
    //                 console.log(data);
    //                 var html = document.getElementById('searchResults');
    //                 html.innerHTML="";
                  
    //                   data.forEach(wiki => {
    //                     const wikiContainer = document.createElement("div");
    //                 wikiContainer.classList.add("container", "wiki-container");

    //                 const wikiContent = `
    //                     <div class="row">
    //                         <div class="col-lg-5">
    //                             <img class="img-fluid wiki-image" src="/wiki/public/imgs/${wiki.image}" alt="Wiki Image">
    //                         </div>
    //                         <div class="col-lg-7">
    //                             <div class="wiki-content">
    //                                 <h1 class="wiki-title">${wiki.title}</h1>
    //                                 <ul class="wiki-details">
    //                                     <li><h6>${wiki.name}</h6></li>
    //                                     <li><h6>${wiki.username}</h6></li>
    //                                     <li class="date">${wiki.creation_date}</li>
    //                                 </ul>
    //                                 <a href="detailswiki?id=${wiki.id}" class="btn btn-primary mt-3" >Learn More</a>
    //                             </div>
    //                         </div>
    //                     </div>
    //                     `;
    //                 });
    //                 console.log(html);
                    
    //             }
                    
    //         } catch (error) {
    //             console.log(error)
    //         }
    //     })
    // </script>