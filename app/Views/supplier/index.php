<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <title>welcome supplier</title>
</head>

<body>
    <?php
    if (session()->getFlashdata('pesan') == true) { ?>
        <script>
            alert("berhasil tambah stok");
        </script>
    <?php } else if (session()->getFlashdata('pesan_hapus') == true) { ?>
        <script>
            alert("berhasil hapus data");
        </script>
    <?php } else if (session()->getFlashdata('pesan_edit') == true) { ?>
        <script>
            alert("berhasil edit data");
        </script>
    <?php } else if (session()->getFlashdata('pesan_tambah') == true) { ?>
        <script>
            alert("berhasil tambah data");
        </script>
    <?php }
    ?>
    <div class="container margin">
        <a href="<?php echo base_url('dashbord_supplier/re_supply') ?>" class="btn btn-secondary">Re-supply</a>
        <a href="<?php echo base_url('dashbord_supplier/add') ?>" class="btn btn-success"><i class="fas fa-plus"></i></a>
        <a class="btn btn-warning" href="<?php echo base_url('login/logout'); ?>">Log Out</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">nama barang</th>
                        <th scope="col">merek</th>
                        <th scope="col">stok</th>
                        <th scope="col">harga</th>
                        <th scope="col">tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 0;
                    foreach ($tampil_data as $row) {
                        $nomor++ ?>
                        <tr>
                            <th scope="row"><?php echo $nomor ?></th>
                            <td><?php echo $row->nama_laptop; ?></td>
                            <td><?php echo $row->merek; ?></td>
                            <td><?php echo $row->stok; ?></td>
                            <td><?php echo $row->harga; ?></td>
                            <td>
                                <button type=" button" onclick="hapus(<?php echo $row->id_laptop; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td>
                                <button type=" button" onclick="edit(<?php echo $row->id_laptop; ?>)" class="btn btn-primary"><i class="fas fa-edit"></i></i></button>
                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="/js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>