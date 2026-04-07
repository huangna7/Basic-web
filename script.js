let renclogy = [
    {
        id: 1,
        nama: 'Hangeul 한글',
        kindof: 'Language',
        years: 1443,
        classYears: 'text-emerald-700 font-normal text-sm ml-4 bg-emerald-100 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/Learning.jpeg',
        deskripsi: 'The Korean script is called Hangeul (한글), an alphabet system created in the 15th century by King Sejong the Great to improve literacy among the Korean people.'
    },
    {
        id: 2,
        nama: 'Korean Palace',
        kindof: 'Place',
        years: 1395,
        classYears: 'text-emerald-700 font-normal text-sm ml-4 border-1 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/korean palace.jpeg',
        deskripsi: 'Gyeongbokgung Palace is the royal palace of the Joseon Dynasty. It was built during the reign of King Sejong (ruled 1418-1450) as a venue for various royal ceremonies, but was later burned down during the Japanese Invasion War in 1592.'
    },
    {
        id: 3,
        nama: 'Korean Pop Music',
        kindof: 'Music',
        years: 1990,
        classYears: 'text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/kpop music.jpeg',
        deskripsi: 'K-Pop originated in the Korean music scene in the early 1990s. In 1992, Seo Taiji and Boys became the first Korean group to achieve success outside of Korea with their song “Nan Arayo” (“I Know”).'
    },
    {
        id: 4,
        nama: 'Bungeoppang',
        kindof: 'Food',
        years: 1930,
        classYears: 'text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/bungeoppang.jpg',
        deskripsi: 'Bungeoppang (붕어빵) is a traditional Korean pastry shaped like a goldfish, made from a waffle-like batter baked in a fish-shaped iron mold.'
    },
    {
        id: 5,
        nama: 'Basic Korean Phrase',
        kindof: 'Language',
        years: 1933,
        classYears: 'text-emerald-200 font-normal text-sm ml-4 bg-emerald-700 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/korean language.jpg',
        deskripsi: 'Korean is spoken by more than 78 million people? It is also ranked as the 12th most widely spoken language in the world.'
    },
    {
        id: 6,
        nama: 'Kimchi Jjigae',
        kindof: 'Food',
        years: 1592,
        classYears: 'text-emerald-700 font-normal text-sm ml-4 bg-emerald-200 w-12 px-2 py-0.5 rounded-xl my-2',
        gambar: 'img/kimchi jjigae.jpg',
        deskripsi: 'Kimchi jjigae is a spicy, sour, and savory traditional Korean soup made with fermented kimchi, tofu, vegetables such as green onions, and added protein such as <mark class="bg-yellow-200">pork</mark> or seafood.'
    }
]

// Simpan data asli buat reset
const defaultData = [...renclogy];

// Ambil elemen
const container = document.getElementById("container-budaya");
const searchInput = document.getElementById("search");
const sortSelect = document.getElementById("sort-select");

// Menampilkan Array
function renderBudaya(data) {
    container.innerHTML = ""; // menghapus isi html dari container biar ga numpuk
    data.forEach(item => { // looping tampilan data makanan
        const card = document.createElement("div"); // membuat card kosong
        // styling tailwind
        card.className =
            "hover:shadow-xl shadow-sm rounded-lg overflow-hidden";
        // isi html
        card.innerHTML = `
        <img src="${item.gambar}" alt="${item.nama}" class="w-full h-40 object-cover transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 rounded-t-lg">
        <div class="flex justify-between items-baseline mx-4">
            <h3 class="font-semibold mt-4 mb-1 text-lg">${item.nama}</h3>

            <p class="text-xs font-semibold text-orange-400 mt-4 mb-1 bg-orange-200 py-0.5 px-1 w-20 text-center rounded-xl">${item.kindof}</p>
        </div>

        <p class="${item.classYears}">${item.years}</p>
        <p class="text-sm m-4 mt-0">${item.deskripsi}</p>
        `;

        // menambahkan card ke html
        container.appendChild(card);
    });
}

// Fungsi Searching
searchInput.addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    const filtered = renclogy.filter(item =>
        item.nama.toLowerCase().includes(keyword) ||
        item.kindof.toLowerCase().includes(keyword) ||
        item.years.toString().includes(keyword) //diubah ke string dulu biar bisa dicari lewat input
    );
    renderBudaya(filtered);
});

// Fungsi Sorting
sortSelect.addEventListener("change", function () {
    let value = this.value;

    if (value === "category") {
        renclogy.sort((a, b) => a.kindof.localeCompare(b.kindof));
    } else if (value === "year") {
        renclogy.sort((a, b) => a.years - b.years); //untuk mengurutkan tahun (angka)
    } else {
        renclogy = [...defaultData]; // reset ke urutan awal
    }

    renderBudaya(renclogy);
});

// Jalankan render pertama
renderBudaya(renclogy);

//bmi calculator
function calculate() { 
    let tinggi = parseFloat(document.getElementById('height').value);
    let berat = parseFloat(document.getElementById('weight').value);
    let output = berat / ((tinggi / 100) * (tinggi / 100));

    document.getElementById('bmi').innerHTML = 'BMI Value: ' + output;

    if (output < 18.5) { // Di bawah 18,5 = Berat badan kurang.
        document.getElementById('status').innerHTML = 'Status: Underweight';
    } else if (output >= 18.5 && output <= 22.9) { // 18,5 – 22,9 = Berat badan normal.
        document.getElementById('status').innerHTML = 'Status: Normal Weight';
    } else if (output >= 23 && output <= 29.9) { // 23 – 29,9 = Berat badan berlebih (kecenderungan obesitas).
        document.getElementById('status').innerHTML = 'Status: Excessive body weight (tendency toward obesity)';
    } else if (output >= 30) { // lebih dari 30
        document.getElementById('status').innerHTML = 'Status: Obesity! 🛑';
    }
    else {
        alert('Please fill the height and weight!')
    }
}

//temperature converter
function fahrenheit() {
    let suhu = parseFloat(document.getElementById('temperature').value);
    let output = (suhu * 9 / 5) + 32;

    document.getElementById('result_convert').innerHTML = 'Temperature: ' + output + ' °F 🌡️';
}

function kelvin() {
    let suhu = parseFloat(document.getElementById('temperature').value);
    let output = suhu + 273.15;

    document.getElementById('result_convert').innerHTML = 'Temperature: ' + output + '  K 🌡️';
}