<?php 


// koneksi database
$conn = mysqli_connect("localhost", "root", "", "sistem-payroll");
if(!$conn){
    echo "<script>
            alert('Database anda tidak terkoneksi!!') 
         </script>";
}
?>