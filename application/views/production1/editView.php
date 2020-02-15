<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <?php foreach ($production as $data) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="proid">PRO NO</label>
                                <input type="text" class="form-control" id="proid" name="proid" value=<?= $data['proid']; ?>>
                                <small class="form-text text-danger"> <?= form_error('proid') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="tglbuat">tglbuat</label>
                                <input type="text" class="form-control" id="tglbuat" name="tglbuat" value=<?= $data['tglbuat']; ?>>
                                <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="createby">createby</label>
                                <input type="text" class="form-control" id="createby" name="createby" value=<?= $data['createby']; ?>>
                                <small class="form-text text-danger"> <?= form_error('createby') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="note">note</label>
                                <input type="text" class="form-control" id="note" name="note" value=<?= $data['note']; ?>>
                                <small class="form-text text-danger"> <?= form_error('note') ?></small>
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
                                <input type="text" class="form-control" id="quantity" name="quantity" value=<?= $data['quantity']; ?>>
                                <small class="form-text text-danger"> <?= form_error('quantity') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="text" class="form-control" id="price" name="price" value=<?= $data['price']; ?>>
                                <small class="form-text text-danger"> <?= form_error('price') ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>