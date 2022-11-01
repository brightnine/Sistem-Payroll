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
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll Management System - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Hello Admin</h1>
            <a href="../logout.php">logout</a>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Antrian Verifikasi Akun</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;foreach($cekSemuaAntrian as $user): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <a href="verifikasi/verifikasiAkun.php?user=<?php echo $user['username']; ?>">
                                    <button class="btn btn-success">
                                        Verified
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>