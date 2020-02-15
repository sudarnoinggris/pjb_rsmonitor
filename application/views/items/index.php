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
                <div class="card-header  text-white bg-primary">
                    <h5><?= $title; ?></h5>
                </div>

                <div class="card-body">

                    <a href="<?= base_url('items') . '/add'; ?>" class="btn btn-success mb-3"> Add Items</a>

                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead class="text-white bg-primary">
                                <tr>

                                    <th scope="col">ItemsID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Beli Terakhir</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($items as $data) : ?>
                                    <tr>
                                        <td><?= $data['itemsid']; ?></td>
                                        <td><?= $data['name']; ?></td>
                                        <td><?= $data['uomid']; ?></td>
                                        <td><?= $data['itemsgroupid']; ?></td>
                                        <td><?= number_format($data['hargabeli']); ?></td>
                                        <td><?= number_format($data['hargajual']); ?></td>
                                        <td><?= number_format($data['hargabeliterakhir']); ?></td>

                                        <td>
                                            <a href="<?= base_url('items/edit/') . $data['itemsid']; ?>" class="btn btn-sm btn-success">edit</a>
                                            <a href="<?= base_url('items/delete/') . $data['itemsid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data');">delete</a>
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