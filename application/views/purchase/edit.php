<div class="container">


    <div class="card">
        <div class="card-header text-white bg-dark"><?= $subtitle ?></div>

        <div class="card-body">
            <?php if ($this->session->userdata('message') <> '') : ?>
                <div class="alert alert-success" id="message">
                    <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            <?php endif; ?>
            <!-- kolom -->
            <form method="post">
                <?php foreach ($purchase as $data) : ?>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItems">
                        Add Items
                    </button>

                    <a href="<?= base_url('purchase/pdf/') . $data['poid']; ?>" class="btn btn-danger" role="button" target="_blank"><i class="fa fa-print"></i> Print</a>

                    <!-- Button trigger modal -->



                    <div class="form-group row">

                        <div class="col">
                            <label for="poid" class="col-form-label">Purchase No</label>
                            <input type="text" class="form-control" id="poid" name="poid" value="<?= $data['poid']; ?>" readonly>
                            <small class="form-text text-danger"> <?= form_error('poid') ?></small>
                        </div>
                        <div class="col">
                            <label for="kontakid" class="col-form-label">Kontak</label>
                            <select class="form-control" id="kontakid" name="kontakid">
                                <?php foreach ($kontak as $u) : ?>
                                    <?php if ($data['kontakid'] == $u['kontakid']) : ?>
                                        <option value="<?= $u['kontakid'] ?>" selected><?= $u['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $u['kontakid'] ?>"><?= $u['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('kontakid') ?></small>
                        </div>
                        <div class="col">
                            <label for="tglbuat" class="col-form-label">tgl buat</label>
                            <input type="date" class="form-control datepicker" id="tglbuat" name="tglbuat" value="<?= $data['tglbuat']; ?>">
                            <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                        </div>
                        <div class="col">
                            <label for="tglbuat" class="col-form-label">tgl bayar</label>
                            <input type="date" class="form-control datepicker" id="tglbayar" name="tglbayar" value="<?= $data['tglbayar']; ?>">
                            <small class="form-text text-danger"> <?= form_error('tglbayar') ?></small>
                        </div>



                    </div>
                    <div class="form-row">


                        <div class="col">
                            <label for="note">status</label>
                            <select class="form-control" id="status" name="status">
                                <?php foreach ($status as $u) : ?>
                                    <?php if ($data['status'] == $u['id']) : ?>
                                        <option value="<?= $u['id'] ?>" selected><?= $u['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('status') ?></small>
                        </div>
                        <div class="col">
                            <label for="nopol">No Polisi</label>
                            <input type="text" class="form-control" id="nopol" name="nopol">
                            <small class="form-text text-danger"> <?= form_error('nopol') ?></small>
                        </div>
                        <div class="col">
                            <label for="noreff">No Referensi</label>
                            <input type="text" class="form-control" id="noreff" name="noreff">
                            <small class="form-text text-danger"> <?= form_error('noreff') ?></small>
                        </div>
                        <div class="col">
                            <label for="note">note</label>
                            <input type="text" class="form-control" id="note" name="note" value="<?= $data['note']; ?>">
                            <small class="form-text text-danger"> <?= form_error('note') ?></small>
                        </div>

                    </div>

                <?php endforeach; ?>
            </form>
            <br>

            <div class="table-responsive">
                <table id="dataTable" class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">PO</th>
                            <th scope="col">Nama Item</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $grandtotal = 0; ?>
                        <?php foreach ($purchasedetail as $data) : ?>
                            <?php $grandtotal = $grandtotal + ($data['quantity'] * $data['price']); ?>
                            <tr>
                                <td class="poid"><?= $data['poid']; ?></td>
                                <td><?= $data['itemsid']; ?></td>
                                <td class="text-right"><?= $data['quantity']; ?></td>
                                <td class="text-right"><?= number_format($data['price']); ?></td>
                                <td><?= $data['uomid']; ?></td>
                                <td class="text-right"><?= number_format($data['total']); ?></td>
                                <td>

                                    <a href="<?= base_url('purchase/') . 'deldetail/' . $data['poid'] . '/' . $data['itemsid']; ?>" id="<?= $data['itemsid']; ?>" name="delete" class="btn btn-sm btn-danger">del</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        <tr>
                            <td class="font-weight-bold text-right" colspan="5">Total Keseluruhan</td>
                            <td class="font-weight-bold text-right"><?= 'Rp.' . number_format($grandtotal); ?></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<!-- Modal -->
<div class="modal fade" id="addItems" tabindex="-1" role="dialog" aria-labelledby="addItemsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="insertform">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemsLabel">Add Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group" hidden>
                        <label for="poid1" class="col-form-label">poid:</label>
                        <input type="text" class="form-control" id="poid1" name="poid1" value="<?= $data['poid']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="itemsid">ItemsID</label>
                        <select class="form-control" id="itemsid" name="itemsid">
                            <?php foreach ($items as $u) : ?>
                                <option value="<?= $u['itemsid'] ?>"><?= $u['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"> <?= form_error('itemsid') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-form-label">quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">price:</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                    <div class="form-group">
                        <label for="uomid">uomid</label>
                        <select class="form-control" id="uomid" name="uomid">
                            <?php foreach ($uom as $u) : ?>
                                <option value="<?= $u['uomid'] ?>"><?= $u['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"> <?= form_error('uomid') ?></small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#insertform').on('submit', function(event) {
            event.preventDefault();
            if ($('#poid1').val() == '') {
                alert('poid tidak boleh kosong');
            } else if ($('#itemsid') == '') {
                alert('Items Id tidak boleh kosong');
            } else {
                $.ajax({
                    url: "<?= base_url('purchase/adddetail') ?>",
                    method: "post",
                    data: $('#insertform').serialize(),
                    success: function(data) {
                        //$('#insertform')[0].reset();
                        //$('#addItems').modal('hide');
                        //$('#dataTable').html(data);
                        window.location.reload();

                    }


                })

            }
        })

        $(document).on('click', "button[name='delete']", function() {
            var itemsid = $(this).attr("id");

            alert(poid);
            event.preventDefault();
        })
    });
</script>