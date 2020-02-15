<div class="container">
    <div class="row mt-3">
        <div class="col-md">


            <div class="card">
                <div class="card-header text-white bg-dark"><?= $subtitle ?></div>
                <div class="card-body">
                    <form action="" method="post">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <!-- kolom -->
                        <div class="form-group row">

                            <div class="col">
                                <label for="poid" class="col-form-label">Purchase No</label>
                                <input type="text" class="form-control" placeholder="AUTO" id="poid" name="poid" readonly>
                                <small class="form-text text-danger"> <?= form_error('poid') ?></small>
                            </div>
                            <div class="col">
                                <label for="kontakid" class="col-form-label">Kontak</label>
                                <select class="form-control" id="kontakid" name="kontakid">
                                    <?php foreach ($kontak as $u) : ?>
                                        <option value="<?= $u['kontakid'] ?>"><?= $u['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"> <?= form_error('kontakid') ?></small>
                            </div>
                            <div class="col">
                                <label for="tglbuat" class="col-form-label">Tgl Buat</label>
                                <input type="date" class="form-control datepicker" id="tglbuat" name="tglbuat" value="<?= date('Y-m-d'); ?>">
                                <small class="form-text text-danger"> <?= form_error('tglbuat') ?></small>
                            </div>

                            <div class="col">
                                <label for="tglbayar" class="col-form-label">Tgl Bayar</label>
                                <input type="date" class="form-control" id="tglbayar" name="tglbayar" value="<?= date('Y-m-d'); ?>">
                                <small class=" form-text text-danger"> <?= form_error('tglbayar') ?></small>
                            </div>

                        </div>

                        <!-- kolom -->
                        <div class="form-row">


                            <div class="col">
                                <label for="status">status</label>
                                <select class="form-control" id="status" name="status">
                                    <?php foreach ($status as $u) : ?>
                                        <option value="<?= $u['id'] ?>"><?= $u['name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"> <?= form_error('status') ?></small>
                            </div>
                            <div class="col">
                                <label for="nopol">No Polisi</label>
                                <input type="text" class="form-control" id="nopol" name="nopol">
                                <small class="form-text text-danger"> <?= form_error('nopol') ?></small>
                            </div>
                            <div class="col">
                                <label for="noreff">No Referensi</label>
                                <input type="text" class="form-control" id="noreff" name="noreff">
                                <small class="form-text text-danger"> <?= form_error('noreff') ?></small>
                            </div>
                            <div class="col">
                                <label for="note">note</label>
                                <input type="text" class="form-control" id="note" name="note">
                                <small class="form-text text-danger"> <?= form_error('note') ?></small>
                            </div>



                        </div>



                    </form>



                </div>


            </div>

        </div>
    </div>
</div>




<script type="text/javascript">
    $(document).ready(function() {

        let i = 0;
        $("#btnaddbarang").click(function() {
            let nilai = $("#select-barang").val();

            // alert('Does this work?');
            html = '<tr id="row' + i + '">';
            html += '<td>tes</td>';
            html += '<td>' + nilai + '</td>'; //items
            html += '<td class="text-center" style="width: 100px"><input type="text" name="quantity[' + i + ']" value="1" class="form-control text-center input-jumlah priceformat"></td>';
            html += '<td class="text-center" style="width: 100px"><input type="text" name="price[' + i + ']" value="1" class="form-control text-center input-jumlah priceformat"></td>';
            html += '<td>tes</td>';
            html += '<td class="text-center" style="width: 100px"><input type="text" name="total[' + i + ']" value="1" class="form-control text-center input-jumlah priceformat"></td>';
            html += '<td class="text-center"><button type="button" class="hapus-row btn btn-sm btn-danger" onclick="test();"> <i class="fa fa-minus"></i></button></td>';
            html += '</tr>';
            $('#dataTable tbody').append(html);
            //$('#list-barang tbody tr:last-child .input-jumlah').focus();
            //onclick="test();"
            i++;

        });


    });

    $(document).on('click', '.hapus-row', function() {
        //alert('tes');
        $(this).parents('tr').remove();

    });

    function test(self) {
        if (confirm('Apakah kamu menghapus data ?')) {

            //var barangCount = $('#list-barang tbody').children();
            $(document).on('click', '.hapus-row', function() {
                //alert('tes');
                $(this).parents('tr').remove();

            });


        } else {
            alert('NO');
        }

    }
</script>