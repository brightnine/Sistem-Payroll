<?php 

include 'connection.php';

if(isset($_POST['registrasi'])){
    $username = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['username']))));
    $email = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['email']))));
    $password = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['password']))));
    $confirmPassword = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['confirmPassword']))));

    // cek apakah ada kolom yang kosong
    if($username === " " || $password === " " || $email === "" || $confirmPassword === " "){
        echo "<script>
                alert('Pastikan semua kolom telah terisi!!')
              </script>";
        header('refresh:0; registrasi.php');
        return false;
    }

    // cek apakah konfirmasi password sama
    if($password != $confirmPassword){
        echo "<script>
                alert('Konfirmasi Password tidak sesuai!!');
              </script>";
        header('refresh:0; registrasi.php');
        return false;
    }

    // cek apakah username sudah pernah dibuat
    $checkUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if ( mysqli_fetch_assoc($checkUsername)){
        echo "<script>
                alert ('Username sudah ada, silahkan pilih username yang lain')
              </script>";
        header ('refresh:0; registrasi.php');
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert data ke antrian_registrasi
    $registrasi = mysqli_query($conn, "INSERT INTO antrian_registrasi
                                       VALUES(null, '$username', '$email', '$password')");
    if($registrasi){
        echo "<script>
                alert('Akun anda berhasil ditambahkan, silahkan tunggu konfirmasi admin')   
             </script>";
        header('refresh:0; login.php');
    }
}

?>