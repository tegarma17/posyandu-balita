<x-nav-admin></x-nav-admin>
<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-600 sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>

        <ul class="ml-auto flex items-center">
            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center">
                    <img src="{{ asset('img/profile.svg') }}" alt=""
                        class="w-8 h-8 rounded block object-cover align-middle">
                </button>
                <ul
                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    {{ $slot }}

    <p class="my-10 text-sm text-center text-gray-500">
        Copyright
        &copy; {{ date('Y') }}
        Posyandu Online.
    </p>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ 'js/script.js' }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</main>
