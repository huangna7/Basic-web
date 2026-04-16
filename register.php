<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center bg-yellow-50">

    <div class="bg-yellow-200 p-6 rounded-xl w-100 h-100 mt-15 hover:outline-2 hover:outline-offset-2 hover:outline-dashed hover:outline-emerald-500">
        <h2 class="text-2xl font-bold m-7 text-emerald-700 text-center">Register</h2>

        <form action="proccess.php" method="POST">
            <input type="text" name="user_name" placeholder="Username"
                class="w-full mb-3 p-2 border-2 border-emerald-700 hover:border-orange-400 rounded-xl" autocomplete="new-password" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full mb-3 p-2 border-2 border-emerald-700 hover:border-orange-400 rounded-xl" autocomplete="new-password" required>

            <button class="w-full mt-5 bg-orange-400 text-white p-2 rounded-xl hover:bg-emerald-700" name="register">
                Register
            </button>
        </form>

        <p class="text-sm mt-5 text-center">
            Sudah punya akun?
            <a href="login.php" class="text-orange-600 font-semibold">Login</a>
        </p>
    </div>
    <div class="rounded-e-xl mt-15">
        <img src="img/renjun.png" alt="renjun" class="w-80 h-100 animate-bounce [animation-duration:2s]">
    </div>

</body>
</html>