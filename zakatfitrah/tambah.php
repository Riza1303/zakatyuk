<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$nama			= $_POST['nama'];
			$jumlah_tanggungan	= $_POST['jumlah_tanggungan'];
			$keterangan		= $_POST['keterangan'];

			$cek = mysqli_query($koneksi, "SELECT * FROM muzakki WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO muzakki(id, nama, jumlah_tanggungan, keterangan) VALUES('$id', '$nama', '$jumlah_tanggungan', '$keterangan')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Tanggungan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jumlah_tanggungan" class="form-control" required>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-md-6 col-sm-6">
					<select name="keterangan" class="form-control" required>
						<option value="">Keterangan</option>
						<option value="Sudah Diserahkan">Sudah Diserahkan</option>
						<option value="Belum Diserahkan">Belum Diserahkan</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
