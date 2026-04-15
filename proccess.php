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


    //ADD ITEM
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $year = $_POST['year'];
        $description = $_POST['description'];

        // upload gambar
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        // folder simpan
        $folder = "upload/";
        move_uploaded_file($tmp, $folder . $image);

        // simpan ke database
        mysqli_query($conn, "INSERT INTO tb_culture (name, category, year, image, description) 
        VALUES ('$name', '$category', '$year', '$image', '$description')");

        // redirect balik
        header("Location: index.php");
    }

    //DELETE ITEM
    if (isset($_GET['hapus2'])) { // Kode ini dijalankan jika ada perintah hapus dari URL yg ada di halaman index.
    
        // Mengambil ID data yang ingin dihapus.
        $id = $_GET['hapus2'];
    
        // ambil data dulu (buat ambil nama gambar)
        $culture = mysqli_query($conn, "SELECT * FROM tb_culture WHERE id = $id");
        $row = mysqli_fetch_assoc($culture);

        // hapus file gambar dari folder
        $image = $row['image'];
        if (file_exists("upload/" . $image)) {
            unlink("upload/" . $image);
        }

        // hapus data dari database
        mysqli_query($conn, "DELETE FROM tb_culture WHERE id = $id");

        // kembali ke index
        header("Location: index.php");
        
    }

    //update main
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $year = $_POST['year'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $old_image = $_POST['old_image'];

        // cek upload gambar
        if ($_FILES['image']['name'] != '') {

            $new_image = time() . '_' . $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];

            move_uploaded_file($tmp, "upload/" . $new_image);

            // hapus gambar lama
            if (!empty($old_image) && file_exists("upload/" . $old_image)) {
                unlink("upload/" . $old_image);
            }

        } else {
            // pakai gambar lama
            $new_image = $old_image;
        }

        mysqli_query($conn, "UPDATE tb_culture SET
            name='$name',
            category='$category',
            year='$year',
            image='$new_image',
            description='$description'
            WHERE id=$id
        ");

        header("Location: index.php");
    }
?>
