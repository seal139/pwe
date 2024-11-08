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
    <title>Booking List</title>
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
            
                <div class="pagination-links" style="float: right; display: flex; align-items: center;">
                    <div class = "center-container" style= "margin-right: 10px">
                        <span>Page : &nbsp</span>
                        <span>
                            <?php if ($pager->getTotal() > 0): ?>
                                <?= $pager->makeLinks($pager->getCurrentPage(), 6, $pager->getTotal(), 'default_full') ?>
                            <?php else: ?>
                                0
                            <?php endif; ?>
                        </span>                        
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 120px"></th>
                            <th style="width: 45%">Guest</th>
                            <th style="width: 25%">Room Type</th>            
                            <th style="width: 15%">Check In</th>                            
                            <th style="width: 15%">Check Out</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($entity as $row) : ?>
                            <tr style="height: 20px">
                                <td class="text-right">
                                    <div class = "center-container">
                                        <div class="fa-stack action-button">
                                            <a href="<?php echo base_url('BookingController/delete/'.$row->id) ?>">
                                                <i class="fa fa-trash fa-stack-1x fa-inverse action-button-red action-button"></i>
                                            </a>
                                        </div>

                                        <div class="fa-stack action-button edit-button" id="id<?= $row->id ?>"> 
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse action-button-blue action-button"></i>
                                        </div>
                                    </div>                                                          
                                </td>

                                <td>
                                    <div class="stack-middle view-button" id="vw<?= $row->id ?>">
                                        <?php echo $row->id_tamu ?>
                                    </div>
                                </td>
                                <td><div class="stack-middle"><?php echo $row->id_kamar ?></div></td>
                                <td><div class="stack-middle"><?php echo $row->tanggal_checkin ?></div></td>
                                <td><div class="stack-middle"><?php echo $row->tanggal_checkout ?></div></td>
                                        
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                
                <button id="add-button" class="btn btn-md btn-success mb-3" >Add</button>
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
                const targetUrl = '<?= base_url("BookingController/create") ?>'; // Set the URL you want to call
                loadContentFromUrl(targetUrl, '#modal-body'); // Call the method with URL and target div
                $('#myModal').show(); // Show the modal
            });

            $('.view-button').on('click', function() {
                var elementId = $(this).attr('id');
                var sanitizedId = elementId.substring(2);

                const targetUrl = '<?= base_url("BookingController/view/") ?>' + sanitizedId; // Construct the URL
                loadContentFromUrl(targetUrl, '#modal-body'); // Call the method with URL and target div
                $('#myModal').show(); // Show the modal
            });

            $('.edit-button').on('click', function() {
                var elementId = $(this).attr('id');
                var sanitizedId = elementId.substring(2);

                const targetUrl = '<?= base_url("BookingController/edit/") ?>' + sanitizedId; // Construct the URL
                loadContentFromUrl(targetUrl, '#modal-body'); // Call the method with URL and target div
                $('#myModal').show(); // Show the modal
            });

        });
    </script>
  </body>
</html>
<?= $this->endSection() ?>
