<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Booking List</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form id="edit">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="type">Guest ID</label>                    
                    <input type="text" class="form-control" id="idtamu" name="idtamu" value="<?= $entity->id_tamu; ?>"/>
                </div>

                <div class="form-group">
                    <label for="price">Room ID</label>
                    <input type="text" class="form-control" id="idkamar" name="idkamar" value="<?= $entity->id_kamar; ?>"/>
                </div>

                <div class="form-group">
                    <label for="description">Check In</label>
                    <input type="text" class="form-control" id="tanggalcheckin" name="tanggalcheckin" value="<?= $entity->tanggal_checkin; ?>" />
                </div>

                <div class="form-group">
                    <label for="roomCount">Check Out</label>
                    <input type="text" class="form-control" id="tanggalcheckout" name="tanggalcheckout" value="<?= $entity->tanggal_checkout; ?>" />
                </div>                  

                <div class="form-group">
                    <label for="roomCount">Numbers Of Rooms</label>
                    <input type="text" class="form-control" id="jumlahkamar" name="jumlahkamar" value="<?= $entity->jumlah_kamar; ?>" />
                </div>                  

                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-info" />
                </div>
            </form>

            <div id="responseMessage"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#edit').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            const formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('BookingController/saveOnEdit/' . $entity->id) ?>', // Adjust the URL as necessary
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Handle success
                        $('#responseMessage').html('<div class="alert alert-success">' + data.message + '</div>');
                        setTimeout(function() {
                            window.location.href = "<?= base_url('BookingController') ?>";
                        }, 1000)                   
                    } else {
                        // Handle errors returned from the server
                        let errorMessages = '<div class="alert alert-danger"><ul>';
                        $.each(data.errors, function(index, error) {
                            errorMessages += '<li>' + error + '</li>';
                        });
                        errorMessages += '</ul></div>';
                        $('#responseMessage').html(errorMessages);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    $('#responseMessage').html('<div class="alert alert-danger">An error occurred while saving.</div>');
                }
            });
        });
    });
</script>
