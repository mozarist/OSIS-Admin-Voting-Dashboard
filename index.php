<?php

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //ambil inputan dari form 
    $id_calon = $_POST["id_calon"];

    // sql tambah data     tbl       kolom          nama var
    $sql = "INSERT INTO voting (id_calon) VALUES ('$id_calon')";

    // eksekusi
    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header(header: "Location: berhasil.php");
        // atau boleh pakai sweat alert, lihat contoh di siswa $berhasil = true;
    } else {
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ketua OSIS SMK Pesat</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-gray-200 to-white font-[inter] py-5 flex flex-col gap-5 justify-center items-center">
    <div class="w-full h-fit py-5 lg:py-15 flex flex-col gap-4 justify-center items-center">
        <h1 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-center text-3xl md:4xl lg:text-6xl font-[poppins] font-semibold h-fit lg:h-17">
            Voting Ketua OSIS SMK Pesat
        </h1>
        <h5 class="text-xl text-gray-800 font-semibold">
            Ayo tentukan pemimpin terbaik dari kita!
        </h5>
    </div>

    <form action="" method="POST" class="w-2/3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php
            $no = 1;
            //sql
            $sql = "select * from calon order by id_calon DESC";

            //eksekusi
            $hasil = mysqli_query($koneksi, $sql);

            //tampilkan dgn perulangan
            foreach ($hasil as $data) {
            ?>

                <label class="calon">
                    <input type="radio" name="id_calon" value="<?= $data['id_calon'] ?>" class="hidden peer" required>
                    <div class="h-full peer-checked:ring-blue-500 peer-checked:ring-3 peer-checked:text-blue-600 peer-checked:shadow-2xl border border-gray-300 p-4 rounded-xl bg-white transition-all">
                        <img src="Assets/uploads/<?=$data['foto']?>" alt="Calon 1" class="w-full h-fit object-cover rounded-lg mb-4">
                        <h2 class="text-xl text-blue-600 font-semibold mb-1"><?= $data['nama'] ?></h2>
                        <p class="text-sm text-gray-700"><?= $data['visi'] ?></p>
                    </div>
                </label>

            <?php } ?>

        </div>

        <!-- Tombol Submit -->
        <div class="mt-6 text-center">
            <button type="submit" class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-xl shadow">
                Pilih Calon
            </button>
        </div>
    </form>
</body>

</html>