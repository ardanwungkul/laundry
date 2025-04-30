@php
    $routeName = request()->route()->getName();

    $route = [
        'transaksi' => ['order.index'],
        'master-data' => [
            'pegawai.index',
            'pegawai.create',
            'pegawai.edit',
            'users.index',
            'users.create',
            'users.edit',
        ],
        // 'sistem' => [
        //     'role.index',
        //     'role.create',
        //     'role.edit',
        //     'users.index',
        //     'users.create',
        //     'users.edit',
        //     'config.index',
        // ],
    ];

@endphp
<div class="flex flex-col top-0 left-0 w-60 bg-white border-r h-screen sticky transition-all duration-300 z-30"
    id="sidebar">
    <div class="h-[60px] border-b border-secondary-3 flex-none flex items-center justify-center bg-color-1-400 px-5">
        <p class="font-medium text-lg text-white whitespace-nowrap expanded-sidebar w-full truncate">
            Laundry</p>
        <button class="p-2 group" id="expand-button">
            <svg class="w-6 h-6 text-white group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
            </svg>
        </button>
    </div>
    <div class="overflow-y-auto flex-grow invisible-scrollbar">
        <ul class="flex flex-col py-4 expanded-sidebar">
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-xs font-light tracking-wide text-gray-500">Menu</div>
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                        </svg>

                    </span>
                    <span class="ml-2 text-xs tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <div id="accordion-collapse" data-accordion="collapse" data-active-classes="bg-secondary-3 font-medium"
                data-inactive-classes="font-light">
                <h2 id="accordion-collapse-heading-transaksi">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-transaksi"
                        aria-expanded="{{ in_array($routeName, $route['transaksi']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-transaksi">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 rotate-90 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Transaksi</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-transaksi" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-transaksi">
                    <li>
                        <a href="{{ route('order.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Order</span>
                        </a>
                    </li>
                </div>
                <h2 id="accordion-collapse-heading-master-data">
                    <button type="button" class="w-full" data-accordion-target="#accordion-collapse-body-master-data"
                        aria-expanded="{{ in_array($routeName, $route['master-data']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-master-data">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 6c0 1.657-3.134 3-7 3S5 7.657 5 6m14 0c0-1.657-3.134-3-7-3S5 4.343 5 6m14 0v6M5 6v6m0 0c0 1.657 3.134 3 7 3s7-1.343 7-3M5 12v6c0 1.657 3.134 3 7 3s7-1.343 7-3v-6" />
                                </svg>

                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Master Data</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-master-data" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-master-data">
                    <li>
                        <a href="{{ route('pegawai.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">User</span>
                        </a>
                    </li>
                </div>
                {{-- <h2 id="accordion-collapse-heading-sistem">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-sistem"
                        aria-expanded="{{ in_array($routeName, $route['sistem']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-sistem">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Sistem</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-sistem" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-sistem">
                    <li>
                        <a href="{{ route('role.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Manajemen Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Manajemen User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('config.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Konfigurasi</span>
                        </a>
                    </li>
                </div> --}}
            </div>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-xs tracking-wide truncate">Logout</span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="collapse-sidebar hidden">
            <ul class="flex flex-col py-4">
                <li class="px-2">
                    <div class="flex flex-row items-center justify-center h-8">
                        <div class="text-xs font-light tracking-wide text-gray-500">Menu</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverTransaksi" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 rotate-90 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverTransaksi"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Transaksi</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('order.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverMasterData" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 6c0 1.657-3.134 3-7 3S5 7.657 5 6m14 0c0-1.657-3.134-3-7-3S5 4.343 5 6m14 0v6M5 6v6m0 0c0 1.657 3.134 3 7 3s7-1.343 7-3M5 12v6c0 1.657 3.134 3 7 3s7-1.343 7-3v-6" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverMasterData"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Master Data</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('pegawai.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Pegawai</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverSistem" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverSistem"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Sistem</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('role.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Manajemen Role</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Manajemen User</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('config.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Konfigurasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    let expandedSidebar = true;
    const sidebar = document.getElementById('sidebar');
    document.getElementById('expand-button').addEventListener('click', function() {
        if (expandedSidebar) {
            expandSidebar()
        } else {
            collapseSidebar()
        }
    });

    function expandSidebar() {
        sidebar.style.width = '240px';
        document.querySelectorAll(".expanded-sidebar").forEach(element => {
            element.classList.remove("hidden-with-transition");
            setTimeout(function() {
                element.classList.remove("hidden");
            }, 100);
        });
        document.querySelectorAll(".collapse-sidebar").forEach(element => {
            element.classList.add("hidden-with-transition");
            setTimeout(function() {
                element.classList.add("hidden");
            }, 100);
        });

        expandedSidebar = false;
    }

    function collapseSidebar() {
        sidebar.style.width = '60px';
        document.querySelectorAll(".expanded-sidebar").forEach(element => {
            element.classList.add("hidden-with-transition");
            setTimeout(function() {
                element.classList.add("hidden");
            }, 100);
        });
        document.querySelectorAll(".collapse-sidebar").forEach(element => {
            element.classList.remove("hidden-with-transition");
            setTimeout(function() {
                element.classList.remove("hidden");
            }, 100);
        });
        expandedSidebar = true;
    }

    function checkScreenSize() {
        if (window.innerWidth >= 1080) {
            expandSidebar();
        } else {
            collapseSidebar();
        }
    }

    checkScreenSize();

    window.addEventListener("resize", checkScreenSize);
</script>
