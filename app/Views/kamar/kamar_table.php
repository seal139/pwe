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

                <a href="<?php echo base_url('KamarController/create') ?>" class="btn btn-md btn-success mb-3">Add</a>
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

                                        <div class="fa-stack action-button">
                                            <a href="<?php echo base_url('KamarController/edit/'.$row->id) ?>">
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse action-button-blue action-button"></i>
                                            </a>
                                        </div>
                                    </div>                                                          
                                </td>

                                <td><div class="fa-stack"><?php echo $row->type ?></div></td>
                                <td><div class="fa-stack"><?php echo $row->price ?></div></td>
                                <td><div class="fa-stack"><?php echo $row->roomCount ?></div></td>          
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
  </body>
</html>
<?= $this->endSection() ?>
