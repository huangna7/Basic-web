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
        <h2 class="text-4xl font-bold text-emerald-700 text-center my-5">Contact us</h2>
    </div>

    <br>

    <div class="flex justify-center">
        <form action="proccess.php" method="POST" class="p-10 bg-emerald-100 rounded-xl w-100 mb-20 shadow-xl shadow-emerald-300">
            <label for="" class="text-md font-semibold">Username</label><br>
            <input type="text" name="username" placeholder="Your name.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Email Address</label><br>
            <input type="email" name="email" placeholder="eg. you@example.com" class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Message</label><br>
            <textarea name="message" placeholder="Write your messages.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500"></textarea>

            <br>

            <button type="submit" name="tambah" class="p-2 w-full rounded-xl shadow-md bg-gradient-to-r from-yellow-300 to-emerald-300 focus:outline-offset-2 focus:outline-2 focus:outline-emerald-600 text-emerald-800 font-semibold">Submit</button>

        </form>
        <div class="w-100 h-100 mt-10">
            <img src="img/renjun.png" alt="people" class="w-85 h-80 animate-bounce [animation-duration:3s]">
        </div>
    </div>


    <div class="flex justify-center">
        <div class="border-2 rounded-xl h-auto overflow-hidden border-emerald-700 mb-10 shadow-xl shadow-orange-300">
        <table class="bg-emerald-100 rounded-xl w-200">
            <tr class="bg-yellow-200">
                <th class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600">Name</th>
                <th class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600">Email</th>
                <th class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600">Messages</th>
                <th class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600">Action</th>
            </tr>
            <?php 
                // while looping untuk mengambil semua data dari database satu per satu
                while ($row = mysqli_fetch_assoc($data)) : 
            ?>
            <tr class="hover:bg-yellow-100">
                <td class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600"><?= $row['username']; ?></td>
                <td class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600"><?= $row['email']; ?></td>
                <td class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600"><?= $row['message']; ?></td>
                <td class="px-4 py-2 border border-emerald-700 font-semibold text-orange-600">
                    <div class="flex justify-center gap-3">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="text-emerald-700 hover:text-orange-600 cursor-pointer"><i class="ti ti-edit text-lg"></i></a>
                        <a href="proccess.php?hapus=<?= $row['id']; ?>" onclick="return confirm ('Are you sure?')" class="text-red-700 hover:text-orange-600 cursor-pointer"><i class="ti ti-trash text-lg"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile;  ?>
        </table>
        </div>
    </div>
</body>
</html>
