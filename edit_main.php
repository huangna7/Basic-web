<?php
    include 'connection.php'; 
    $id = $_GET['id']; 

    $culture = mysqli_query($conn, "SELECT * FROM tb_culture WHERE id='$id'");

    $row = mysqli_fetch_assoc($culture);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>EDIT SECTION</title>
</head>
<body>
    <h2 class="text-4xl font-bold text-yellow-400 animate-bounce text-center mt-10">ADD</h2>
    <div class="flex justify-center">
        <form action="proccess.php" method="POST" class="w-100 rounded-xl px-3 py-5 m-10 bg-emerald-100" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id']; ?>"> 

            <label for="" class="text-lg font-semibold text-emerald-700 px-2 py-1 mx-3">Culture Name</label><br>
            <input type="text" name="name" value="<?= $row['name']; ?>" class="border-2 rounded-xl border-orange-400 focus:outline-offset-2 focus:outline-2 focus:outline-dashed focus:outline-yellow-400 px-2 py-1 mx-3 mt-2 mb-5 w-85" required>

            <label for="" class="text-lg font-semibold text-emerald-700 px-2 py-1 mx-3">Category</label><br>
            <input type="text" name="category" value="<?= $row['category']; ?>" class="border-2 rounded-xl border-orange-400 focus:outline-offset-2 focus:outline-2 focus:outline-dashed focus:outline-yellow-400 px-2 py-1 mx-3 mt-2 mb-5 w-85" required>

            <label for="" class="text-lg font-semibold text-emerald-700 px-2 py-1 mx-3">Year of Emergence</label><br>
            <input type="number" name="year" value="<?= $row['year']; ?>" class="border-2 rounded-xl border-orange-400 focus:outline-offset-2 focus:outline-2 focus:outline-dashed focus:outline-yellow-400 px-2 py-1 mx-3 mt-2 mb-5 w-85" required>

            <label for="" class="text-lg font-semibold text-emerald-700 px-2 py-1 mx-3">Image</label><br>
            <input type="hidden" name="old_image" value="<?= $row['image']; ?>">
            <img src="upload/<?= $row['image']; ?>" alt="image" class="w-70 h-70 rounded-xl ml-10">
            <input type="file" name="image" class="border-2 rounded-xl border-orange-400 focus:outline-offset-2 focus:outline-2 focus:outline-dashed focus:outline-yellow-400 px-2 py-1 mx-3 mt-2 mb-5 w-85 file:bg-yellow-200 file:p-2 file:mr-3 file:rounded-xl file:font-semibold file:text-orange-500">

            <label for="" class="text-lg font-semibold text-emerald-700 px-2 py-1 mx-3">Description</label><br>
            <textarea name="description" class="border-2 rounded-xl border-orange-400 focus:outline-offset-2 focus:outline-2 focus:outline-dashed focus:outline-yellow-400 px-2 py-1 mx-3 mt-2 mb-5 w-85" required><?= $row['description']; ?></textarea>

            <button type="submit" name="edit" class="bg-gradient-to-r from-yellow-300 via-emerald-300 to-orange-300 p-2 w-85 font-semibold text-lg rounded-xl text-emerald-700 mx-3 hover:animate-pulse focus:animate-ping">Update</button>
        </form>
    </div>
</body>
</html>