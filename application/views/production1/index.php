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


                    <a href="<?= base_url('production') . '/create'; ?>" class="btn btn-primary mb-3"> Add production</a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead class="text-white bg-primary">
                                <tr>
                                    <th scope="col">No production</th>
                                    <th scope="col">Tgl Buat</th>
                                    <th scope="col">createby</th>
                                    <th scope="col">note</th>
                                    <th scope="col">itemsid</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($production as $data) : ?>
                                    <tr>
                                        <td><?= $data['proid']; ?></td>
                                        <td><?= $data['tglbuat']; ?></td>
                                        <td><?= $data['createby']; ?></td>
                                        <td><?= $data['note']; ?></td>
                                        <td><?= $data['itemsid']; ?></td>
                                        <td><?= $data['quantity']; ?></td>
                                        <td><?= $data['price']; ?></td>

                                        <td>
                                            <a href="<?= base_url('production/edit/') . $data['proid']; ?> " class="btn btn-sm btn-success">edit</a>
                                            <a href="<?= base_url('production/delete/') . $data['proid']; ?>" class="btn btn-sm btn-danger " onclick="return confirm('Yakin menhapus data');">delete</a>
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