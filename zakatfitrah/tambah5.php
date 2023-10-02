<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id		    = $_POST['id'];
			$nama	    = $_POST['nama'];
			$kategori	= $_POST['kategori'];
            $hak	    = $_POST['hak'];

			$cek = mysqli_query($koneksi, "SELECT * FROM mustahik_lainnya WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mustahik_lainnya(id, nama, kategori, hak) VALUES('$id', '$nama', '$kategori', '$hak')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil5";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah5" method="post">
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
                <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
                <div class="col-md-6 col-sm-6">
                    <select name="kategori" class="form-control" required>
                        <option value="">Kategori</option>
                        <option value="Amil">Amil</option>
                        <option value="Fi Sabilillah">Fi Sabilillah</option>
                        <option value="Mualaf">Mualaf</option>
                        <option value="Ibnu Sabil">Ibnu Sabil</option>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Hak</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="hak" class="form-control" required>
                </div>
            </div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
