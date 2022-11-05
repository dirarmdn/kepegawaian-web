<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- css --}}
    @vite('resources/js/app.js')
    @stack('css')

    {{-- flowbite --}}
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"/>
</head>
<body class="bg-ebony-clay-200">
  
    <div class="flex flex-row">
        <aside class="w-64 bg-ebony-clay-800" aria-label="Sidebar">
            <div class="overflow-y-auto w-64 bg-ebony-clay-900 h-screen fixed py-4 px-3 justify-between flex flex-col">
                <div>
                    <a href="/" class="items-center flex flex-col gap-3 pl-2.5 mb-5 mt-8">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap font-main text-gray-100"><i class="fa-solid fa-user-tie mr-4 text-3xl"></i>Kepegawaian</span>
                    </a>
                    <ul class="space-y-2 font-ubuntu mt-20">
                        <li>
                            <a href="/pegawai" class="nav-item {{ ($active === "pegawai") ? 'bg-[#5A6C7C] text-gray-100' : 'text-gray-400' }}">
                                <i class="fa-solid fa-users text-[#B2FEFE] text-xl"></i>
                                <span class="ml-4 font-bold font-main">Data Pegawai</span>
                            </a>
                        </li>
                        <li>
                            <a href="/golongan" class="nav-item {{ ($active === "golongan") ? 'bg-[#5A6C7C] text-gray-100' : 'text-gray-400' }}">
                                <i class="fa-solid fa-address-book text-[#B2FEFE] text-xl"></i>
                                <span class="ml-5 font-bold font-main">Data Golongan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kepegawaian" class="nav-item {{ ($active === "kepegawaian") ? 'bg-[#5A6C7C] text-gray-100' : 'text-gray-400' }}">
                                <i class="fa-solid fa-briefcase text-[#B2FEFE] text-xl"></i>
                                <span class="ml-4 font-bold font-main">Data Kepegawaian</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <hr class="bg-[#b2fefe] my-5 mx-5">
                    <div class="flex flex-row justify-center">
                        <div class="flex items-center p-2 pl-10 pr-5 text-base font-normal">
                            <div class="relative">
                                <!-- Button -->
                                <a href="/logout">
                                    <button type="button" class="flex items-center gap-2 text-[#b2fefe] px-2 font-pop text-lg font-bold">
                                        LOG OUT
                                        <i class="fa-solid fa-arrow-right-from-bracket text-xl"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

    {{-- content --}}
    @yield('content')
    </div>

    @stack('scripts')
    <script src="https://kit.fontawesome.com/f13fa7e0b3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    @if (session()->has('success'))
    <script>
        toastr.success({{ Session::get('success') }});
    </script>
    @endif

</body>
</html>