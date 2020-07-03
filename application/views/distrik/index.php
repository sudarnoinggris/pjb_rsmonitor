<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class='row'>
        <div class='col-lg'>
            <div class="card">
                <h5 class="card-header text-white bg-primary"><?= $title; ?></h5>
                <div class="card-body">


                    <a href="<?= base_url('distrik') . '/add'; ?>" class="btn btn-success mb-3"> Add Distrik</a>
                    <table id="dataTable" class="table table-hover table-bordered">
                        <thead class="text-white bg-primary">
                            <tr>

                                <th scope="col">Kode Distrik</th>
                                <th scope="col">Nama Distrik</th>
                    
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php //foreach ($user as $data) : ?>
                                <tr>

                                    <td>Kode</td>
                                    <td>Nama</td>
       
                                    <td>
                                        <a href="<?= base_url('distrik/edit/') ?>" class="btn btn-sm btn-success">edit</a>
                                        <a href="<?= base_url('distrik/delete/') ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data');">delete</a>
                                    </td>
                                </tr>

                            <?php //endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>