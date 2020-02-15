<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <?php foreach ($productiondetail as $data) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="proid">PO NO</label>
                                <input type="text" class="form-control" id="proid" name="proid" value="<?= $data['proid'] ?>">
                                <small class="form-text text-danger"> <?= form_error('proid') ?></small>
                            </div>


                            <div class="form-group">
                                <label for="itemsid">itemsid</label>
                                <select class="form-control" id="itemsid" name="itemsid">
                                    <?php foreach ($items as $u) : ?>
                                        <?php if ($data['itemsid'] == $u['itemsid']) : ?>
                                            <option value="<?= $u['itemsid']; ?>" selected><?= $u['name']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $u['itemsid']; ?>"><?= $u['name']; ?>
                                            </option>
                                        <?php endif; ?>


                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"> <?= form_error('itemsid') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="quantity">quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $data['quantity'] ?>">
                                <small class="form-text text-danger"> <?= form_error('quantity') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?= $data['price'] ?>">
                                <small class="form-text text-danger"> <?= form_error('price') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="uomid">uomid</label>
                                <select class="form-control" id="uomid" name="uomid">
                                    <?php foreach ($uom as $u) : ?>
                                        <?php if ($data['uomid'] == $u['uomid']) : ?>
                                            <option value="<?= $u['uomid']; ?>" selected><?= $u['name']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $u['uomid']; ?>"><?= $u['name']; ?>
                                            </option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"> <?= form_error('uomid') ?></small>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>