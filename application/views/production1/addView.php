<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="proid">PO NO</label>
                            <input type="text" class="form-control" id="proid" name="proid">
                            <small class="form-text text-danger"> <?= form_error('proid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="tglbuat">tglbuat</label>
                            <input type="text" class="form-control" id="tglbuat" name="tglbuat">
                            <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="createby">createby</label>
                            <input type="text" class="form-control" id="createby" name="createby">
                            <small class="form-text text-danger"> <?= form_error('createby') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="note">note</label>
                            <input type="text" class="form-control" id="note" name="note">
                            <small class="form-text text-danger"> <?= form_error('note') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="itemsid">itemsid</label>
                            <select class="form-control" id="itemsid" name="itemsid">
                                <?php foreach ($items as $u) : ?>
                                    <option value="<?= $u['itemsid'] ?>"><?= $u['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('itemsid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="quantity">quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                            <small class="form-text text-danger"> <?= form_error('quantity') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="text" class="form-control" id="price" name="price">
                            <small class="form-text text-danger"> <?= form_error('price') ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>