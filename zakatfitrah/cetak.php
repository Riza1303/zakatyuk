<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengumpulan Zakat Fitrah</title>
</head>

<body>

    <center>

        <h2>Laporan Pengumpulan Zakat Fitrah</h2>

    </center>

    <?php
    include 'config.php';
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah Tanggungan</th>
            <th>Jumlah Beras</th>
            <th>Jumlah Uang</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM bayar_zakat ORDER BY id DESC") or die(mysqli_error($koneksi));
        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
        if (mysqli_num_rows($sql) > 0) {
            //membuat variabel $no untuk menyimpan nomor urut
            $no = 1;
            //melakukan perulangan while dengan dari dari query $sql
            while ($data = mysqli_fetch_assoc($sql)) {
                //menampilkan data perulangan
                echo '
                <tr>
                    <td>' . $data['id'] . '</td>
                    <td>' . $data['nama_kk'] . '</td>
                    <td>' . $data['jml_tanggungan'] . '</td>
                    <td>' . $data['bayar_beras'] . '</td>
                    <td>' . $data['bayar_uang'] . '</td>							
                </tr>
                ';
                $no++;
            }
            //jika query menghasilkan nilai 0
        } else {
            echo '
            <tr>
                <td colspan="6">Tidak ada data.</td>
            </tr>
            ';
        }
        ?>
        <tbody>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>