<?php
include "header.php";
?>

<div class="flex justify-between">
    <h2 class="font-semibold text-3xl">Daftar Calon Ketua OSIS</h2>
<a href="tambah_calon.php" class="flex items-center gap-2 outline w-fit rounded-xl text-blue-600 hover:text-blue-800 px-5 py-2 text-sm font-semibold transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
    Tambah Calon
</a>
</div>

<div class="border border-gray-300 rounded-xl shadow-sm divide-y divide-gray-300">

    <?php
    $no = 1;
    $sql = "SELECT * FROM calon ORDER BY id_calon ASC";
    $hasil = mysqli_query($koneksi, $sql);
    
    if (mysqli_num_rows($hasil) == 0) {
        echo "<p>Belum ada calon ketua OSIS!</p>";
    } else {
        foreach ($hasil as $hsl) {
    ?>
    <div class="p-5 w-full flex flex-col md:flex-row gap-5">
    <img src="../Assets/uploads/<?=$hsl['foto']?>" class="w-full md:w-1/5 md:h-1/5 2xl:w-1/7 rounded-xl object-cover aspect-square" alt="foto calon">
    
    <div class="flex flex-col gap-3 flex-1">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5">
            <h5 class="order-2 md:order-1 text-blue-0 text-3xl font-semibold">Calon <?=$no++?></h5>
            <div class="flex gap-2 order-1 md:order-2 w-full md:w-fit">
                <a href="edit_calon.php?id_calon=<?= $hsl['id_calon']?>" class="bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-1 w-full md:w-fit rounded-xl text-sm text-white">Edit</a>
                <button onclick="konfirmasiHapus()" class="bg-gradient-to-r from-red-500 to-red-400 px-5 py-1 w-full md:w-fit rounded-xl text-sm text-white">Hapus</button>
            </div>
        </div>
        
        <div>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-xl font-semibold w-fit"><?=$hsl['nama']?></h5>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-lg font-semibold w-fit"><span class="text-black">Kelas: </span><?=$hsl['kelas']?></h5>
        </div>
        <p class="text-gray-800 text-md">
            <span class="text-black text-lg font-semibold">Visi:<br></span>
            <?=$hsl['visi']?>
        </p>
    </div>
</div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function konfirmasiHapus() {
        swal({
            title: "Apakah kamu yakin?",
            text: "Data akan dihapus selamanya jika kamu yakin.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Redirect ke file PHP yang akan menghapus data
                window.location.href = "hapus_calon.php?id_calon=<?=$hsl['id_calon']?>";
            }
            else{
                window.location.href = "calon.php"
            }
        });
    }
    </script>

<?php
    }
}
?>
</div>

</div>
</main>

</body>

</html>