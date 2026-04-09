<?php
    include 'connection.php';

    $data = mysqli_query($conn, "SELECT * FROM tb_contact");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <title>Contact</title>
</head>
<body>
    <nav class="shadow-lg flex justify-between p-3 items-baseline sticky top-0 backdrop-blur-sm">
        <div class="ml-7">
            <h1 class="font-bold text-yellow-500 text-end text-lg hover:rotate-180">Renclogy ˖𓂃.☘︎ ݁˖</h1>
        </div>
        <div class="mr-7">
            <ul class="flex space-x-4 text-sm p-2 items-baseline">
                <li><a href="index.php" class="hover:text-emerald-600">Home</a></li>
                <li><a href="bmiandtemperature.html" class="hover:text-emerald-600">About</a></li>
                <li><a href="mole.html" class="hover:text-emerald-600">Game</a></li>
                <li><a href="contact.php" class="hover:text-emerald-600">Contact</a></li>
                <li>
                    <button class="bg-yellow-400 text-yellow-700 rounded-sm h-6 w-10 transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-yellow-500">List</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="bg-yellow-50 rounded-xl m-5 p-5 shadow-xl shadow-yellow-200">
        <h2 class="text-4xl font-bold text-emerald-700 text-center my-5">Drop your opini/experience ~</h2>
    </div>

    <br>

    <div class="flex justify-center">
        <form action="proccess.php" method="POST" enctype="multipart/form-data" class="p-10 bg-emerald-100 rounded-xl w-100 mb-20 shadow-xl shadow-emerald-300">
            <label for="" class="text-md font-semibold">Username</label><br>
            <input type="text" name="username" placeholder="Your name.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Email Address</label><br>
            <input type="email" name="email" placeholder="eg. you@example.com" class="border-2 border-emerald-700 shadow-md anim rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Message</label><br>
            <textarea name="message" placeholder="Write your messages.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500"></textarea>

            <br>

            <button type="submit" name="tambah" class="p-2 w-full rounded-xl shadow-md bg-gradient-to-r from-yellow-300 to-emerald-300 focus:outline-offset-2 focus:outline-2 focus:outline-emerald-600 text-emerald-800 font-semibold">Submit</button>

        </form>
        <div class="w-100 h-100 mt-10">
            <img src="img/renjun.png" alt="people" class="w-68 h-85 animate-bounce [animation-duration:3s]">
        </div>
    </div>


    <h2 class="text-xl text-emerald-700 pl-50 font-bold pb-5">All Comment ✨</h2>
    <div class="grid grid-cols-3 justify-center gap-10 mx-50">
        <?php 
            // while looping untuk mengambil semua data dari database satu per satu
            while ($row = mysqli_fetch_assoc($data)) : 
        ?>
        <div class="hover:shadow-xl shadow-sm shadow-yellow-300 rounded-lg overflow-hidden mb-10 bg-yellow-50">
                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg"><?= $row['username']; ?></h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-auto text-center rounded-xl"><?= $row['email']; ?></p>
                </div>

                <p class="text-emerald-700 font-normal text-sm ml-4 bg-emerald-100 w-12 px-2 py-0.5 rounded-xl my-2">User</p>

                <p class="text-sm m-4 mt-0 break-words whitespace-normal"><?= $row['message']; ?></p>

                <div class="flex justify-center gap-3">
                    <a href="edit.php?id=<?= $row['id']; ?>" class="text-emerald-700 hover:text-orange-600 cursor-pointer"><i class="ti ti-edit text-lg"></i></a>
                    <a href="proccess.php?hapus=<?= $row['id']; ?>" onclick="return confirm ('Are you sure?')" class="text-red-700 hover:text-orange-600 cursor-pointer"><i class="ti ti-trash text-lg"></i></a>
                </div>
        </div>
        <?php endwhile;  ?>
    </div>
</body>
</html>
