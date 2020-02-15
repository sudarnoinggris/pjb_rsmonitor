<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <div class='row'>
        <div class='col-lg'>
            <div class="card">
                <h5 class="card-header text-white bg-primary"><?= $title; ?></h5>
                <div class="card-body">


                    <a href="<?= base_url('user') . '/add'; ?>" class="btn btn-success mb-3"> Add User</a>
                    <table id="dataTable" class="table table-hover table-bordered">
                        <thead class="text-white bg-primary">
                            <tr>

                                <th scope="col">UserID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($user as $data) : ?>
                                <tr>

                                    <td><?= $data['userid']; ?></td>
                                    <td><?= $data['name']; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/edit/') . $data['userid']; ?>" class="btn btn-sm btn-success">edit</a>
                                        <a href="<?= base_url('user/delete/') . $data['userid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data');">delete</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

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