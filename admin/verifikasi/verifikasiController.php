<?php 
include '../../connection.php';

if(isset($_POST['verifikasi'])){
    $username = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['username']))));
    $email = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['email']))));
    $jabatan = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['jabatan']))));

    // cek apakah ada kolom yang kosong
    if($username == " " || $email == " " || $jabatan == " "){
        echo "<script>
                alert('Pastikan semua kolom sudah terisi')
              </script>";
        return false;
    }

    // buka enkripsi password
    $ambilData = mysqli_query($conn, "SELECT * FROM antrian_registrasi WHERE username = '$username'");
    $data = mysqli_fetch_assoc($ambilData);

    $password = $data['password'];

    // insert data menuju tabel user supaya bisa login
    $verifikasiAkun = mysqli_query($conn, "INSERT INTO user 
                                           VALUES(null, '$username', '$password', '$email', '$jabatan')");
    
    if($verifikasiAkun){
        // delete data dari tabel antrian_registrasi
        $deleteData = mysqli_query($conn, "DELETE FROM antrian_registrasi WHERE username = '$username'");
        echo "<script>
                alert('Akun telah berhasil diverifikasi, silahkan login')
              </script>";
        header('refresh:0; ../../login.php');
        return false;
    }
}

?>