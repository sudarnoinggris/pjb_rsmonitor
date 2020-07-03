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
                    <?php foreach ($user as $data) : ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="userid">nid</label>
                                <input type="text" class="form-control" id="userid" name="userid" value="<?= $data['userid']; ?>">
                                <small class="form-text text-danger"> <?= form_error('userid') ?></small>
                            </div>

                            <div class=" form-group">
                                <label for="name">Nama Pegawai</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>">
                                <small class="form-text text-danger"> <?= form_error('name') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Alamat</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $data['password']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('password') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Distrik</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('email') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="telp">telp</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['telp']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('telp') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Foto</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('alamat') ?></small>
                            </div>
        
    
                            <div class="form-group">
                                <label for="image">image</label>
                                <input type="text" class="form-control" id="image" name="image" value="<?= $data['image']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('image') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tglbuat">tglbuat</label>
                                <input type="text" class="form-control" id="tglbuat" name="tglbuat" value="<?= $data['tglbuat']; ?>">
                                <small class=" form-text text-danger"> <?= form_error('tglbuat') ?></small>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

</div>