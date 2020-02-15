<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class='row'>
        <div class='col-lg'>
            <?php if ($this->session->userdata('message') <> '') : ?>
                <div class="alert alert-success" id="message">
                    <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <h5 class="card-header text-white bg-primary"><?= $title; ?></h5>
                <div class="card-body">

                    <a href="<?= base_url('uom') . '/add'; ?>" class="btn btn-success mb-3"> Add Satuan</a>
                    <table id="dataTable" class="table table-hover">
                        <thead class="text-white bg-primary">
                            <tr>
                                <th scope="col">Satuan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($uom as $data) : ?>
                                <tr>
                                    <td><?= $data['uomid']; ?></td>
                                    <td><?= $data['name']; ?></td>
                                    <td>
                                        <a href="<?= base_url('uom/edit/') . $data['uomid']; ?>" class="btn btn-sm btn-success">edit</a>
                                        <a href="<?= base_url('uom/delete/') . $data['uomid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menhapus data');">delete</a>
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