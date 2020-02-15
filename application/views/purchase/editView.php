<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <?php foreach ($purchase as $data) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="poid">PO NO</label>
                                <input type="text" class="form-control" id="poid" name="poid" value="<?= $data['poid']; ?>">
                                <small class="form-text text-danger"> <?= form_error('poid') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tglbuat">tglbuat</label>
                                <input type="text" class="form-control" id="tglbuat" name="tglbuat" value="<?= $data['tglbuat']; ?>">
                                <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tglbayar">tglbayar</label>
                                <input type="text" class="form-control" id="tglbayar" name="tglbayar" value="<?= $data['tglbayar']; ?>">
                                <small class="form-text text-danger"> <?= form_error('tglbayar') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="createby">createby</label>
                                <input type="text" class="form-control" id="createby" name="createby" value="<?= $data['createby']; ?>">
                                <small class="form-text text-danger"> <?= form_error('createby') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="note">note</label>
                                <input type="text" class="form-control" id="note" name="note" value="<?= $data['note']; ?>">
                                <small class="form-text text-danger"> <?= form_error('note') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="kontakid">Kontak</label>
                                <select class="form-control" id="kontakid" name="kontakid">
                                    <?php foreach ($kontak as $u) : ?>
                                        <?php if ($data['kontakid'] == $u['kontakid']) : ?>
                                            <option value="<?= $u['kontakid']; ?>" selected><?= $u['name']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $u['kontakid']; ?>"><?= $u['name']; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"> <?= form_error('kontakid') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="status">status</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?= $data['status']; ?>">
                                <small class="form-text text-danger"> <?= form_error('status') ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>