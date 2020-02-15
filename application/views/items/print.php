<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title><?= $title ?></title>
    <style type="text/css">

    </style>
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class='row'>
            <div class='col-lg'>

                <div class="card">
                    <div class="card-header text-white bg-primary">

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>

                                        <th scope="col">ItemsID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Beli Terakhir</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($items as $data) : ?>
                                        <tr>
                                            <td><?= $data['itemsid']; ?></td>
                                            <td><?= $data['name']; ?></td>
                                            <td><?= $data['uomid']; ?></td>
                                            <td><?= $data['itemsgroupid']; ?></td>
                                            <td><?= $data['hargabeli']; ?></td>
                                            <td><?= $data['hargajual']; ?></td>
                                            <td><?= $data['hargabeliterakhir']; ?></td>


                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</body>

</html>