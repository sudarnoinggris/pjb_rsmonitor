<div class="container">
    <div class="row mt-3">
        <div class="col-md">

            <div class="card">
                <h5 class="card-header text-white bg-success"><?= $subtitle ?></h5>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="userid">Kode Distrik</label>
                            <input type="text" class="form-control" id="userid" name="userid">
                            <small class="form-text text-danger"> <?= form_error('userid') ?></small>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text text-danger"> <?= form_error('name') ?></small>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>