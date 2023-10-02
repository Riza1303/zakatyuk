<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			    = $_POST['id'];
			$nama_kk	    = $_POST['nama_kk'];
			$jml_tanggungan	= $_POST['jml_tanggungan'];
            $jenis_bayar	= $_POST['jenis_bayar'];
            $jml_dibayar	= $_POST['jml_dibayar'];
            $bayar_beras	= $_POST['bayar_beras'];
            $bayar_uang	    = $_POST['bayar_uang'];

			$cek = mysqli_query($koneksi, "SELECT * FROM bayar_zakat WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO bayar_zakat(id, nama_kk, jml_tanggungan, jenis_bayar, jml_dibayar, bayar_beras, bayar_uang) VALUES('$id', '$nama_kk', '$jml_tanggungan', '$jenis_bayar', '$jml_dibayar', '$bayar_beras', '$bayar_uang')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil3";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah3" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama KK</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_kk" class="form-control" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Tanggungan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jml_tanggungan" class="form-control" required>
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
                    <input type="text" name="jml_dibayar" class="form-control" required>
                </div>
            </div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Beras</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="bayar_beras" class="form-control" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Uang</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="bayar_uang" class="form-control" required>
                </div>
            </div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
