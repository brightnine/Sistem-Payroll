<!-- php script -->
<?php 

session_start();

if(!isset($_SESSION['admin'])){
    echo "<script>
            alert('Silahkan login terlebih dahulu')
          </script>";
    header('refresh:0; ../login.php');
    return false;
}

include '../connection.php';

// select database dari table antrian
$cekAntrian = mysqli_query($conn, "SELECT * FROM antrian_registrasi");

$rows = [];
while($row= mysqli_fetch_assoc($cekAntrian)){
    $rows[] = $row; 
}

$cekSemuaAntrian = $rows;

// select database dari tabel user
$username = $_GET['user'];
$cekAkun = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$akun = mysqli_fetch_assoc($cekAkun);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll Management System - Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" id="side">
                <div class="row mt-3">
                    <h2 class="text-white fs-4 fw-bold text-center">GANTENG COMPANY</h2>
                </div>
                <div class="row">
                    <a href="">Dashboard</a>
                </div>
                <div class="row">
                    <a href="">Employee</a>
                </div>
                <div class="row">
                    <a href="">Statistic</a>
                </div>
                <div class="row">
                    <a href="">Payroll Management</a>
                </div>
            </div>
            <div class="col-9">
                <div class="row mt-3">
                    <div class="container rounded-4 " id="header">
                        <div class="row mt-3">
                            <div class="col-sm-9">
                                <?php 
                                    date_default_timezone_set("Asia/Jakarta"); 
                                    $jam = date("H");
                                    if(date("H")<=12){
                                        $jam = "Morning";
                                    }else if(date("H")>12 && date("H") < 15){
                                        $jam = "Day";
                                    }else if(date("H")>15 && date("H")<17){
                                        $jam = "Afternoon";
                                    }else {
                                        $jam = "Night";
                                    }
                                ?>
                                <h1 class="mt-4 ms-3">Good <?= $jam ?></h1>
                            </div>
                            <div class="col-sm-3 ">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <img src="../img/fotoKosong.png" width="65px" class="rounded-circle mt-3 me-3">
                                    </div>
                                    <div class="col-6 text-center">
                                        <p><?= $akun['username']; ?></p>
                                        <p class="fw-bold"><?= $akun['jabatan']; ?></p>
                                        <a href="../logout.php" class="text-dark"
                                            onclick="return confirm('Apakah anda ingin logout')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                                <path d="M7.5 1v7h1V1h-1z" />
                                                <path
                                                    d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="container" style="width: 90%; margin: auto;">
                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <div class="row justify-content-between">
                                    <div class="col-sm-5 rounded-3 text-center p-5 mb-3"
                                        style="background-color: rgb(205, 205, 205);">
                                        <h4>Rp. 200 Juta</h4>
                                        <p>Payroll</p>
                                    </div>
                                    <div class="col-sm-5 rounded-3 text-center p-5 mb-3"
                                        style="background-color: rgb(205, 205, 205);">
                                        <?php $jumlahData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user")); ?>
                                        <h4>
                                            <?= $jumlahData ?>
                                        </h4>
                                        <p>Employee</p>
                                    </div>
                                </div>
                                <div class="row mt-5 rounded-3 p-3 mb-5" style="background-color: rgb(205, 205, 205);">
                                    <p>Karyawan Terbaik bulan Oktober</p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            $cekKaryawan = mysqli_query($conn, "SELECT * FROM user");
                                            $baris = [];
                                            while($result = mysqli_fetch_assoc($cekKaryawan)){
                                                $baris[] = $result;
                                            }
                                            $cekSemuaKaryawan = $baris;
                                            foreach($cekSemuaKaryawan as $user):
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td>
                                                    <span><img src="../img/fotoKosong.png" alt="" width="20px"
                                                            class="rounded-circle"></span>
                                                    <span><?= $user['username']; ?></span>
                                                </td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['jabatan']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-4 rounded-3 mb-5" style="background-color: rgb(205, 205, 205);">
                                <h4 class="text-center mt-3 mb-3">Antrian Verifikasi Akun</h4>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach($cekSemuaAntrian as $user):
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $user['username']; ?></td>
                                            <td>
                                                <a href="verifikasi/verifikasiAkun.php?user=<?= $user['username'] ?>">
                                                    <button class="btn btn-primary">
                                                        Verifikasi
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>