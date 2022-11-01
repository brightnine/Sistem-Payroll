<?php 

session_start();
include 'connection.php';

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, trim(strtolower(htmlspecialchars($_POST['username']))));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

    // cek apakah ada kolom yang tidak terisi
    if($username == "" || $password == " "){
        echo "<script>
                alert('Pastikan semua kolom sudah terisi')
              </script>";
        header('refresh:0; index.php');
        return false;
    }

    // cek apakah akun sudah diverifikasi admin
    $cekVerifikasiAkun = mysqli_query($conn, "SELECT * FROM antrian_registrasi WHERE username = '$username'");
    if(mysqli_num_rows($cekVerifikasiAkun)=== 1){
        echo "<script>
                alert('Akun anda sedang dalam tahap verifikasi, silahkan tunggu atau hubungi admin!')
              </script>";
        header('refresh:0; login.php');
        return false;
    }

    // cek apakah akun sudah terdaftar di database
    $cekRegistrasiAkun = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($cekRegistrasiAkun) === 0){
        echo "<script>
                alert('Akun anda belum terdaftar!')
              </script>";
        header('refresh:0; login.php');
        return false;
    }

    // login akun 
    $user = mysqli_fetch_assoc($cekRegistrasiAkun);
    
    // cek apakah password salah
    if($password != password_verify($password, $user['password'])){
        echo "<script>
                alert('Password yang anda masukkan salah!')
              </script>";
        header('refresh: 0; login.php');
        return false;
    }

    if($user){
        if($username = $user['username']){
            if($password = password_verify($password, $user['password'])){
                if($user['jabatan'] = $user['jabatan']){
                    if($user['jabatan'] !== "admin"){
                        $_SESSION["employee"] = 1;
                        header("refresh:0; employee/index.php?user=$username");
                        return false;
                    }else{
                        $_SESSION["admin"] = 1;
                        header("refresh:0; admin/index.php?user=$username");
                        return false;
                    }
                }
            }
        }
    }
}
?>