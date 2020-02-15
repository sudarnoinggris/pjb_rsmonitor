<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <h5 class="card-header"><?= $subtitle ?></h5>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="poid">PO NO</label>
                            <input type="text" class="form-control" id="poid" name="poid">
                            <small class="form-text text-danger"> <?= form_error('poid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="tglbuat">tglbuat</label>
                            <input type="text" class="form-control" id="tglbuat" name="tglbuat">
                            <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tglbayar">tglbayar</label>
                            <input type="text" class="form-control" id="tglbayar" name="tglbayar">
                            <small class="form-text text-danger"> <?= form_error('tglbayar') ?></small>
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
                            <label for="kontakid">kontakid</label>
                            <select class="form-control" id="kontakid" name="kontakid">
                                <?php foreach ($kontak as $u) : ?>
                                    <option value="<?= $u['kontakid'] ?>"><?= $u['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= form_error('kontakid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
                            <input type="text" class="form-control" id="status" name="status">
                            <small class="form-text text-danger"> <?= form_error('status') ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>