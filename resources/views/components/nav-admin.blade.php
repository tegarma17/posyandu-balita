<!-- start: Sidebar -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mina:wght@400;700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="text-gray-800 font-serif">

    <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="{{ asset('img/logo.svg') }}" alt="" class="w-8 h-8 rounded object-cover">
            <span class="text-lg font-bold text-white ml-3">Posyandu Online</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group active">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <span class="flex items-center py-2 px-4 text-gray-300 border-b border-b-white">
                    <span class="text-sm">Data Master</span>
                </span>
            </li>
            <li class="mb-1 group">
                <a href="/dta_blt"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-user-fill mr-3 text-lg"></i>
                    <span class="text-sm">Data Balita</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-nurse-fill mr-3 text-lg"></i>
                    <span class="text-sm">Data Tenaga Kesehatan</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-building-2-fill mr-3 text-lg"></i>
                    <span class="text-sm">Data Posyandu</span>
                </a>
            </li>
            <li class="mb-1 group">
                <span class="flex items-center py-2 px-4 text-gray-300 border-b border-b-white">
                    <span class="text-sm">Data Vaksin / Imunisasi</span>
                </span>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-calendar-todo-line mr-3 text-lg"></i>
                    <span class="text-sm">Jadwal</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-syringe-fill mr-3 text-lg"></i>
                    <span class="text-sm">Vaksin / Imunsasi</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-file-fill mr-3 text-lg"></i>
                    <span class="text-sm">Laporan</span>
                </a>
            </li>
            <li class="mb-1 group">
                <span class="flex items-center py-2 px-4 text-gray-300 border-b border-b-white">
                    <span class="text-sm">Data Profile</span>
                </span>
            </li>
            <li class="mb-1 group">
                <a href="/profile"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-user-4-fill mr-3 text-lg"></i>
                    <span class="text-sm">Profile</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-logout-box-fill mr-3 text-lg"></i>
                    <span class="text-sm">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
</body>
<!-- end: Sidebar -->
