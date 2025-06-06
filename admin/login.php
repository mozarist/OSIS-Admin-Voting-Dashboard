<?php
include "../koneksi.php";
session_start();

$gagal = false;

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Tangkap input form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek ke database
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    
    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Periksa hasil
    if ($result->num_rows > 0) {
        // Ambil data user
        $user = mysqli_fetch_assoc($result);

        
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['id_admin'] = $user['id_admin'];
        
        header('Location: index.php');
        exit;
    } else {
        $gagal = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

<body class="md:bg-linear-to-r from-cyan-100 to-blue-300 font-[inter] min-h-screen flex justify-center items-center">
    <div class="flex flex-col lg:flex-row md:w-[85vw] md:h-[80vh] bg-white md:rounded-xl shadow-xl flex overflow-hidden">
        <div class="bg-linear-to-r from-blue-700 to-cyan-500 w-full h-full p-10 lg:p-25 flex flex-col gap-10 justify-center h-50">
            <h1 class="text-white text-4xl md:text-6xl font-bold font-[poppins]">
                Admin Pemilihan Ketua OSIS
            </h1>
            <p class="text-white text-xl">Welcome Back, Admin!</p>
        </div>
        <div class="flex flex-col justify-center gap-15 bg-white p-10 lg:p-25 w-full h-full">
                <div class="space-y-2">
                    <h2 class="bg-linear-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent w-fit h-15 text-5xl font-semibold">
                        Sign-in
                    </h2>
                    <p class="text-gray-500 text-sm">
                        Please enter your details to log in.
                    </p>
                </div>
                <form method="POST" class="w-full space-y-6">
                
                    <!-- Username -->
                    <div class="space-y-2">
                      <label for="username" class="block text-sm font-medium text-gray-500">Username</label>
                      <input type="text" id="username" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                
                    <!-- Password -->
                    <div class="space-y-2">
                      <label for="password" class="block text-sm font-medium text-gray-500">Password</label>
                      <div class="relative w-full">
                        <input type="password" id="password" name="password"
                              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                        <button type="button" onclick="togglePassword()"
                                class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-500 hover:text-gray-800">
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
                
                    <!-- Submit Button -->
                    <div>
                      <button type="submit" class="w-full p-3 text-white font-semibold rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 transition duration-300">
                        Login
                      </button>
                    </div>
                    
                  </form>
        </div>
    </div>
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
    if ($gagal) : ?>
    <script>
        swal({
            title: "Login Gagal",
            text: "Username atau password salah.",
            icon: "error",
            button: "Login ulang",
        }).then(() => {
            window.location.href =
            "login.php"
        });
    </script>
    <?php endif; ?>
</body>

</html>
