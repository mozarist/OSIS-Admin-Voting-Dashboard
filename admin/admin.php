<?php
include "header.php";
?>

<div class="flex justify-between">
    <h2 class="font-semibold text-3xl">Daftar Admin</h2>
<a href="tambah_admin.php" class="flex items-center gap-2 outline w-fit rounded-xl text-blue-600 hover:text-blue-800 px-5 py-2 text-sm font-semibold transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
    Tambah Admin
</a>
</div>

<div class="border border-gray-300 rounded-xl">
    <table class="w-full">
    <thead>
        <tr class="bg-blue-100 border-b border-gray-300 text-left">
            <th class="text-gray-800 text-sm font-semibold p-2 ps-5 rounded-tl-xl">No.</th>
            <th class="text-gray-800 text-sm font-semibold p-2">User Profile</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Username</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Full Name</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Password</th>
            <th class="text-gray-800 text-sm text-center font-semibold p-2 rounded-tr-xl">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-300">
<?php
$no = 1;
$sql = "SELECT * FROM admin ORDER BY id_admin ASC";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) === 0) {
    echo "<p>Belum ada admin!</p>";
} else {
    foreach ($hasil as $hsl) {
?>
        <tr>
            <td class="text-gray-800 text-lg p-2 py-4 ps-7"><?=$no++?></td>
            <td class="ps-7 py-4">
                <div class="flex items-center justify-center bg-gradient-to-r from-blue-700 to-cyan-500 text-white rounded-full w-10 aspect-square">
                    <?= strtoupper(substr($hsl['nama_lengkap'], 0, 1)) ?>
                </div>
            </td>
            <td class="text-gray-800 text-xs md:text-sm lg:text-lg p-2 py-4"><?=$hsl['username']?></td>
            <td class="text-gray-800 text-xs md:text-sm lg:text-lg p-2 py-4"><?=$hsl['nama_lengkap']?></td>
            <td class="text-gray-800 text-xs md:text-sm lg:text-lg p-2 py-4">
                <div class="relative w-full xl:w-2/3">
                        <input type="password" name="password" value="<?=$hsl['password']?>"
                              class="w-full p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500"
                              readonly>
                    </div>
            </td>
            <td class="text-gray-800 text-lg p-2 py-4">
                <div class="flex justify-center gap-2 order-1 md:order-2">
                    <a href="edit_admin.php?id_admin=<?=$hsl['id_admin']?>" class="bg-gradient-to-r from-blue-600 to-cyan-500 px-5 py-1 w-full md:w-fit rounded-xl text-xs md:text-sm text-white">Edit</a>
                    <button onclick="konfirmasiHapus()" class="bg-gradient-to-r from-red-500 to-red-400 px-5 py-1 w-full md:w-fit rounded-xl text-sm text-white">Hapus</button>
                </div>
            </td>
        </tr>
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
                window.location.href = "hapus_admin.php?id_admin=<?=$hsl['id_admin']?>";
            }
            else{
                window.location.href = "admin.php"
            }
        });
    }
    </script>
<?php
   }
}
?>
    </tbody>
</table>
</div>
</div>

</main>

</body>

</html>