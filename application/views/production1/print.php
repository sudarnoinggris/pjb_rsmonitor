<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
        }

        .column {
            float: left;
            width: 50%;

        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .fontbesar {
            font-size: 25px;
        }
    </style>
</head>

<body>

    <div class="fontbesar">
        <img src="<?= base_url('assets/img/') . 'logo_mini.jpg'; ?>">CV. Pajangan Batu Persada
    </div>
    <div>Alamat</div>
    <hr width="100%" align="center">
    <h3 align="center"> <?= $title ?></h3>
    <?php foreach ($production as $p) : ?>
        <div class="row">
            <div class="column">
                <p> No Produksi : <?= $p['proid']; ?></p>
                <p> No Polisi :</p>
            </div>

            <div class="column">
                <p>Tanggal : <?= $p['tglbuat']; ?></p>
                <p>Qty Bahan : <?= $p['quantity']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>


    <table>
        <thead>
            <tr border-bottom="1px solid #000" ;>
                <th align="left">ItemsID</th>
                <th align="left">Nama</th>
                <th align="left">quantity</th>
                <th align="left">Satuan</th>
                <th align="left">price</th>
                <th align="left">Total</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($productiondetail as $data) : ?>
                <tr>
                    <td><?= $data['itemsid']; ?></td>
                    <td><?= $data['itemsid']; ?></td>
                    <td><?= $data['quantity']; ?></td>
                    <td><?= $data['uomid']; ?></td>
                    <td><?= $data['price']; ?></td>
                    <td><?= $data['price'] * $data['quantity']; ?></td>
                </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="5" align="center">Grand Total </td>
                <td>Total</td>
            </tr>
        </tbody>
    </table>





</body>

</html>