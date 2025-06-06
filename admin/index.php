<?php
include "header.php";
?>
        <h2 class="font-semibold text-3xl">Dashboard Overview</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="rounded-xl p-5 text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-sm space-y-2">
                <h5 class="text-lg font-semibold">Jumlah Calon Ketua OSIS</h5>
                <p class="text-5xl font-bold">
                    <?php
                          $sql = "SELECT COUNT(id_calon) AS jumlah_calon FROM calon";

                          $go = mysqli_query($koneksi, $sql);

                          if ($go) {
                              $data = mysqli_fetch_assoc($go);
                              echo $data['jumlah_calon'];
                          } else {
                              echo "Gagal mengambil data: " . mysqli_error($koneksi);
                          }
                    ?>
                </p>
            </div>
            <div class="rounded-xl p-5 text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-sm space-y-2">
                <h5 class="text-lg font-semibold">Jumlah Admin</h5>
                <p class="text-5xl font-bold">
                    <?php
                          $sql = "SELECT COUNT(id_admin) AS jumlah_admin FROM admin";

                          $go = mysqli_query($koneksi, $sql);

                          if ($go) {
                              $data = mysqli_fetch_assoc($go);
                              echo $data['jumlah_admin'];
                          } else {
                              echo "Gagal mengambil data: " . mysqli_error($koneksi);
                          }
                    ?>
                </p>
            </div>
            <div class="rounded-xl p-5 text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-sm space-y-2">
                <h5 class="text-lg font-semibold">Jumlah Perolehan Voting</h5>
                <p class="text-5xl font-bold">
                    <?php
                          $sql = "SELECT COUNT(id_voting) AS jumlah_voting FROM voting";

                          $go = mysqli_query($koneksi, $sql);

                          if ($go) {
                              $data = mysqli_fetch_assoc($go);
                              echo $data['jumlah_voting'];
                          } else {
                              echo "Gagal mengambil data: " . mysqli_error($koneksi);
                          }
                    ?>
                </p>
            </div>
        </div>

        <div class="space-y-5 p-5 border border-gray-300 bg-gradient-to-t from-blue-100 to-gray-100 rounded-xl">
            <h5 class="text-xl font-semibold">
                Calon Ketua OSIS
            </h5>   

        <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-5">
            <?php
$no = 1;
$sql = "SELECT * FROM calon ORDER BY id_calon ASC";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) === 0) {
    echo "<p>Belum ada calon ketua OSIS!</p>";
} else {
    foreach ($hasil as $hsl) {
?>
<div class="bg-gradient-to-t from-gray-100 to-white border border-gray-300 shadow-sm rounded-xl w-full flex flex-col lg:flex-row justify-center gap-5 p-5">
    <div class="flex flex-col gap-2 flex-1">
        <img src="../Assets/uploads/<?=$hsl['foto']?>" class="w-full h-full rounded-full" alt="foto calon">
        <div class="bg-gradient-to-r from-blue-700 to-cyan-500 text-white text-sm text-center font-semibold p-2 rounded-xl">
            <?php
            $sql_suara = "SELECT count(id_voting) as jumlah_suara FROM `voting` where id_calon= " . $hsl['id_calon'];
            $hasil_suara = mysqli_query($koneksi, $sql_suara);

            if ($hasil_suara) {
                $data_suara = mysqli_fetch_assoc($hasil_suara);
                echo $data_suara['jumlah_suara'] . " Suara";
            }
            ?>
        </div>
    </div>
    <div class="flex flex-col gap-2 flex-1">
        <h5 class="text-gray-800 text-xl font-semibold">
            Calon <?=$no++?>
        </h5>
        <div>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-lg font-semibold w-fit"><?=$hsl['nama']?></h5>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-lg font-semibold w-fit"><?=$hsl['kelas']?></h5>
        </div>
        <p class="text-gray-800 text-md">
            "<?=$hsl['visi']?>"
        </p>
    </div>
</div>
<?php
    }
}
?>
</div>
</div>
        </div>


    </main>
</body>

</html>