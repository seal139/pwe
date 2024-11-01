<!doctype html>
<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Manage Room</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('type'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('type');?>
                </div>
                    
                <?php endif ?>

                <button id="add-button" class="btn btn-md btn-success mb-3">Add</button>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 120px"></th>
                            <th style="width: 55%">Room Type</th>
                            <th style="width: 30%">Price</th>
                            <th style="width: 15%">Room Count</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                            foreach ($entity as $row) : ?>
                                <td class="text-right">
                                    <div class = "center-container">
                                        <div class="fa-stack action-button">
                                            <a href="<?php echo base_url('KamarController/delete/'.$row->id) ?>">
                                                <i class="fa fa-trash fa-stack-1x fa-inverse action-button-red action-button"></i>
                                            </a>
                                        </div>

                                        <div class="fa-stack action-button edit-button" id="id<?= $row->id ?>">                                                                                      
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse action-button-blue action-button"></i>
                                            </a>
                                        </div>
                                    </div>                                                          
                                </td>

                                <td><div class="fa-stack"><?php echo $row->tipe_kamar ?></div></td>
                                <td><div class="fa-stack"><?php echo $row->harga ?></div></td>
                                <td><div class="fa-stack"><?php echo $row->jumlah_kamar ?></div></td>          
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
         $(document).ready(function() {
           
            // Method to call the provided URL and append the content to a target div
            function loadContentFromUrl(url, targetDiv) {
                $.ajax({
                    url: url, // The target URL provided as parameter
                    type: 'GET', // Use 'POST' if needed
                    success: function(data) {
                        $(targetDiv).html(data); // Load the HTML content into the target div
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error); // Log errors if any
                    }
                });
            }
        
            // Close the modal when the close button is clicked
            $('.close').on('click', function() {
                $('#myModal').hide(); // Hide the modal
            });

            // Close the modal when clicking outside of the modal content
            $(window).on('click', function(event) {
                if ($(event.target).is('#myModal')) {
                    $('#myModal').hide(); // Hide the modal
                }
            });
        

            // Event handler to trigger the AJAX call and show the modal
            $('#add-button').on('click', function() {
                const targetUrl = '<?= base_url("KamarController/create") ?>'; // Set the URL you want to call
                loadContentFromUrl(targetUrl, '#modal-body'); // Call the method with URL and target div
                $('#myModal').show(); // Show the modal
            });

            $('.edit-button').on('click', function() {
                var elementId = $(this).attr('id');
                var sanitizedId = elementId.substring(2);

                const targetUrl = '<?= base_url("KamarController/edit/") ?>' + sanitizedId; // Construct the URL
                loadContentFromUrl(targetUrl, '#modal-body'); // Call the method with URL and target div
                $('#myModal').show(); // Show the modal
            });

        });
    </script>
  </body>
</html>
<?= $this->endSection() ?>
