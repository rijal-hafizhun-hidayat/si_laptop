<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <title>Tambah Transaksi</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center margin">
            <div class="col-sm-8">
                <form method="POST" action="<?php echo base_url('dashbord_admin/simpan'); ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                        <input required type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea required class="form-control" placeholder="Asal..." id="floatingTextarea2" name="asal" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Asal</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Barang</label>
                        <select name="barang" class="form-select" aria-label="Default select example">
                            <?php
                            foreach ($tampil_data as $row) { ?>
                                <option value="<?php echo $row->id_laptop; ?>|<?php echo $row->harga; ?>|<?php echo $row->stok; ?>"><?php echo $row->nama_laptop; ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                        <input required type="number" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" value="simpan">simpan</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>