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
        <form action="proccess.php" method="POST" class="p-10 bg-emerald-100 rounded-xl w-100 mb-10 shadow-xl shadow-emerald-300">
            <label for="" class="text-md font-semibold">Username</label><br>
            <input type="text" name="username" placeholder="Your name.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Email Address</label><br>
            <input type="email" name="email" placeholder="eg. you@example.com" class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500" required><br>

            <label for="" class="text-md font-semibold">Message</label><br>
            <textarea name="message" placeholder="Write your messages.." class="border-2 border-emerald-700 shadow-md rounded-xl px-2 py-1 w-full mb-3 hover:border-orange-500"></textarea>

            <br>

            <button type="submit" name="tambah" class="p-2 w-full rounded-xl shadow-md bg-gradient-to-r from-yellow-300 to-emerald-300 focus:outline-offset-2 focus:outline-2 focus:outline-emerald-600 text-emerald-800 font-semibold">Submit</button>

        </form>
        <div class="w-100 h-90">
            <img src="img/renjun.png" alt="people" class="w-58 h-100 animate-bounce [animation-duration:2s]">
        </div>
    </div>


    <div>

    </div>
</body>
</html>
