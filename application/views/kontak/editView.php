<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header text-white bg-success"><?= $subtitle ?></h5>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($kontak as $data) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="kontakid">Kode</label>
                                <input type="text" class="form-control" id="kontakid" name="kontakid" value="<?= $data['kontakid']; ?>">
                            </div>

                            <div class=" form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
                                <small class="form-text text-danger"> <?= form_error('alamat') ?></small>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cust" name="cust" <?php if ($data['cust']) echo "checked"; ?>>
                                <label class=" form-check-label" for="cust">Customer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="supp" name="supp" <?php if ($data['supp']) echo "checked"; ?>>
                                <label class="form-check-label" for="supp">Supplier</label>
                            </div>
                            <div class="form-group">
                                <label for="person">Kontak Person</label>
                                <input type="text" class="form-control" id="person" name="person" value="<?= $data['person']; ?>">
                                <small class="form-text text-danger"> <?= form_error('person') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="person">Telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp']; ?>">
                                <small class="form-text text-danger"> <?= form_error('telp') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="person">Note</label>
                                <input type="text" class="form-control" id="note" name="note" value="<?= $data['note']; ?>">
                                <small class="form-text text-danger"> <?= form_error('note') ?></small>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>