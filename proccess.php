<?php
    include 'connection.php'; // Memanggil koneksi database

    //TAMBAH DATA
    if (isset($_POST['tambah'])) { // mengecek apakah tombol tambah ditekan pada form
    
        // Mengambil data dari form input.
        $name  = $_POST['username']; 
        $email  = $_POST['email'];
        $messages = $_POST['message'];
        
    
        // Perintah SQL untuk menyimpan data ke dalam database 
        $query = "INSERT INTO tb_contact 
                  (username, email, message)
                  VALUES 
                  ('$name','$email','$messages')";
    
        // Menjalankan perintah SQL ke database dan menyimpannya
        mysqli_query($conn, $query);
    
        // mengembalikan tampilan ke halaman utama (index)
        header("Location: contact.php");
    }

    //UPDATE DATA
    
    if (isset($_POST['update'])) { // Menjalankan kode saat tombol update pada halaman edit ditekan
    
        // Mengambil ID, deskripsi, amount, date, dan type yang ingin diubah
        $id     = $_POST['id']; 
        $name  = $_POST['username']; 
        $email  = $_POST['email'];
        $messages = $_POST['message'];
       
    
        // Perintah SQL untuk mengubah data di database
        $query = "UPDATE tb_contact SET
                    username='$name',
                    email='$email',
                    message='$messages'
                  WHERE id='$id'"; //Menentukan data mana yang akan diubah berdasarkan ID
    
        mysqli_query($conn, $query);
    
        header("Location: contact.php");
    }
    
    
    //DELETE DATA
    
    if (isset($_GET['hapus'])) { // Kode ini dijalankan jika ada perintah hapus dari URL yg ada di halaman index.
    
        // Mengambil ID data yang ingin dihapus.
        $id = $_GET['hapus'];
    
        mysqli_query($conn, "DELETE FROM tb_contact WHERE id='$id'"); // Perintah SQL untuk menghapus data dari database
    
        header("Location: contact.php");
        
    }
?>