<?php
    $host = "localhost"; //menyimpan nama host database (biasanya locahost)
    $user = "root"; //username database mysql
    $pass = ""; //password database (default xampp -> kosong)
    $db = "db_contact"; //nama database 

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn){
        // jika koneksi berhasil, hanya akan ada blank page
        // jika koneksi gagal, maka program akan dihentikan 
        die("Database connection failed");
    }
?>