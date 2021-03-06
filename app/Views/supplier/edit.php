<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <title>re-supply</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center margin">
            <div class="col-sm-8">
                <form action="<?php echo base_url("dashbord_supplier/update/$id"); ?>" method="post">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">nama laptop</label>
                            <input type="text" value="<?php echo $nama; ?>" name="nama_laptop" class="form-control" placeholder="re-supply">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">jumlah stok</label>
                        <input type="number" value="<?php echo $stok; ?>" name="jumlah_stok" class="form-control" placeholder="re-supply">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">merek</label>
                        <input type="text" value="<?php echo $merek; ?>" name="merek" class="form-control" placeholder="re-supply">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">harga</label>
                        <input type="number" value="<?php echo $harga; ?>" name="harga" class="form-control" placeholder="re-supply">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="masuk" value="simpan" class="btn btn-primary">edit data</button>
                    </div>
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