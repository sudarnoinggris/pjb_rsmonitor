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


                    <a href="<?= base_url('purchase') . '/create'; ?>" class="btn btn-success mb-3"> Add Purchase</a>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover table-bordered">
                            <thead class="text-white bg-primary">
                                <tr>

                                    <th scope="col">No Purchase</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Tgl Bayar</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($purchase as $data) : ?>
                                    <tr>

                                        <td><?= $data['poid']; ?></td>
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
                                            <a href="<?= base_url('purchase/edit/') . $data['poid']; ?> " class="btn btn-sm btn-success">edit</a>
                                            <a href="<?= base_url('purchase/delete/') . $data['poid']; ?>" class="btn btn-sm btn-danger " onclick="return confirm('Yakin menghapus data');">delete</a>
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
<script>
    $(document).ready(function() {

        $('#dataTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });

    });
</script>