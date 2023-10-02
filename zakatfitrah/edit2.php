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
			$select = mysqli_query($koneksi, "SELECT * FROM mustahik WHERE id='$id'") or die(mysqli_error($koneksi));

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
			$nama_kategori		  = $_POST['nama_kategori'];
			$jumlah_hak	= $_POST['jumlah_hak'];

			$sql = mysqli_query($koneksi, "UPDATE mustahik SET nama_kategori='$nama_kategori', jumlah_hak='$jumlah_hak' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil2";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit2&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kategori</label>
                <div class="col-md-6 col-sm-6">
                    <select name="nama_kategori" class="form-control" required>
                        <option value="">Nama Kategori</option>
                        <option value="Fakir">Fakir</option>
                        <option value="Miskin">Miskin</option>
                        <option value="Amil">Amil</option>
                        <option value="Muallaf">Muallaf</option>
                        <option value="Riqab">Riqab</option>
                        <option value="Gharim">Gharim</option>
                        <option value="Fi Sabilillah">Fi Sabilillah</option>
                        <option value="Ibnu Sabil">Ibnu Sabil</option>
                    </select>
                </div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Hak</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jumlah_hak" class="form-control" value="<?php echo $data['jumlah_hak']; ?>" required>
                </div>
            </div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil2" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
