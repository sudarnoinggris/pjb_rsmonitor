<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class='row'>
        <div class='col-lg'>
            <div class="card">
                <h5 class="card-header text-white bg-primary"><?= $title; ?></h5>
                <div class="card-body">


                    <a href="<?= base_url('pegawai') . '/add'; ?>" class="btn btn-success mb-3"> Add Pegawai</a>
                    <table id="dataTable" class="table table-hover table-bordered">
                        <thead class="text-white bg-primary">
                            <tr>

                                <th scope="col">nid</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Distrik</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php //foreach ($user as $data) : ?>
                                <tr>

                                    <td>nid</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>Distrik</td>
                                    <td>Telp</td>
                                    <td>Image</td>
       
                                    <td>
                                        <a href="<?= base_url('pegawai/edit/') ?>" class="btn btn-sm btn-success">edit</a>
                                        <a href="<?= base_url('pegawai/delete/') ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data');">delete</a>
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