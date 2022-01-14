<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
            height: 20px;
            margin: 8px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th><strong>no</strong></th>
            <th><strong>nama</strong></th>
            <th><strong>asal pembeli</strong></th>
            <th><strong>barang</strong></th>
            <th><strong>tanggal transaksi</strong></th>
            <th><strong>jumlah</strong></th>
            <th><strong>total</strong></th>
        </tr>
        <?php
        $nomor = 0;
        foreach ($tampil_data as $row) {
            $nomor++ ?>
            <tr>
                <th><?php echo $nomor; ?></th>
                <th><?php echo $row->nama_pembeli; ?></th>
                <th><?php echo $row->asal_pembeli; ?></th>
                <th><?php echo $row->nama_laptop; ?></th>
                <th><?php echo $row->tgl_transaksi; ?></th>
                <th><?php echo $row->jumlah_beli; ?></th>
                <th><?php echo $row->total; ?></th>
            </tr>
        <?php }
        ?>
    </table>

</body>

</html>