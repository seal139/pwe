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
            <form id="create">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="idtamu">Guest</label>

                    <select name="guest" id="guest" class="form-control">
                        <option value="">Select Guest</option> <!-- Default option -->
                        <?php foreach ($guests as $guest): ?>
                            <option value="<?= $guest->id?>">
                                <?= $guest->no_telpon . " - " . $guest->nama ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idkamar">Room Type</label>

                    <select name="room" id="room" class="form-control">
                        <option value="">Select Room Type</option> <!-- Default option -->
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= $room->id?>">
                                <?= $room->tipe_kamar ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="checkin">Check In</label>
                    <input type="date" class="form-control" id="checkin" name="checkin" />
                </div>

                <div class="form-group">
                    <label for="checkout">Check Out</label>
                    <input type="date" class="form-control" id="checkout" name="checkout" />
                </div>

                <div class="form-group">
                    <label for="roomCount">Numbers Of Rooms</label>
                    <input type="text" class="form-control" id="roomCount" name="roomCount" />
                </div>
                

                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-info" />
                </div>

            </form>

            <div id="responseMessage"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#create').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            const formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('BookingController/saveOnCreate') ?>', // Adjust the URL as necessary
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


