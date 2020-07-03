<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
  

    <div class='row'>
        <div class='col-lg'>
            <div class="card">
                <h5 class="card-header text-white bg-success"><?= $title; ?></h5>
                <div class="card-body">
                <form class="navbar-search">
                   
                    <div class="input-group">
                        
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian data tertanggung..." aria-label="Search" aria-describedby="basic-addon2">
                    
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                    
                </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>