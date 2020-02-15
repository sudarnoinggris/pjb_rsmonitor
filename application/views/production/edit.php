<div class="container">


    <div class="card">
        <div class="card-header text-white bg-dark"><?= $subtitle ?></div>
        <div class="card-body">
            <!-- kolom -->
            <form method="post">
                <?php foreach ($production as $data) : ?>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItems">
                        Add Item
                    </button>
                    <a href="<?= base_url('production/pdf/') . $data['proid']; ?>" class="btn btn-danger" role="button" target="_blank"><i class="fa fa-print"></i> Print</a>


                    <div class="form-group row">

                        <div class="col">
                            <label for="proid" class="col-form-label">Production No</label>
                            <input type="text" class="form-control" placeholder="AUTO" id="proid" name="proid" value="<?= $data['proid']; ?>">
                            <small class="form-text text-danger"> <?= form_error('proid') ?></small>
                        </div>

                        <div class="col">
                            <label for="tglbuat" class="col-form-label">tglbuat</label>
                            <input type="date" class="form-control datepicker" placeholder="tglbuat" id="tglbuat" name="tglbuat" value="<?= $data['tglbuat']; ?>">
                            <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                        </div>

                        <div class="col">
                            <label for="note" class="col-form-label">note</label>
                            <input type="text" class="form-control datepicker" placeholder="note" id="note" name="note" value="<?= $data['note']; ?>">
                            <small class="form-text text-danger"> <?= form_error('note') ?></small>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="itemsid" class="col-form-label">Items</label>
                            <select class="form-control" id="itemsid" name="itemsid">
                                <?php foreach ($items as $u) : ?>
                                    <?php if ($data['itemsid'] == $u['itemsid']) : ?>
                                        <option value="<?= $u['itemsid'] ?>" selected><?= $u['name']; ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $u['itemsid'] ?>"><?= $u['name']; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('itemsid') ?></small>
                        </div>



                        <div class="col">
                            <label for="quantity" class="col-form-label">quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $data['quantity']; ?>">
                            <small class="form-text text-danger"> <?= form_error('quantity') ?></small>
                        </div>


                        <div class="col">
                            <label for="uomid" class="col-form-label">uomid</label>
                            <select class="form-control" id="uomid" name="uomid">
                                <?php foreach ($uom as $u) : ?>
                                    <?php if ($data['uomid'] == $u['uomid']) : ?>
                                        <option value="<?= $u['uomid'] ?>" selected><?= $u['name'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $u['uomid'] ?>"><?= $u['name'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('uomid') ?></small>
                        </div>

                    </div>

                <?php endforeach; ?>
            </form>

            <div class="table-responsive">
                <table id="dataTable" class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">PRO ID</th>
                            <th scope="col">Items</th>
                            <th scope="col">Persen</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productiondetail as $detail) : ?>
                            <tr>
                                <td><?= $detail['proid']; ?></td>
                                <td><?= $detail['itemsid']; ?></td>
                                <td><?= $detail['persen']; ?></td>
                                <td class="text-right"><?= $detail['quantity']; ?></td>
                                <td><?= $detail['uomid']; ?></td>

                                <td>
                                    <a href="<?= base_url('production/') . 'deldetail/' . $detail['proid'] . '/' . $data['itemsid']; ?>" id="<?= $data['itemsid']; ?>" name="delete" class="btn btn-sm btn-danger">del</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

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

                    <div class="form-group">
                        <label for="proid1" class="col-form-label">proid:</label>
                        <input type="text" class="form-control" id="proid1" name="proid1" value="<?= $data['proid']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="totalbahan" class="col-form-label">Total Bahan:</label>
                        <input type="number" class="form-control" id="totalbahan" name="totalbahan" value="<?= $data['quantity']; ?>">
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
                        <label for="persen" class="col-form-label">persen:</label>
                        <input type="text" class="form-control" id="persen" name="persen">
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
            if ($('#proid1').val() == '') {
                alert('proid tidak boleh kosong');
            } else if ($('#itemsid') == '') {
                alert('Items Id tidak boleh kosong');
            } else {
                alert("<?= base_url('production/adddetail') ?>");
                $.ajax({
                    url: "<?= base_url('production/adddetail') ?>",
                    method: "post",
                    data: $('#insertform').serialize(),
                    success: function(data) {
                        alert('OK');
                        //$('#insertform')[0].reset();
                        //$('#addItems').modal('hide');
                        //$('#dataTable').html(data);
                        window.location.reload();

                    }

                })

            }
        })
    });

    $(document).on('click', "button[name='delete']", function() {
        var itemsid = $(this).attr("id");
        alert(proid);
        event.preventDefault();
    })
</script>