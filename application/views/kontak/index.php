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

                    <a href="<?= base_url('kontak') . '/add'; ?>" class="btn btn-primary mb-3"> Add Kontak</a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead class="text-white bg-primary">
                                <tr>

                                    <th scope="col">Kode Kontak</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($kontak as $data) : ?>
                                    <tr>

                                        <td><?= $data['kontakid']; ?></td>
                                        <td><?= $data['name']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['person']; ?></td>
                                        <td><?= $data['telp']; ?></td>

                                        <td>
                                            <a href="<?= base_url('kontak/edit/') . $data['kontakid']; ?>" class="btn btn-sm btn-success">edit</a>
                                            <a href="<?= base_url('kontak/delete/') . $data['kontakid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?');">delete</a>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>