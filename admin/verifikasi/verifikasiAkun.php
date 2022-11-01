<!-- PHP Script -->
<?php 
include '../../connection.php';

$username = $_GET['user'];

// ambil database dari tabel registrasi
$ambilData = mysqli_query($conn, "SELECT * FROM antrian_registrasi WHERE username = '$username'");
$user = mysqli_fetch_assoc($ambilData);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll Management System - Verifikasi</title>
    <link rel="stylesheet" href="../../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container" id="login-registrasi">
        <div class="row">
            <div class="col-sm-4">
                <form action="verifikasiController.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" readonly
                            value="<?= $user['username']?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" value="<?= $user['email']?>" name="email"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="ceo">CEO</option>
                            <option value="admin">Admin</option>
                            <option value="hrd">HRD</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="verifikasi">Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>