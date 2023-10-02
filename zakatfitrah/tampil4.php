<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Distribusi Zakat Fitrah Warga</font></center>
		<hr>
		<a href="index.php?page=tambah4"><button class="btn btn-dark right">Tambah Data</button></a>
		<a href="cetak2.php" target="_blank"><button class="btn btn-dark right">Cetak</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Kategori</th>
                    <th>Hak</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mustahik_warga ORDER BY id DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['nama'].'</td>
							<td>'.$data['kategori'].'</td>
							<td>'.$data['hak'].'</td>						
							<td>
								<a href="index.php?page=edit4&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete4.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
