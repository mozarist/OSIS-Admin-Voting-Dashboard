<?php
include "header.php";

$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $nama = $_POST["nama"];
  $visi = $_POST["visi"];
  $kelas = $_POST["kelas"];
  // Proses upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "../Assets/uploads/";
    $path = $folder . basename($foto);

    if (move_uploaded_file($tmp, $path)) {
        // Simpan ke database
        $sql = "INSERT INTO `calon`(`nama`, `visi`, `kelas`, `foto`) VALUES ('$nama','$visi','$kelas','$foto')";
        $go = mysqli_query($koneksi,$sql);

        if ($go) {
            $berhasil = true;
        };
    } else {
        echo "<script>alert('Gagal upload foto');</script>";
    }
};
?>

<form action="" method="POST" enctype="multipart/form-data" class="w-full space-y-5 self-center p-5">
    <h2 class="font-semibold text-3xl text-center">Tambah Calon Ketua OSIS</h2>
    <div class="flex flex-col gap-3">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-2 flex flex-col gap-3 order-2 lg:order-1">
                <div class="flex flex-col gap-1">
                    <label class="font-semibold text-gray-600">Nama Lengkap</label>
                    <input type="text" required name="nama" class="p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="font-semibold text-gray-600">Kelas</label>
                    <input type="text" required name="kelas" class="p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500">
                </div>
                <div class="flex-3 flex flex-col gap-1">
                    <label class="font-semibold text-gray-600">Visi</label>
                    <textarea rows="6" type="text" required name="visi" placeholder="Max 225 characters" maxlength="255" class="w-full h-full p-2 text-lg border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500"></textarea>
                </div>
            </div>
            <div class="flex-1 flex flex-col order-1 lg:order-2">
                <label class="font-semibold text-gray-600">Foto</label>
                <img id="preview-image" src="" alt="Tambahkan foto" class="aspect-square object-cover text-sm text-gray-500 rounded-t-xl border border-b-transparent border-gray-300">
                <div class="flex justify-between items-center bg-white p-2 border border-gray-300 rounded-b-xl">
                    <p id="nama-file" class="text-sm text-gray-500">Belum ada file dipilih</p>
                    <input type="file" required name="foto" id="foto" class="file:text-blue-500 hover:file:text-gray-800 file:transition file:w-fit w-23 file:rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                </div>
            </div>
        </div>    
    </div>

    <div class="flex gap-2">
        <a href="calon.php" class="bg-gradient-to-r hover:from-gray-400 hover:to-gray-200 from-gray-300 to-gray-200 hover:text-blue-600 text-blue-500 text-sm text-center font-semibold w-full px-10 py-2 rounded-xl transition">Batal</a>
        <button type="submit" name="go" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white text-sm font-semibold w-full px-10 py-2 rounded-xl transition">Simpan</button>
    </div>

</form>


<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const fileInput = e.target;
    const fileName = fileInput.files[0]?.name || "Belum ada file dipilih";
    document.getElementById('nama-file').textContent = fileName;

    const preview = document.getElementById('preview-image');
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "../Asset/uploads/";
    }
});
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
    if ($berhasil) : ?>
    <script>
        swal({
            title: "Berhasil",
            text: "Perubahan sudah disimpan",
            icon: "success",
            button: "Kembali",
        }).then(() => {
            window.location.href =
            "calon.php"
        });
    </script>
    <?php endif; ?>


</main>
</body>

</html>