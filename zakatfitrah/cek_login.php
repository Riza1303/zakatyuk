<?php
/* nama server kita */
$servername = "localhost";

/* nama database kita */
$database = "zakatfitrah";

/* nama user yang terdaftar pada database (default: root) */
$username = "root";

/* password yang terdaftar pada database (default : "") */
$password = "";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if (!$conn) {
    die("Maaf koneksi anda gagal : " . mysqli_connect_error());
}else{
    echo "";
}


if(isset($_POST["tujuan"])){

    $tujuan = $_POST["tujuan"];

    if($tujuan == "LOGIN"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query_sql = "SELECT * FROM tbl_pendaftaran 
                                   WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $query_sql);

        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Selamat Datang, ".$username."!')</script>";
            echo "<meta http-equiv='refresh' content='1 url=index.php'>";
        }else{
            echo "<script>alert('Username atau Password Salah!')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
        }

    }else{
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $query_sql = "INSERT INTO tbl_pendaftaran (username, password, email) 
                                               VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $query_sql)) {
            echo "<script>alert('Username $username berhasil terdaftar')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
        } else {
            echo "Pendaftaran Gagal : " . mysqli_error($conn);
        }
    }
}


// tutup koneksi
mysqli_close($conn);
?>