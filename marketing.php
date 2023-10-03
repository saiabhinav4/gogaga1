<?php
$title = "Ledger";
include "header.php";

?>
<div class="card">
    <div class="card-header bg-white">
        <h3>Promotional Flyers</h3>
        <div class="text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Flyer
            </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Upload Flyers</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4 text-center">

                        

                            <!DOCTYPE html>
                            <html lang="en">

                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Expiring Images with Manual Upload and Download</title>
                               
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
                                <style>
                                    .uploadedImage {
                                        max-width: 400px;
                                        height: auto;
                                        
                                        margin: 10px 0px 10px 0px;
                                    }
                                    .card_image{
                                        border: none;
                                        border-radius: 10px;
                                      

                                    }
                                    img{
                                        border-radius: 10px;
                                    }
                                </style>
                            </head>

                            <body>
                               
                                <form id="imageUploadForm" >
                                <label for="imageInput" class="mt-3">Flyer Image:</label>
                                    <input type="file" id="imageInput" accept="image/*" multiple class="form-control">
                                   
                                    <label for="expiryDate" class="mt-3" >Expiry Date:</label>
                                    <input type="date" required id="expiryDate" class="form-control bg-white">
                                    <button type="button" onclick="uploadImages()" class="btn btn-primary mt-4">Upload</button>
                                </form>


                                <script>
                                    function createImageCard(dataURL) {
                                        const card = document.createElement('div');
                                    
                                        card.classList.add('card', 'uploadedImage','col-lg-3','p-3','card_image','text-center');

                                        const image = document.createElement('img');
                                        image.src = dataURL;
                                        image.classList.add('card-img-top');

                                        const cardBody = document.createElement('div');
                                        cardBody.classList.add('card-body');

                                        const downloadLink = document.createElement('a');
                                        downloadLink.href = dataURL;
                                        downloadLink.download = 'image.jpg'; // Change the filename as needed
                                        downloadLink.textContent = 'Download';
                                        downloadLink.classList.add('btn', 'btn-dark', 'btn-sm', 'btn-block');

                                        cardBody.appendChild(downloadLink);
                                        card.appendChild(image);
                                        card.appendChild(cardBody);

                                        return card;
                                    }

                                    function uploadImages() {
                                        const imageInput = document.getElementById('imageInput');
                                        const imageContainer = document.getElementById('imageContainer');
                                        const expiryDateInput = document.getElementById('expiryDate');
                                        const expiryTimeInput = document.getElementById('expiryTime');

                                        // Check if files are selected
                                        if (imageInput.files.length > 0 && expiryDateInput.value) {
                                            for (const file of imageInput.files) {
                                                // Create a new FileReader
                                                const reader = new FileReader();

                                                // Set up a function to run when the image is loaded
                                                reader.onload = function(e) {
                                                    // Create a Bootstrap card for the uploaded image
                                                    const card = createImageCard(e.target.result);

                                                    // Append the card to the container
                                                    imageContainer.appendChild(card);

                                                    // Set a timer to remove the card after the specified expiration date and time
                                                    const expiryDateTime = new Date(`${expiryDateInput.value} ${expiryTimeInput.value}`).getTime();
                                                    const currentTime = new Date().getTime();
                                                    const expirationTime = expiryDateTime - currentTime;

                                                    setTimeout(() => {
                                                        imageContainer.removeChild(card);
                                                    }, expirationTime);
                                                };

                                                // Read the uploaded image as a data URL
                                                reader.readAsDataURL(file);
                                            }
                                        }
                                    }
                                </script>

                                <!-- Bootstrap JavaScript and jQuery libraries -->
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            </body>

                            </html>



                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container card-body">

<div id="imageContainer" class='d-flex flex-row justify-content-start row'>
    <!-- Display the uploaded images here -->
</div>
                                </div>

</div>


</div>


</div>





<?php
include "footer.php"
?>



