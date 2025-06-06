    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    };
    include "../koneksi.php";
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard OSIS</title>
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

    <body class="bg-gray-100 font-[Poppins] min-h-screen">

        <!-- sidebar -->
        <aside class="fixed hidden h-full top-0 left-0 lg:flex flex-col justify-between w-70 bg-gray-100 p-5">
            <nav class="space-y-7">
                <h1 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-xl font-bold font-[poppins] pb-3 border-b border-gray-300">
                    OSIS <span class="text-black">Voting Admin</span>
                </h1>
                <div class="space-y-2 font-semibold">
                    <a href="index.php" class="<?= $current_page == 'index.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : '' ?> flex gap-3 items-center text-sm text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            Dashboard
                        </a>
                    <a href="calon.php" class="<?= $current_page == 'calon.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : '' ?> flex gap-3 items-center text-sm text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                            Calon Ketua OSIS
                    </a>
                        <div class="<?= $current_page== 'tambah_calon.php' ? 'flex' : 'hidden'?> flex gap-3 items-center ps-3 relative -top-2">
                            <svg viewBox="0 0 24 24" fill="" class="size-5" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.07615 8.38268C3.23093 8.75636 3.59557 9 4.00003 9H6.50006V15.5C6.50006 16.9587 7.07952 18.3576 8.11097 19.3891C9.14242 20.4205 10.5414 21 12.0001 21H20.0001C20.5523 21 21.0001 20.5523 21.0001 20V19C21.0001 18.4477 20.5523 18 20.0001 18H12.0001C11.337 18 10.7011 17.7366 10.2323 17.2678C9.76345 16.7989 9.50006 16.163 9.50006 15.5V9H12C12.4045 9 12.7691 8.75636 12.9239 8.38268C13.0787 8.00901 12.9931 7.57889 12.7071 7.29289L9.21179 3.79755C9.20872 3.79444 9.20562 3.79134 9.20251 3.78827L8.70714 3.29289C8.31661 2.90237 7.68345 2.90237 7.29292 3.29289L3.29292 7.29289C3.00692 7.57889 2.92137 8.00901 3.07615 8.38268Z" fill="currentColor" class="text-blue-600"></path> </g></svg>
                            <a href="#" class="<?= $current_page == 'tambah_calon.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : 'hidden' ?> flex gap-3 items-center w-full text-xs text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                Tambah Calon
                            </a>
                        </div>
                        <div class="<?= $current_page== 'edit_calon.php' ? 'flex' : 'hidden'?> flex gap-3 items-center ps-3 relative -top-2">
                            <svg viewBox="0 0 24 24" fill="" class="size-5" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.07615 8.38268C3.23093 8.75636 3.59557 9 4.00003 9H6.50006V15.5C6.50006 16.9587 7.07952 18.3576 8.11097 19.3891C9.14242 20.4205 10.5414 21 12.0001 21H20.0001C20.5523 21 21.0001 20.5523 21.0001 20V19C21.0001 18.4477 20.5523 18 20.0001 18H12.0001C11.337 18 10.7011 17.7366 10.2323 17.2678C9.76345 16.7989 9.50006 16.163 9.50006 15.5V9H12C12.4045 9 12.7691 8.75636 12.9239 8.38268C13.0787 8.00901 12.9931 7.57889 12.7071 7.29289L9.21179 3.79755C9.20872 3.79444 9.20562 3.79134 9.20251 3.78827L8.70714 3.29289C8.31661 2.90237 7.68345 2.90237 7.29292 3.29289L3.29292 7.29289C3.00692 7.57889 2.92137 8.00901 3.07615 8.38268Z" fill="currentColor" class="text-blue-600"></path> </g></svg>
                            <a href="#" class="<?= $current_page == 'edit_calon.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : 'hidden' ?> flex gap-3 items-center w-full text-xs text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                Edit Calon
                            </a>
                        </div>
                    <a href="laporan.php" class="<?= $current_page == 'laporan.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : '' ?> flex gap-3 items-center text-sm text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96l192 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32L96 352c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32zm0 32l0 64 192 0 0-64L96 256zM240 416l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            Laporan
                    </a>
                    <a href="admin.php" class="<?= $current_page == 'admin.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : '' ?> flex gap-3 items-center text-sm text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304l91.4 0c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7l0 .9c0 9.2 2.7 18.5 7.9 26.3L29.7 512C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8l0 30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8l0-30.5c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9l0-30.5zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z"/></svg>
                            Daftar Admin
                    </a>
                        <div class="<?= $current_page== 'tambah_admin.php' ? 'flex' : 'hidden'?> flex gap-3 items-center ps-3 relative -top-2">
                            <svg viewBox="0 0 24 24" fill="" class="size-5" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.07615 8.38268C3.23093 8.75636 3.59557 9 4.00003 9H6.50006V15.5C6.50006 16.9587 7.07952 18.3576 8.11097 19.3891C9.14242 20.4205 10.5414 21 12.0001 21H20.0001C20.5523 21 21.0001 20.5523 21.0001 20V19C21.0001 18.4477 20.5523 18 20.0001 18H12.0001C11.337 18 10.7011 17.7366 10.2323 17.2678C9.76345 16.7989 9.50006 16.163 9.50006 15.5V9H12C12.4045 9 12.7691 8.75636 12.9239 8.38268C13.0787 8.00901 12.9931 7.57889 12.7071 7.29289L9.21179 3.79755C9.20872 3.79444 9.20562 3.79134 9.20251 3.78827L8.70714 3.29289C8.31661 2.90237 7.68345 2.90237 7.29292 3.29289L3.29292 7.29289C3.00692 7.57889 2.92137 8.00901 3.07615 8.38268Z" fill="currentColor" class="text-blue-600"></path> </g></svg>
                            <a href="#" class="<?= $current_page == 'tambah_admin.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : 'hidden' ?> flex gap-3 items-center w-full text-xs text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                Tambah Admin
                            </a>
                        </div>
                        <div class="<?= $current_page== 'edit_admin.php' ? 'flex' : 'hidden'?> flex gap-3 items-center ps-3 relative -top-2">
                            <svg viewBox="0 0 24 24" fill="" class="size-5" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.07615 8.38268C3.23093 8.75636 3.59557 9 4.00003 9H6.50006V15.5C6.50006 16.9587 7.07952 18.3576 8.11097 19.3891C9.14242 20.4205 10.5414 21 12.0001 21H20.0001C20.5523 21 21.0001 20.5523 21.0001 20V19C21.0001 18.4477 20.5523 18 20.0001 18H12.0001C11.337 18 10.7011 17.7366 10.2323 17.2678C9.76345 16.7989 9.50006 16.163 9.50006 15.5V9H12C12.4045 9 12.7691 8.75636 12.9239 8.38268C13.0787 8.00901 12.9931 7.57889 12.7071 7.29289L9.21179 3.79755C9.20872 3.79444 9.20562 3.79134 9.20251 3.78827L8.70714 3.29289C8.31661 2.90237 7.68345 2.90237 7.29292 3.29289L3.29292 7.29289C3.00692 7.57889 2.92137 8.00901 3.07615 8.38268Z" fill="currentColor" class="text-blue-600"></path> </g></svg>
                            <a href="#" class="<?= $current_page == 'edit_admin.php' ? 'bg-gradient-to-r from-blue-700 to-cyan-500 text-white shadow-md' : 'hidden' ?> flex gap-3 items-center w-full text-xs text-gray-700 hover:bg-gray-200 p-3 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM504 312l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                Edit Admin
                            </a>
                        </div>
                </div>
            </nav>
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 justify-between items-center">
                    <div class="flex gap-3"><div class="flex items-center justify-center bg-gradient-to-r from-blue-700 to-cyan-500 text-white rounded-full w-10 aspect-square">
                        <?= strtoupper(substr($_SESSION['nama_lengkap'], 0, 1)) ?>
                    </div>
                    <div class="flex flex-col">
                        <h6 class="text-sm font-semibold"><?=$_SESSION['username']?></h6>
                        <h6 class="text-xs font-semibold text-gray-800"><?=$_SESSION['nama_lengkap']?></h6>
                    </div></div>
                    <button onclick="konfirmasiLogout()" class="bg-red-100 hover:bg-red-200 text-xs text-red-500 p-3 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4" fill="currentColor"> <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                    </button>
                </div>
            </div>
            
        </aside>

        <!-- mobile navbar -->
        <nav class="fixed lg:hidden flex justify-between items-center w-full h-fit bg-gray-100 p-5 z-50 border-b border-gray-300">
            <nav class="">
                <h1 class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent text-xl font-bold font-[poppins]">
                    OSIS <span class="text-black">Voting Admin</span>
                </h1>
            </nav>
            <div class="flex flex-col gap-2">
                <div class="flex gap-2 justify-between items-center">
                    <div class="flex gap-3"><div class="flex self-center items-center justify-center bg-gradient-to-r from-blue-700 to-cyan-500 text-white rounded-full w-8 h-8 aspect-square">
                        <?= strtoupper(substr($_SESSION['nama_lengkap'], 0, 1)) ?>
                    </div>
                    <div class="flex flex-col">
                        <h6 class="text-sm font-semibold"><?=$_SESSION['username']?></h6>
                        <h6 class="text-xs font-semibold text-gray-800"><?=$_SESSION['nama_lengkap']?></h6>
                    </div>
                    <button onclick="konfirmasiLogout()" class="bg-red-100 hover:bg-red-200 text-xs text-red-500 p-3 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4" fill="currentColor"> <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                    </button>
                    </div>
                </div>
            </div>
            
    </nav>


        <?php
        if ($current_page == 'index.php') {
            echo '<h3 class="lg:ms-70 mx-5 relative top-25 lg:top-8 bg-white p-5 rounded-xl text-xl font-semibold text-gray-600 border border-gray-300 shadow-sm">
                Welcome Back, <span class="bg-gradient-to-r from-blue-700 to-cyan-500 bg-clip-text text-transparent w-fit">' . $_SESSION['username'] . '</span>!
            </h3>';
        }
        ?>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function konfirmasiLogout() {
            swal({
                title: "Apakah kamu yakin untuk keluar?",
                text: "Kamu harus login lagi untuk masuk.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // Redirect ke file PHP yang akan menghapus data
                    window.location.href = "logout.php";
                }
                else{

                }
            });
            }
        </script>

        <!-- main content -->
        <main class="rounded-xl lg:ms-70 mx-5 my-4 mt-30 lg:mt-13 bg-white p-5 h-fit z-100 shadow-sm border border-gray-300 flex flex-col gap-5">