<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <h5 class="card-header text-white bg-success"><?= $subtitle ?></h5>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="userid">UserID</label>
                            <input type="text" class="form-control" id="userid" name="userid">
                            <small class="form-text text-danger"> <?= form_error('userid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text text-danger"> <?= form_error('name') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="text" class="form-control" id="password" name="password">
                            <small class="form-text text-danger"> <?= form_error('password') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <small class="form-text text-danger"> <?= form_error('email') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="telp">telp</label>
                            <input type="text" class="form-control" id="telp" name="telp">
                            <small class="form-text text-danger"> <?= form_error('telp') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <small class="form-text text-danger"> <?= form_error('alamat') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="level">level</label>
                            <input type="text" class="form-control" id="level" name="level">
                            <small class="form-text text-danger"> <?= form_error('level') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="is_active">is_active</label>
                            <input type="text" class="form-control" id="is_active" name="is_active">
                            <small class="form-text text-danger"> <?= form_error('is_active') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="text" class="form-control" id="image" name="image">
                            <small class="form-text text-danger"> <?= form_error('image') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tglbuat">tglbuat</label>
                            <input type="text" class="form-control" id="tglbuat" name="tglbuat">
                            <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>