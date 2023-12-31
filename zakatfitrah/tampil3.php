<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Pengumpulan Zakat Fitrah</font></center>
		<hr>
		<a href="index.php?page=tambah3"><button class="btn btn-dark right">Tambah Data</button></a>
		<a href="cetak.php" target="_blank"><button class="btn btn-dark right">Cetak</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama KK</th>
					<th>Jml Tanggungan</th>
                    <th>Jenis Bayar</th>
                    <th>Jml Tanggungan yang Dibayar</th>
                    <th>Jml Beras</th>
                    <th>Jml Uang</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM bayar_zakat ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id'].'</td>
							<td>'.$data['nama_kk'].'</td>
							<td>'.$data['jml_tanggungan'].'</td>
							<td>'.$data['jenis_bayar'].'</td>
							<td>'.$data['jml_dibayar'].'</td>
							<td>'.$data['bayar_beras'].'</td>
							<td>'.$data['bayar_uang'].'</td>							
							<td>
								<a href="index.php?page=edit3&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete3.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
