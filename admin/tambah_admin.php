<?php
include "header.php";

$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_lengkap = $_POST["nama_lengkap"];

    $sql = "INSERT INTO `admin`(`username`, `password`, `nama_lengkap`) VALUES ('$username','$password','$nama_lengkap')";
    $go = mysqli_query($koneksi,$sql);

        if ($go) {
          $berhasil = true;

        };
    } else {

    }
?>

<form action="" method="POST" class="w-full space-y-5 self-center px-30 py-15">
    <h2 class="font-semibold text-3xl text-center mb-15">Tambah Administrator</h2>
    <div class="flex flex-col gap-3">
        <div class="flex gap-4">
            <div class="flex-2 flex flex-col gap-3">
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold text-gray-600">Username</label>
                    <input type="text" required name="username" class="p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500">
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold text-gray-600">Full Name</label>
                    <input type="text" required name="nama_lengkap" class="p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500">
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold text-gray-600">Password</label>
                    <div class="relative w-full">
                        <input type="password" id="password" name="password"
                              class="w-full p-2 border border-gray-300 rounded-xl focus:outline-none focus:ring focus:ring-blue-500">
                        <button type="button" onclick="togglePassword()"
                                class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400 hover:text-blue-500">
                          <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </button>
                      </div>    
                </div>
            </div>
        </div>
        
    </div>

    <div class="flex gap-2">
        <a href="admin.php" class="bg-gradient-to-r hover:from-gray-400 hover:to-gray-200 from-gray-300 to-gray-200 hover:text-blue-600 text-blue-500 text-sm text-center font-semibold w-full px-10 py-2 rounded-xl transition">Batal</a>
        <button type="submit" name="go" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white text-sm font-semibold w-full px-10 py-2 rounded-xl transition">Simpan</button>
    </div>

</form>


</main>


<script>
  function togglePassword() {
    const input = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
      input.type = "text";
      icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 
              9.956 0 012.185-3.327m1.664-1.664A9.956 9.956 0 0112 5c4.478 0 
              8.268 2.943 9.542 7a9.973 9.973 0 01-4.818 5.794M15 12a3 
              3 0 11-6 0 3 3 0 016 0zm-9 9l18-18" />
      `;
    } else {
      input.type = "password";
      icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 
              9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
      `;
    }
  }
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
            "admin.php"
        });
    </script>
    <?php endif; ?>

</body>

</html>