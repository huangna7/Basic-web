<?php
    include 'connection.php';

    $culture = mysqli_query($conn, "SELECT * FROM tb_culture");

    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

    $query = "SELECT * FROM tb_culture WHERE 1";

    // SEARCH
    if (!empty($search)) {
        $query .= " AND (
        LOWER(name) LIKE LOWER('%$search%') OR
        LOWER(category) LIKE LOWER('%$search%') OR
        CAST(year AS CHAR) LIKE '%$search%' OR
        LOWER(description) LIKE LOWER('%$search%')
        )";
    }

    // SORT
    switch ($sort) {
        case "year":
        $query .= " ORDER BY year ASC";
        break;

        case "category":
        $query .= " ORDER BY category ASC";
        break;
    }

    $culture = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <title>Korean Culture-renclogy</title>
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

    <header class="text-center container mx-auto">
        <h1 class="font-bold text-5xl mt-20 text-yellow-500 mb-10"> ♪ฺ✧ Korean Culture ฺ✧♪</h1>
        <p class="justify-center text-lg text-gray-700">
            South Korean culture is highly sought after because it has characteristics that even North <br>
            Korea does not have. Many young people today are interested in learning about <br>
            the unique and beautiful Korean culture.
        </p>
        <br>

        <form class="mb-20 mt-3" method="GET">
            <input type="text" id="search" name="search" placeholder="Search for name of korean culture, category, or year" class="border border-solid rounded-lg border-neutral-300 w-110 px-2 py-2" value="<?= htmlspecialchars($search) ?>">

            <select name="sort" id="sort-select" class="border border-solid rounded-lg border-neutral-300 w-50 px-2 py-2 text-gray-500" onchange="this.form.submit()">
                <option value="sortby">Sort By</option>
                <option value="category" <?= (isset($_GET['sort']) && $_GET['sort']=="category") ? 'selected' : '' ?>>Category</option>
                <option value="year" <?= (isset($_GET['sort']) && $_GET['sort']=="year") ? 'selected' : '' ?>>Year of Emergence</option>
            </select>

            <a href="add.php" class="mx-5 bg-emerald-600 rounded-xl shadow-emerald-200 shadow-xl px-5 py-2 outline-2 outline-offset-2 outline-dashed outline-yellow-500 text-white font-semibold">Add 🪄</a>
        </form>
    </header>

    <main class="justify-center">
        <h2 class="text-center font-bold text-3xl text-yellow-600">Main Culture 𐙚</h2>

        <div class="grid grid-cols-3 mt-10 mb-10 gap-5 mx-10" id="container-budaya">
            <?php 
                 // while looping untuk mengambil semua data dari database satu per satu
                 while ($row = mysqli_fetch_assoc($culture)) : 
            ?>
            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="upload/<?= $row['image']; ?>" alt="image" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg"><?= $row['name']; ?></h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl"><?= $row['category']; ?></p>
                </div>

                <p class="text-emerald-700 font-normal text-sm ml-4 bg-emerald-100 w-12 px-2 py-0.5 rounded-xl my-2"><?= $row['year']; ?></p>

                <p class="text-sm m-4 mt-0"><?= $row['description']; ?><br></p>

                <div class="flex justify-center gap-3 text-orange-400">
                    <!-- Tombol Edit  -->
                    <a href="edit_main.php?id=<?= $row['id']; ?>" class="text-emerald-700 hover:text-orange-600 cursor-pointer"><i class="ti ti-edit text-lg"></i></a>
                    <!-- Tombol Delete -->
                    <a href="proccess.php?hapus2=<?= $row['id']; ?>" onclick="return confirm('Yakin?')"  class="hover:text-red-500 cursor-pointer"><i class="ti ti-trash text-lg"></i></a>
                </div>
            </div>
            <?php endwhile;  ?>
            
            <!-- <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/Learning.jpeg" alt="Korean alphabet" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">한글</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Language</p>
                </div>

                <p class="text-emerald-700 font-normal text-sm ml-4 bg-emerald-100 w-12 px-2 py-0.5 rounded-xl my-2">1443</p>

                <p class="text-sm m-4 mt-0">The Korean script is called Hangul (한글), an alphabet system created in the 15th century by King Sejong the Great to improve literacy among the Korean people.<br></p>
            </div>
            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/korean palace.jpeg" alt="Korean culture" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">Korean Palace</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Place</p>
                </div>

                <p class="text-emerald-700 font-normal text-sm ml-4 border-1 w-12 px-2 py-0.5 rounded-xl my-2">1395</p>

                <p class="text-sm m-4 mt-0">
                    Gyeongbokgung Palace is the royal palace of the Joseon Dynasty. 
                    It was built during the reign of King Sejong (ruled 1418-1450) as a venue for various royal ceremonies, 
                    but was later burned down during the Japanese Invasion War in 1592.
                </p>
            </div>
            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/kpop music.jpeg" alt="Korean Pop" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">Korean Pop Music</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Music</p>
                </div>

                <p class="text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2">1990</p>

                <p class="text-sm m-4 mt-0"> 
                    K-Pop originated in the Korean music scene in the early 1990s. 
                    In 1992, Seo Taiji and Boys became the first Korean group to achieve 
                    success outside of Korea with their song “Nan Arayo” (“I Know”).
                </p>
            </div>

            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/bungeoppang.jpg" alt="bungeoppang" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">Bungeoppang</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Food</p>
                </div>

                <p class="text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2">1930</p>

                <p class="text-sm m-4 mt-0"> 
                    Bungeoppang (붕어빵) is a traditional Korean pastry shaped like a goldfish, 
                    made from a waffle-like batter baked in a fish-shaped iron mold.
                </p>
            </div>
            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/korean language.jpg" alt="Korean language" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">Basic Korean Phrase</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Language</p>
                </div>

                <p class="text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2">1933</p>

                <p class="text-sm m-4 mt-0"> 
                    Korean is spoken by more than 78 million people? It is also ranked 
                    as the 12th most widely spoken language in the world.
                </p>
            </div>
            <div class="hover:shadow-xl shadow-sm rounded-lg overflow-hidden">
                <img src="img/kimchi jjigae.jpg" alt="kimchi jjigae" class="w-full h-32 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">

                <div class="flex justify-between items-baseline mx-4">
                    <h3 class="font-semibold mt-4 mb-1 text-lg">Kimchi Jjigae</h3>

                    <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">Food</p>
                </div>

                <p class="text-emerald-700 font-normal text-sm ml-4 bg-emerald-200 w-12 px-2 py-0.5 rounded-xl my-2">1592</p>

                <p class="text-sm m-4 mt-0"> 
                    Kimchi jjigae is a spicy, sour, and savory traditional Korean soup made with fermented kimchi, 
                    tofu, vegetables such as green onions, and added protein such as <mark class="bg-yellow-200">pork</mark> or seafood.
                </p>
            </div> -->
        </div>

        <div class="flex justify-center">
            <div class="bg-emerald-700 w-300 text-center rounded-lg p-10 my-15">
                <h3 class="text-white font-bold text-2xl mb-5">💡Did You Know?</h3>
                <p class="text-white mx-50">
                    Korea has identified six “Han” elements that are important aspects of Korean cultural 
                    heritage for internationalization: Hangul (script), Hansik (food), Hanbok (clothing), 
                    Hanok (traditional houses), Hanja (Chinese characters), and Hanguk-Eumak (music).
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-emerald-50 py-10">
        <div class="flex justify-between mx-10">
            <div>
                <h1 class="font-bold text-yellow-300 text-2xl mb-3">Renclogy ˖𓂃.☘︎ ݁˖</h1>

                <p>A mini digital enyclopedia documenting the cultural of Korea.</p>
            </div>
            <div>
                <h3 class="font-semibold mb-3">About</h3>

                <p class="text-sm">Our mission is to inform people about the culture of South Korea.</p>
            </div>
        </div>
        <hr class="text-emerald-300 m-10">
        <div class="flex justify-between mx-10">
            <div>
                <p class="text-sm">&copy; 2025 Renclogy – Exploring the Essence of Korean Culture.</p>
            </div>
            <div>
                <p class="text-sm">Made with ✨ SMA ABBS</p>
            </div>
        </div>
    </footer>

    <!-- <script src="script.js"></script> -->
</body>
</html>
