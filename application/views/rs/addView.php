<div class="container">
    <div class="row mt-3">
        <div class="col-md">

            <div class="card">
                <h5 class="card-header text-white bg-success"><?= $subtitle ?></h5>
                <div class="card-body">

              

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text text-danger"> <?= form_error('name') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Alamat</label>
                            <input type="text" class="form-control" id="password" name="password">
                            <small class="form-text text-danger"> <?= form_error('password') ?></small>
                        </div>
 
 
                        <div class="form-group">
                            <label for="level">Telp</label>
                            <input type="text" class="form-control" id="level" name="level">
                            <small class="form-text text-danger"> <?= form_error('level') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Email</label>
                            <input type="text" class="form-control" id="is_active" name="is_active">
                            <small class="form-text text-danger"> <?= form_error('is_active') ?></small>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>