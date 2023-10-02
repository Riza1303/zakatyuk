<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM muzakki WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama		  = $_POST['nama'];
			$jumlah_tanggungan	= $_POST['jumlah_tanggungan'];
			$keterangan	= $_POST['keterangan'];

			$sql = mysqli_query($koneksi, "UPDATE muzakki SET nama='$nama', jumlah_tanggungan='$jumlah_tanggungan', keterangan='$keterangan' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Tanggungan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jumlah_tanggungan" class="form-control" value="<?php echo $data['jumlah_tanggungan']; ?>" required>
                </div>
            </div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-md-6 col-sm-6">
					<select name="keterangan" class="form-control" required>
						<option value="">Pilih Keterangan</option>
						<option value="Sudah Diserahkan" <?php if($data['keterangan'] == 'Sudah Diserahkan'){ echo 'selected'; } ?>>Sudah Diserahkan</option>
						<option value="Belum Diserahkan" <?php if($data['keterangan'] == 'Belum Diserahkan'){ echo 'selected'; } ?>>Belum Diserahkan</option>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
