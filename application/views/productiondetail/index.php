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
                <h5 class="card-header"><?= $title; ?></h5>
                <div class="card-body">


                    <a href="<?= base_url('productiondetail') . '/add'; ?>" class="btn btn-primary mb-3"> Add productiondetail</a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">No PO</th>
                                    <th scope="col">itemsid</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">price</th>
                                    <th scope="col">uomid</th>

                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($productiondetail as $data) : ?>
                                    <tr>

                                        <td><?= $data['proid']; ?></td>
                                        <td><?= $data['itemsid']; ?></td>
                                        <td><?= $data['quantity']; ?></td>
                                        <td><?= $data['price']; ?></td>
                                        <td><?= $data['uomid']; ?></td>

                                        <td>
                                            <a href="<?= base_url('productiondetail/edit/') . $data['proid'] . '/' . $data['itemsid']; ?> " class="badge badge-success">edit</a>
                                            <a href="<?= base_url('productiondetail/delete/') . $data['proid'] . '/' . $data['itemsid']; ?>" class="badge badge-danger " onclick="return confirm('Yakin menhapus data');">delete</a>
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