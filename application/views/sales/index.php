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


                    <a href="<?= base_url('sales') . '/create'; ?>" class="btn btn-success mb-3"> Add Sales</a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="text-white bg-primary">
                                <tr>

                                    <th scope="col">No Sales</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tgl Bayar</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($sales as $data) : ?>
                                    <tr>

                                        <td><?= $data['soid']; ?></td>
                                        <td><?= $data['tglbuat']; ?></td>
                                        <td><?= $data['tglbayar']; ?></td>
                                        <td><?= $data['kontakid']; ?></td>
                                        <?php foreach ($status as $u) : ?>
                                            <?php if ($data['status'] == $u['id']) : ?>
                                                <td><?= $u['name']; ?></td>

                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <td><?= $data['note']; ?></td>
                                        <td>
                                            <a href="<?= base_url('sales/edit/') . $data['soid']; ?> " class="btn btn-sm btn-success">edit</a>
                                            <a href="<?= base_url('sales/delete/') . $data['soid']; ?>" class="btn btn-sm btn-danger " onclick="return confirm('Yakin menhapus data');">delete</a>
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