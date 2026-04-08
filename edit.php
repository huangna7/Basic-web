<?php
    include 'connection.php'; 
    $id = $_GET['id']; 

    $data = mysqli_query($conn, "SELECT * FROM tb_contact WHERE id='$id'");

    $row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit section</title>
</head>
<body>
    <div class="bg-yellow-50 rounded-xl m-5 p-5 shadow-xl shadow-yellow-200">
        <h2 class="text-3xl font-bold text-emerald-700 text-center my-5">~ Edit Section 🪄</h2>
    </div>
    <div class="flex justify-center">
        <form action="proccess.php" method="POST" class="p-10 bg-emerald-100 rounded-xl w-100 mb-20 mt-10 shadow-xl shadow-emerald-300">
            <input type="hidden" name="id" value="<?= $row['id']; ?>"> 

            <label for="" class="text-md font-semibold">Username</label><br>
                <input type="text" name="username" value="<?= $row['username']; ?>" class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

                <label for="" class="text-md font-semibold">Email Address</label><br>
                <input type="email" name="email" value="<?= $row['email']; ?>" class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

                <label for="" class="text-md font-semibold">Message</label><br>
                <textarea name="message" class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500"><?= $row['message']; ?></textarea>

                <br>

                <button type="submit" name="update" class="p-2 w-full rounded-xl shadow-md bg-gradient-to-r from-yellow-300 to-emerald-300 focus:outline-offset-2 focus:outline-2 focus:outline-emerald-600 text-emerald-800 font-semibold">Submit</button>
        </form>
        <div class="w-100 h-100 mt-10">
            <img src="img/renjun.png" alt="people" class="w-85 h-85 animate-bounce [animation-duration:3s]">
        </div>
    </div>
</body>
</html>