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
			$select = mysqli_query($koneksi, "SELECT * FROM bayar_zakat WHERE id='$id'") or die(mysqli_error($koneksi));

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
            $nama_kk	    = $_POST['nama_kk'];
            $jml_tanggungan	= $_POST['jml_tanggungan'];
            $jenis_bayar	= $_POST['jenis_bayar'];
            $jml_dibayar	= $_POST['jml_dibayar'];
            $bayar_beras	= $_POST['bayar_beras'];
            $bayar_uang	    = $_POST['bayar_uang'];

			$sql = mysqli_query($koneksi, "UPDATE bayar_zakat SET nama_kk='$nama_kk', jml_tanggungan='$jml_tanggungan', jenis_bayar='$jenis_bayar', jml_dibayar='$jml_dibayar', bayar_beras='$bayar_beras', bayar_uang='$bayar_uang' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil3";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit3&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama KK</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_kk" class="form-control" value="<?php echo $data['nama_kk']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Tanggungan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jml_tanggungan" class="form-control" value="<?php echo $data['jml_tanggungan']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Bayar</label>
                <div class="col-md-6 col-sm-6">
                    <select name="jenis_bayar" class="form-control" required>
                        <option value="">Jenis Bayar</option>
                        <option value="Beras">Beras</option>
                        <option value="Uang">Uang</option>
                    </select>
                </div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Tanggungan yang Dibayar</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jml_dibayar" class="form-control" value="<?php echo $data['jml_dibayar']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Beras</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="bayar_beras" class="form-control" value="<?php echo $data['bayar_beras']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Uang</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="bayar_uang" class="form-control" value="<?php echo $data['bayar_uang']; ?>" required>
                </div>
            </div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil3" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
