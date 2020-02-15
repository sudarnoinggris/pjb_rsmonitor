<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="soid">SO NO</label>
                            <input type="text" class="form-control" id="soid" name="soid">
                            <small class="form-text text-danger"> <?= form_error('soid') ?></small>
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

                        <div class="form-group">
                            <label for="total">total</label>
                            <input type="text" class="form-control" id="total" name="total">
                            <small class="form-text text-danger"> <?= form_error('total') ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>