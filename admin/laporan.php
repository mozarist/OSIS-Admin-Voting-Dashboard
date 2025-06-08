<?php
include "header.php";
?>

<div class="flex justify-between">
    <h2 class="font-semibold text-3xl">Laporan</h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
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
    <div class="rounded-xl p-5 text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-sm space-y-2">
        <h5 class="text-lg font-semibold">Voting Terbanyak</h5>
        <p class="text-5xl lg:text-3xl 2xl:text-5xl font-bold flex flex-wrap md:flex-no-wrap items-end gap-2">
            <?php
                  $sql ="
                        SELECT 
                        calon.nama,
                        count(voting.id_calon) as jumlah_voting
                        from voting
                        inner join calon
                        on calon.id_calon = voting.id_calon 
                        group by calon.id_calon order by jumlah_voting desc limit 1;
                        ";
                  $go = mysqli_query($koneksi, $sql);
                  if ($go) {
                      $data = mysqli_fetch_assoc($go);
                  } else {
                      echo "Gagal mengambil data: " . mysqli_error($koneksi);
                  }
            ?>

            <?=$data['nama']?> <span class="text-xl">(<?=$data['jumlah_voting']?> Suara)</span>
        </p>
    </div>
</div>

<div class="space-y-5 p-5 border border-gray-300 bg-gradient-to-r from-blue-100 to-gray-100 rounded-xl">
            <h5 class="text-xl font-semibold">
                Calon Ketua OSIS
            </h5>   

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <?php
$no = 1;
$sql = "SELECT * FROM calon ORDER BY id_calon ASC";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) === 0) {
    echo "<p>Belum ada calon ketua OSIS!</p>";
} else {
    foreach ($hasil as $hsl) {
?>
<div class="bg-gradient-to-t from-gray-100 to-white border border-gray-300 shadow-sm rounded-xl w-full flex flex-col justify-between gap-5 p-5">
    <div class="flex flex-col gap-2 flex-1">
        <img src="../Assets/uploads/<?=$hsl['foto']?>" class="w-full h-fit rounded-full p-3" alt="foto calon">
    </div>
    <div class="flex flex-col gap-2 flex-1">
        <h5 class="text-gray-800 text-xl font-semibold">
            Calon <?=$no++?>
        </h5>
        <div>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-lg font-semibold w-fit"><?=$hsl['nama']?></h5>
            <h5 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-lg font-semibold w-fit"><?=$hsl['kelas']?></h5>
        </div>
    </div>
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
<?php
    }
}
?>
</div>
</div>
        </div>

        
<div class="border border-gray-300 rounded-xl">
    <table class="w-full">
    <thead>
        <tr class="bg-blue-100 border-b border-gray-300 text-left">
            <th class="text-gray-800 text-sm font-semibold p-2 ps-5 rounded-tl-xl">No.</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Nama Calon</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Kelas</th>
            <th class="text-gray-800 text-sm font-semibold p-2">Waktu</th>
        </tr>
    </thead>
    <tbody>
<?php
$no = 1;
$sql = "
SELECT
calon.nama,
calon.kelas,
voting.waktu
FROM voting
inner join calon
on voting.id_calon = calon.id_calon
order by voting.id_voting desc;
";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) === 0) {
    echo "<p>Belum ada voting masuk!</p>";
} else {
    foreach ($hasil as $hsl) {
?>
        <tr>
            <td class="text-gray-800 text-lg p-2 py-4 ps-7"><?=$no++?></td>
            <td class="text-gray-800 text-lg p-2 py-4"><?=$hsl['nama']?></td>
            <td class="text-gray-800 text-lg p-2 py-4"><?=$hsl['kelas']?></td>
            <td class="text-gray-800 text-lg p-2 py-4"><?=$hsl['waktu']?></td>
        </tr>

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