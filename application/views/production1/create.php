<div class="container">


    <div class="card">
        <div class="card-header text-white bg-dark"><?= $subtitle ?></div>

        <div class="card-body">
            <form method="post">

                <!-- kolom -->
                <button type="submit" class="btn btn-primary">Save</button>
                <div class="form-group row">
                    <div class="col">
                        <label for="proid" class="col-form-label">Production No</label>
                        <input type="text" class="form-control" placeholder="AUTO" id="proid" name="proid">
                        <small class="form-text text-danger"> <?= form_error('proid') ?></small>
                    </div>
                    <div class="col">
                        <label for="tglbuat" class="col-form-label">tglbuat</label>
                        <input type="date" class="form-control datepicker" id="tglbuat" name="tglbuat" value="<?= date('Y-m-d'); ?>">
                        <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                    </div>
                    <div class="col">
                        <label for="note" class="col-form-label">note</label>
                        <input type="text" class="form-control" id="note" name="note">
                        <small class="form-text text-danger"> <?= form_error('note') ?></small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="itemsid" class="col-form-label">Items</label>
                        <select class="form-control" id="itemsid" name="itemsid">
                            <?php foreach ($items as $u) : ?>
                                <option value="<?= $u['itemsid'] ?>"><?= $u['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"> <?= form_error('itemsid') ?></small>
                    </div>



                    <div class="col">
                        <label for="quantity" class="col-form-label">quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                        <small class="form-text text-danger"> <?= form_error('quantity') ?></small>
                    </div>


                    <div class="col">
                        <label for="uomid" class="col-form-label">uomid</label>
                        <select class="form-control" id="uomid" name="uomid">
                            <?php foreach ($uom as $u) : ?>
                                <option value="<?= $u['uomid'] ?>"><?= $u['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"> <?= form_error('uomid') ?></small>
                    </div>

                </div>
            </form>
        </div>
    </div>


</div>