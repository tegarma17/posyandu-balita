<!-- start: Main -->
<x-main-admin>
    <h1 class="text-2xl font-bold my-4 mx-5">
        @if (Auth::user()->role_id == '1')
            Selamat Datang, {{ Auth::user()->username }}
        @else
            Selamat Datang, {{ Auth::user()->nakes->nama }}
        @endif
    </h1>
</x-main-admin>
<!-- end: Main -->
