@php
    $carts = \App\Cart\Cart::cartCollection()->sortKeys();
    $userRole = auth()->user()?->role();
@endphp
<section style="background: {{ $header['main']['bg_color'] }}; z-index: 999;" class="sticky top-0 z-50 md:bg-white bg-gray-12 max-h-24">
    <div class="{{ isset($header['main']) && in_array(1, $header['main']) ? 'py-4' : '' }}">
        <div class="layout-wrapper px-4 xl:px-0 flex justify-between">
            @if (isset($header['main']['show_logo']) && $header['main']['show_logo'] == 1 && $headerLogo->objectFile)
                <div class="hidden md:block ">
                    <div class="h-9 3xl:w-63 pt-1p">
                        <a href="{{ route('site.index') }}">
                            <img class="h-11 {{ isset($header['main']) && count(array_filter($header['main'])) == 1 ? '' : 'mt-2' }}" src="{{ $headerLogo->fileUrlQuery() }}" alt="{{ __('Image') }}">
                        </a>
                    </div>
                </div>
            @endif

            @if (isset($header['main']['show_searchbar']) && $header['main']['show_searchbar'] == 1)
                <div class="md:w-46% w-full {{ isset($header['main']['show_logo']) && $header['main']['show_logo'] == 1 ? '  header-searchbar-margin ml-32' : '3xl:ml-300p lg:ml-60 md:ml-48' }}">
                    <form method="GET" action="{{ route('site.productSearch','') }}">
                        <div class="new-header-search-bar" style="display: flex !important; flex-direction: row !important; align-items: center; background: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); overflow: hidden; height: 48px; width: 100%;">
                            <!-- Location Section -->
                            <div class="new-header-location" style="display: flex !important; flex-direction: row !important; align-items: center; padding: 0 16px; background: #f5f5f5; height: 100%; border-right: 1px solid #e5e5e5; cursor: pointer; min-width: 160px; flex-shrink: 0;">
                                <svg class="location-icon" style="flex-shrink: 0; margin-right: 8px;" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C11.7614 2 14 4.23858 14 7C14 10.5 9 16 9 16C9 16 4 10.5 4 7C4 4.23858 6.23858 2 9 2ZM9 9C10.1046 9 11 8.10457 11 7C11 5.89543 10.1046 5 9 5C7.89543 5 7 5.89543 7 7C7 8.10457 7.89543 9 9 9Z" fill="#898989"/>
                                </svg>
                                <span class="location-text" style="color: #1a56db; font-size: 14px; font-weight: 500; margin-right: 8px; white-space: nowrap;">Your Location</span>
                                <svg class="dropdown-arrow" style="flex-shrink: 0;" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 5L9 1" stroke="#898989" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>

                            <!-- Search Input Section -->
                            <div class="new-header-search-input-wrapper" style="display: flex !important; flex-direction: row !important; align-items: center; flex: 1; height: 100%; position: relative; min-width: 0;">
                                <input type="search" name="keyword" placeholder="I'm searching for..." value="{{ $searchKeyword ?? null }}" id="itemSearch" class="new-header-search-input" style="flex: 1; height: 100%; border: none; outline: none; padding: 0 16px; font-size: 14px; color: #2c2c2c; background: transparent; min-width: 0;"/>
                                <button type="submit" class="new-header-search-button" style="display: flex !important; flex-direction: row !important; align-items: center; justify-content: center; width: 52px; height: 100%; background: #FCCA19; border: none; border-radius: 0 12px 12px 0; cursor: pointer; flex-shrink: 0;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.66667 2C5.01873 2 2 5.01873 2 8.66667C2 12.3146 5.01873 15.3333 8.66667 15.3333C10.3755 15.3333 11.918 14.6416 13.0247 13.5247L17.7071 18.2071C18.0976 18.5976 18.7308 18.5976 19.1213 18.2071C19.5118 17.8166 19.5118 17.1834 19.1213 16.7929L14.4389 12.1105C15.5558 11.0038 16.2475 9.46129 16.2475 7.75242C16.2475 4.10448 13.2288 1.08575 9.58083 1.08575H8.66667V2ZM4.16667 8.66667C4.16667 6.13783 6.13783 4.16667 8.66667 4.16667C11.1955 4.16667 13.1667 6.13783 13.1667 8.66667C13.1667 11.1955 11.1955 13.1667 8.66667 13.1667C6.13783 13.1667 4.16667 11.1955 4.16667 8.66667Z" fill="white"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            <div class="ltr:ml-auto rtl:ml-0">
                <div class="flex items-end rev {{ isset($header['main']['show_searchbar']) && $header['main']['show_searchbar'] == 1 ? 'justify-end' : 'ml-2' }}">
                    <ul class="flex -mt-1.5 ltr:relative">

                        {{-- Account Icon: beside wishlist --}}
                        <style>
                            #header-account-guest-btn,
                            #header-account-guest-btn:link,
                            #header-account-guest-btn:hover,
                            #header-account-guest-btn:active,
                            #header-account-guest-btn:focus,
                            #header-account-guest-btn:visited,
                            #header-account-guest-btn.active,
                            #header-account-guest-btn *,
                            #header-account-guest-btn.active * {
                                font-weight: 500 !important;
                                outline: none !important;
                                text-decoration: none !important;
                                -webkit-text-stroke: 0 !important;
                            }
                            #header-account-btn,
                            #header-account-btn:hover,
                            #header-account-btn:active,
                            #header-account-btn:focus,
                            #header-account-btn.active,
                            #header-account-btn *,
                            #header-account-btn.active * {
                                font-weight: 500 !important;
                                outline: none !important;
                                -webkit-text-stroke: 0 !important;
                            }
                            #header-account-guest-btn svg path,
                            #header-account-guest-btn svg circle,
                            #header-account-btn svg path,
                            #header-account-btn svg circle {
                                stroke-width: 0 !important;
                            }
                        </style>
                        <li class="hidden md:block ml-5 mt-[4px]">
                            <div class="flex flex-col justify-center items-center">
                                @auth
                                    {{-- Logged-in: avatar + dropdown --}}
                                    <div class="relative" x-data="{ accountOpen: false }" x-cloak>
                                        <button @click="accountOpen = !accountOpen"
                                                @click.outside="accountOpen = false"
                                                class="md:px-2 lg:px-0 py-2 block focus:outline-none select-none"
                                                id="header-account-btn">
                                            <div slot="icon" class="relative">
                                                <div class="flex justify-center">
                                                    <img class="mt-0.5 rounded-full object-cover" style="height: 22px; width: 22px;"
                                                         src="{{ Auth::user()->fileUrlQuery() }}"
                                                         alt="{{ __('Avatar') }}">
                                                </div>
                                                <p style="color: {{ $header['main']['text_color'] }}; font-weight: 500;"
                                                   class="text-xs text-xss roboto-medium leading-3 text-center mt-11p">
                                                    {{ __('Account') }}
                                                </p>
                                            </div>
                                        </button>

                                        {{-- Dropdown --}}
                                        <div x-show="accountOpen"
                                             x-transition:enter="transition ease-out duration-150"
                                             x-transition:enter-start="opacity-0 scale-95"
                                             x-transition:enter-end="opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-100"
                                             x-transition:leave-start="opacity-100 scale-100"
                                             x-transition:leave-end="opacity-0 scale-95"
                                             class="absolute ltr:right-0 rtl:left-0 top-full mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-xl py-1 origin-top-right"
                                             style="display: none; z-index: 9999;">
                                            {{-- User info --}}
                                            <div class="px-4 py-3 border-b border-gray-100">
                                                <p class="text-sm font-semibold text-gray-800 truncate dm-sans">{{ Auth::user()->name }}</p>
                                                <p class="text-xs text-gray-500 truncate roboto-medium">{{ Auth::user()->email }}</p>
                                            </div>
                                            <ul class="py-1">
                                                @if (isset($header['main']['show_account']) && $header['main']['show_account'] == 1)
                                                    <li>
                                                        <a href="{{ route('site.dashboard') }}"
                                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                                            <svg class="w-4 h-4 ltr:mr-2.5 rtl:ml-2.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                            </svg>
                                                            {{ __('My Account') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($userRole->type == 'admin')
                                                    <li>
                                                        <a href="{{ route('dashboard') }}" target="_blank"
                                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                                            <svg class="w-4 h-4 ltr:mr-2.5 rtl:ml-2.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            </svg>
                                                            {{ __('Admin Panel') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($userRole->type == 'admin' || ($userRole->type == 'vendor' && optional(auth()->user()->vendors()->first())->status == 'Active'))
                                                    <li>
                                                        <a href="{{ route('vendor-dashboard') }}" target="_blank"
                                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                                            <svg class="w-4 h-4 ltr:mr-2.5 rtl:ml-2.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                            </svg>
                                                            {{ __('Vendor Panel') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="border-t border-gray-100 mt-1 pt-1">
                                                    <a href="{{ route('site.logout') }}"
                                                       class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                                                        <svg class="w-4 h-4 ltr:mr-2.5 rtl:ml-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                                        </svg>
                                                        {{ __('Logout') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    {{-- Guest: person icon → opens login modal --}}
                                    <a href="javascript:void(0)"
                                       class="open-login-modal md:px-2 lg:px-0 py-2 block w-fill select-none"
                                       id="header-account-guest-btn"
                                       style="font-weight: normal;"
                                       aria-label="{{ __('Sign In') }}">
                                        <div slot="icon" class="relative">
                                            <div class="flex justify-center">
                                                <svg class="mt-0.5" width="22" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10.4102 2.38517C8.43424 2.38517 6.83243 3.98698 6.83243 5.96291C6.83243 7.93885 8.43424 9.54066 10.4102 9.54066C12.3861 9.54066 13.9879 7.93885 13.9879 5.96291C13.9879 3.98698 12.3861 2.38517 10.4102 2.38517ZM4.44727 5.96291C4.44727 2.66969 7.11695 0 10.4102 0C13.7034 0 16.3731 2.66969 16.3731 5.96291C16.3731 9.25614 13.7034 11.9258 10.4102 11.9258C7.11695 11.9258 4.44727 9.25614 4.44727 5.96291Z"
                                                          fill="{{ $header['main']['text_color'] }}"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M4.00564 15.9486C5.86929 14.8761 8.11934 14.311 10.4085 14.311C12.6976 14.311 14.9477 14.8761 16.8113 15.9486C18.6743 17.0207 20.0908 18.5688 20.7471 20.4058C20.9687 21.0261 20.6455 21.7085 20.0253 21.9301C19.405 22.1517 18.7226 21.8286 18.501 21.2083C18.0701 20.0024 17.0911 18.8615 15.6216 18.0159C14.1528 17.1706 12.3198 16.6961 10.4085 16.6961C8.49717 16.6961 6.66414 17.1706 5.19535 18.0159C3.72586 18.8615 2.74681 20.0024 2.31597 21.2083C2.09437 21.8286 1.41193 22.1517 0.791676 21.9301C0.171426 21.7085 -0.151748 21.0261 0.0698463 20.4058C0.726164 18.5688 2.14268 17.0207 4.00564 15.9486Z"
                                                          fill="{{ $header['main']['text_color'] }}"/>
                                                </svg>
                                            </div>
                                            <p style="color: {{ $header['main']['text_color'] }}; font-weight: 500;" class="text-xs text-xss roboto-medium leading-3 text-center mt-11p">{{ __('Account') }}</p>
                                        </div>
                                    </a>
                                @endauth
                            </div>
                        </li>
                        
                        @if (isset($header['main']['show_wishlist']) && $header['main']['show_wishlist'] == 1)
                            <li class="hidden md:block ml-5">
                                <div class="flex flex-col justify-center items-center">
                                    <a href="{{ route('site.wishlist') }}" class="md:px-2 lg:px-0 py-2 block w-fill">
                                        <div slot="icon" class="relative">
                                            @php
                                                $totalWishlist = \App\Models\User::totalWishlist();
                                                $class = $totalWishlist != 0 ? 'h-4 w-4' : '';
                                            @endphp
                                            <div class="flex justify-center">
                                                <div class="absolute">
                                                    <div class="absolute text-xss rounded-full roboto-medium {{ $class }} flex items-center justify-center ml-0.5 -mt-1.5 bg-reds-3 text-white" id="totalWishlistItem">
                                                        {{ $totalWishlist != 0 ? $totalWishlist : ''}}
                                                    </div>
                                                </div>
                                                <svg class="mt-0.5" width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.45067 10.9082L10.4033 17.4395C10.6428 17.6644 10.7625 17.7769 10.9037 17.8046C10.9673 17.8171 11.0327 17.8171 11.0963 17.8046C11.2375 17.7769 11.3572 17.6644 11.5967 17.4395L18.5493 10.9082C20.5055 9.07059 20.743 6.0466 19.0978 3.92607L18.7885 3.52734C16.8203 0.99058 12.8696 1.41601 11.4867 4.31365C11.2913 4.72296 10.7087 4.72296 10.5133 4.31365C9.13037 1.41601 5.17972 0.990584 3.21154 3.52735L2.90219 3.92607C1.25695 6.0466 1.4945 9.07059 3.45067 10.9082Z" stroke="{{ $header['main']['text_color'] }}" stroke-width="2"/>
                                                </svg>
                                            </div>
                                            <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium leading-3 text-center mt-11p">{{ __('Wishlist') }}</p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endif
                        @doAction('before_add_to_cart_header', $header)
                        @if (isset($header['main']['show_cart']) && $header['main']['show_cart'] == 1)
                        <li class="absolute ltr:right-0 rtl:left-0 {{ isset($header['main']['show_searchbar']) && $header['main']['show_searchbar'] == 1 ? 'rtl:bottom-[90px]' : 'rtl:bottom-[42px]' }} ltr:bottom-6 md:relative ltr:md:bottom-0 rtl:md:bottom-0 ml-5">
                            <div class="md:my-2 mt-4">
                                <div class="items-center md:flex">
                                    <button id="openSidenavBtn" class="rounded-md">
                                        <div class="flex flex-col justify-center lg:mr-0 items-center">
                                            <div slot="icon" class="relative">
                                                <div class="flex justify-center">
                                                    <div>
                                                        <div class="absolute text-xss roboto-medium flex items-center justify-center rounded-full h-4 w-4 ltr:ml-3 rtl:mr-3 -mt-1.5 bg-reds-3 text-white {{ $carts->count() == 0 ? 'display-none' : null }}"
                                                            id="totalCartItem">
                                                            {{ $carts->count() }}
                                                        </div>
                                                    </div>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8 12L8 8C8 5.79086 9.79086 4 12 4V4C14.2091 4 16 5.79086 16 8L16 12"
                                                            stroke="{{ $header['main']['text_color'] }}"
                                                            stroke-width="2" stroke-linecap="round" />
                                                        <path
                                                            d="M3.69435 12.6678C3.83942 10.9269 3.91196 10.0565 4.48605 9.52824C5.06013 9 5.9336 9 7.68053 9H16.3195C18.0664 9 18.9399 9 19.514 9.52824C20.088 10.0565 20.1606 10.9269 20.3057 12.6678L20.8195 18.8339C20.904 19.8474 20.9462 20.3542 20.6491 20.6771C20.352 21 19.8435 21 18.8264 21H5.1736C4.15655 21 3.64802 21 3.35092 20.6771C3.05382 20.3542 3.09605 19.8474 3.18051 18.8339L3.69435 12.6678Z"
                                                            stroke="{{ $header['main']['text_color'] }}"
                                                            stroke-width="2" />
                                                    </svg>
                                                </div>
                                                <p style="color: {{ $header['main']['text_color'] }}"
                                                    class="hidden md:block text-xs leading-3 text-xss font-medium roboto-medium text-center mt-2">
                                                    {{ __('Your Cart') }}</p>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <!-- Backdrop -->
                                <div id="sidebarOverlay" class="fixed inset-0 bg-black opacity-50 hidden z-40">
                                </div>

                                <section id="sideNavbar"
                                    class=" inset-y-0 ltr:right-0 rtl:left-0 w-318p xxs:w-400p sm:w-400p bg-white z-50 sidebar-nav">
                                    <div class="relative h-screen">
                                        <div class="px-30p">
                                            <div class="w-full flex justify-between items-center relative border-b border-gray-2">
                                                <div class="flex items-center">
                                                    <span class="text-gray-12 ltr:mr-2 rtl:ml-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.95145 10.8918C5.39254 10.8918 4.93945 10.4388 4.93945 9.87985L4.93945 5.83186C4.93945 3.03731 7.20488 0.771874 9.99944 0.771875C12.794 0.771874 15.0594 3.03731 15.0594 5.83186L15.0594 9.87985C15.0594 10.4388 14.6063 10.8918 14.0474 10.8918C13.4885 10.8918 13.0354 10.4388 13.0354 9.87985L13.0354 5.83186C13.0354 4.15513 11.6762 2.79587 9.99944 2.79587C8.32271 2.79587 6.96345 4.15513 6.96345 5.83186L6.96345 9.87985C6.96345 10.4388 6.51036 10.8918 5.95145 10.8918Z" fill="currentColor"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56553 5.83203C5.58652 5.83203 5.60758 5.83204 5.62871 5.83204L14.4345 5.83203C15.2643 5.83199 15.9829 5.83194 16.5631 5.90728C17.1867 5.98826 17.7854 6.17025 18.2893 6.6339C18.7932 7.09754 19.0243 7.67906 19.1568 8.29382C19.28 8.86574 19.3397 9.58182 19.4085 10.4088L19.9338 16.7119C19.9354 16.7312 19.937 16.7505 19.9386 16.7698C19.9773 17.2323 20.0145 17.6776 19.9944 18.0458C19.9719 18.4585 19.8723 18.9392 19.4976 19.3465C19.1228 19.7538 18.6521 19.8929 18.2426 19.9496C17.8773 20.0002 17.4305 20.0001 16.9665 20C16.9471 20 16.9277 20 16.9083 20H3.0917C3.07229 20 3.05291 20 3.03355 20C2.56948 20.0001 2.12265 20.0002 1.75736 19.9496C1.34793 19.8929 0.877202 19.7538 0.502445 19.3465C0.127687 18.9392 0.0281424 18.4585 0.00563022 18.0458C-0.0144547 17.6776 0.0227368 17.2323 0.0613632 16.7698C0.0629743 16.7505 0.0645879 16.7312 0.0661998 16.7119L0.586205 10.4718C0.58796 10.4508 0.589708 10.4298 0.59145 10.4088C0.66032 9.58183 0.719952 8.86574 0.843213 8.29382C0.975704 7.67906 1.20678 7.09754 1.71067 6.6339C2.21456 6.17025 2.81326 5.98826 3.4369 5.90728C4.01708 5.83194 4.73565 5.83199 5.56553 5.83203ZM3.69753 7.91443C3.29198 7.96709 3.15822 8.05239 3.08114 8.12332C3.00406 8.19424 2.90794 8.32045 2.82178 8.72023C2.72951 9.14838 2.67888 9.73178 2.60321 10.6399L2.0832 16.88C2.03799 17.4225 2.01511 17.7246 2.02662 17.9356C2.02677 17.9383 2.02692 17.941 2.02708 17.9436C2.02968 17.944 2.03234 17.9443 2.03505 17.9447C2.24432 17.9737 2.54726 17.976 3.0917 17.976H16.9083C17.4527 17.976 17.7557 17.9737 17.9649 17.9447C17.9677 17.9443 17.9703 17.944 17.9729 17.9436C17.9731 17.941 17.9732 17.9383 17.9734 17.9356C17.9849 17.7246 17.962 17.4225 17.9168 16.88L17.3968 10.6399C17.3211 9.73178 17.2705 9.14838 17.1782 8.72023C17.0921 8.32045 16.9959 8.19424 16.9189 8.12332C16.8418 8.05239 16.708 7.96709 16.3025 7.91443C15.8681 7.85803 15.2826 7.85603 14.3713 7.85603H5.62871C4.71745 7.85603 4.13186 7.85803 3.69753 7.91443Z" fill="currentColor"/>
                                                        </svg>
                                                    </span>
                                                    <h3 class="dm-bold font-bold text-22">{{ __('Shopping Cart') }}</h3>
                                                </div>
                                                <div class="flex items-center relative z-50">
                                                    <button id="closeSidenavBtn" class="flex text-2xl items-center justify-center   ml-2 py-6 lg:py-7 focus:outline-none transition-opacity hover:opacity-60" aria-label="close">
                                                        <span class="dm-sans font-medium text-gray-10 text-base">{{ __('Close') }}</span>
                                                        <span class="text-gray-10 ltr:pl-2 rtl:pr-2">
                                                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1016 0L8.62991 1.50221L11.016 3.93778H1.04064C0.46591 3.93778 0 4.41335 0 5C0 5.58665 0.46591 6.06222 1.04064 6.06222H11.016L8.62991 8.49779L10.1016 10L15 5L10.1016 0Z" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Empty Card -->
                                            <div id="emptyCart" class="flex flex-col items-center justify-center absolute inset-0">
                                                <div class="flex justify-center items-center rounded-full">
                                                    <span class="text-gray-10 text-4xl block">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="36" viewBox="0 0 31 36" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38222 6.84833C3.93638 7.30009 3.87492 7.60249 3.87492 7.74983C3.87492 7.89717 3.93638 8.19958 4.38222 8.65133C4.83629 9.11141 5.58938 9.61461 6.67294 10.079C8.83316 11.0048 11.9525 11.6247 15.4997 11.6247C19.0468 11.6247 22.1662 11.0048 24.3264 10.079C25.4099 9.61461 26.163 9.11141 26.6171 8.65133C27.0629 8.19958 27.1244 7.89717 27.1244 7.74983C27.1244 7.60249 27.0629 7.30009 26.6171 6.84833C26.163 6.38825 25.4099 5.88505 24.3264 5.42067C22.1662 4.49486 19.0468 3.87492 15.4997 3.87492C11.9525 3.87492 8.83316 4.49486 6.67294 5.42067C5.58938 5.88505 4.83629 6.38825 4.38222 6.84833ZM5.14653 1.85906C7.89486 0.681202 11.5566 0 15.4997 0C19.4427 0 23.1045 0.681202 25.8528 1.85906C27.2235 2.44651 28.4566 3.19577 29.3751 4.12645C30.3018 5.06547 30.9993 6.29213 30.9993 7.74983C30.9993 9.20753 30.3018 10.4342 29.3751 11.3732C28.4566 12.3039 27.2235 13.0532 25.8528 13.6406C23.1045 14.8185 19.4427 15.4997 15.4997 15.4997C11.5566 15.4997 7.89486 14.8185 5.14653 13.6406C3.77582 13.0532 2.54277 12.3039 1.62426 11.3732C0.697534 10.4342 0 9.20753 0 7.74983C0 6.29213 0.697534 5.06547 1.62426 4.12645C2.54277 3.19577 3.77582 2.44651 5.14653 1.85906Z" fill="#898989"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.59121 5.84409C2.64398 5.65267 3.65259 6.35094 3.844 7.40371L7.60672 28.0987C12.0728 32.1731 18.9272 32.1731 23.3933 28.0987L27.156 7.40371C27.3474 6.35094 28.356 5.65267 29.4088 5.84409C30.4616 6.0355 31.1598 7.04411 30.9684 8.09688L27.1008 29.3686C27.0256 29.7826 26.8258 30.1638 26.5283 30.4613C20.4375 36.5521 10.5625 36.5521 4.47173 30.4613C4.17418 30.1638 3.97444 29.7826 3.89916 29.3686L0.0315873 8.09688C-0.159825 7.04411 0.538442 6.0355 1.59121 5.84409Z" fill="#898989"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <h3 class="dm-sans font-medium text-gray-10 text-xl pt-2">{{ __('Your cart is empty') }}</h3>
                                                <p class="px-12 text-center roboto-regular font-normal text-13 text-gray-10 pt-2">{{ __('No items added in your cart. Please add product to your cart list.') }}</p>
                                            </div>
                                            <!-- Empty Card End -->
                                        </div>
                                        <div>

                                        </div>
                                        <div class="w-full px-30p padding-bottom-150p h-60s scrollbar-w-2 overflow-auto mt-10p" id="cart-header">
                                            @forelse ($carts as $key => $cart)
                                                @php $product = \App\Models\Product::find($cart['id']); @endphp

                                                <div class="flex cursor-pointer border-gray-100 cart-item-header mt-6"
                                                    id="cart-item-header-{{ $key }}">
                                                    <div class="h-72p w-24 border border-gray-2 rounded">
                                                        <img src="{{ $cart['photo'] ?? '' }}" class="h-full w-full p-0.5 object-cover" alt="img product">
                                                    </div>
                                                    <div class="flex flex-col justify-center text-sm w-64 ltr:ml-5 rtl:mr-5">
                                                        <a href="{{ route('site.productDetails', ['slug' => $cart['type'] == 'Variable Product' ? $cart['parent_slug'] : $cart['slug']]) }}">
                                                            <div class="dm-sans font-medium text-gray-12 text-18 pb-2">{{ trimWords($product->name, 16)}}</div>
                                                        </a>
                                                        <div class="cart-item-quantity roboto-medium font-medium text-gray-10 text-base leading-5">{{
                                                            $cart['quantity'] }} X {{
                                                            formatMultiCurrencyAmount($cart['price']) }}
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col w-18 font-medium justify-center ml-10">
                                                        <a href="javascript:void(0)"
                                                            class="w-4 h-4 rounded-full cursor-pointer text-red-700 delete-cart-item"
                                                            data-index="{{ $key }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.455612 0.455612C1.06309 -0.151871 2.04802 -0.151871 2.6555 0.455612L11.9888 9.78895C12.5963 10.3964 12.5963 11.3814 11.9888 11.9888C11.3814 12.5963 10.3964 12.5963 9.78895 11.9888L0.455612 2.6555C-0.151871 2.04802 -0.151871 1.06309 0.455612 0.455612Z" fill="#898989"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9897 0.455612C11.3822 -0.151871 10.3973 -0.151871 9.78981 0.455612L0.45648 9.78895C-0.151003 10.3964 -0.151003 11.3814 0.45648 11.9888C1.06396 12.5963 2.04889 12.5963 2.65637 11.9888L11.9897 2.6555C12.5972 2.04802 12.5972 1.06309 11.9897 0.455612Z" fill="#898989"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse

                                            @php
                                                $totalPrice = $carts->sum(function ($carts) {
                                                    return $carts['price'] * $carts['quantity'];
                                                });
                                            @endphp
                                            <div class="absolute justify-center bg-white flex flex-col inset-x-0 px-30p mt-30p bottom-5">
                                                <div class="border-t border-gray-2">
                                                    <div class="pt-4 pb-30p flex justify-between dm-sans font-medium text-gray-12 text-22">
                                                        <p>{{ __('Subtotal') }}:</p>
                                                        <p id="cart-item-total-price">{{ multiCurrencyFormatNumber($totalPrice)}}</p>
                                                    </div>
                                                    @if ($totalPrice > 0)
                                                        <div id="view-cart-display" class="bg-white text-gray-12 border border-gray-2 p-2 w-full rounded mb-10p">
                                                            <a href="{{ route('site.cart') }}" class="flex justify-center px-4 py-2 rounded font-bold cursor-pointer dm-bold text-18">
                                                            {{ __('View Cart') }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div id="checkout-display" class="{{ $totalPrice > 0 ? 'bg-gray-12 text-white' : 'text-gray-10 bg-gray-11'}} mb-30p p-2 w-full rounded">
                                                        <a href="{{ $totalPrice > 0 ? route('site.checkOut',['select' => 'all']) : 'javascript:void(0)' }}" class="flex justify-center px-4 py-2 font-bold cursor-pointer dm-bold text-18">{{ __('Go to Checkout') }}</a>
                                                    </div>
                                                    @if ($totalPrice > 0)
                                                        <div class="text-gray-10 mt-5" aria-label="Clear All" id="cart_clear_all">
                                                            <div id="clear-all-display" class="flex justify-center items-center cursor-pointer">
                                                                <p class="dm-sans font-medium text-gray-10 ltr:mr-2 rtl:ml-2">
                                                                    {{ __('Clear All') }}
                                                                </p>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 11.6667C5.3731 11.6667 5 11.2937 5 10.8334L5 8.33341C5 7.87318 5.3731 7.50008 5.83333 7.50008C6.29357 7.50008 6.66667 7.87318 6.66667 8.33341L6.66667 10.8334C6.66667 11.2937 6.29357 11.6667 5.83333 11.6667Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.16732 11.6667C8.70708 11.6667 8.33398 11.2937 8.33398 10.8334L8.33398 8.33341C8.33398 7.87318 8.70708 7.50008 9.16732 7.50008C9.62755 7.50008 10.0007 7.87318 10.0007 8.33341L10.0007 10.8334C10.0007 11.2937 9.62756 11.6667 9.16732 11.6667Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.8552 5.01385C0.657717 5.00037 0.399686 4.99992 0 4.99992V3.33325C0.00891358 3.33325 0.0177978 3.33325 0.0266526 3.33325C0.0445462 3.33325 0.0623196 3.33325 0.0799725 3.33325H14.92C14.9377 3.33325 14.9555 3.33325 14.9733 3.33325L15 3.33325V4.99992C14.6003 4.99992 14.3423 5.00037 14.1448 5.01385C13.9548 5.02681 13.8824 5.04899 13.8478 5.06335C13.6436 5.14793 13.4813 5.31016 13.3968 5.51435C13.3824 5.54903 13.3602 5.62139 13.3473 5.81139C13.3338 6.00887 13.3333 6.2669 13.3333 6.66659L13.3333 11.7214C13.3334 12.4602 13.3334 13.0967 13.2649 13.6064C13.1914 14.1527 13.0258 14.6763 12.6011 15.101C12.1764 15.5257 11.6528 15.6914 11.1065 15.7648C10.5968 15.8333 9.96027 15.8333 9.22153 15.8333H5.77847C5.03973 15.8333 4.40322 15.8333 3.89351 15.7648C3.34724 15.6914 2.82362 15.5257 2.3989 15.101C1.97418 14.6763 1.80856 14.1527 1.73512 13.6064C1.66659 13.0967 1.66662 12.4602 1.66666 11.7214L1.66667 6.66659C1.66667 6.2669 1.66622 6.00887 1.65274 5.81139C1.63978 5.62139 1.6176 5.54903 1.60323 5.51435C1.51865 5.31016 1.35643 5.14793 1.15224 5.06335C1.11756 5.04899 1.0452 5.02681 0.8552 5.01385ZM11.8107 4.99992H3.18933C3.26749 5.23126 3.29962 5.46462 3.31554 5.69793C3.33335 5.95898 3.33334 6.27439 3.33333 6.63993L3.33333 11.6666C3.33333 12.4758 3.3351 12.9989 3.38692 13.3843C3.43552 13.7458 3.51397 13.8591 3.57741 13.9225C3.64085 13.9859 3.75414 14.0644 4.11559 14.113C4.50101 14.1648 5.0241 14.1666 5.83333 14.1666H9.16667C9.9759 14.1666 10.499 14.1648 10.8844 14.113C11.2459 14.0644 11.3592 13.9859 11.4226 13.9225C11.486 13.8591 11.5645 13.7458 11.6131 13.3843C11.6649 12.9989 11.6667 12.4758 11.6667 11.6666V6.63993C11.6667 6.27439 11.6666 5.95898 11.6845 5.69793C11.7004 5.46462 11.7325 5.23126 11.8107 4.99992Z" fill="#898989"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.67175 0.101025C8.31844 0.0332505 7.90785 0 7.50015 0C7.09245 4.96705e-08 6.68185 0.0332505 6.32855 0.101025C6.15192 0.134907 5.979 0.179406 5.82234 0.238021C5.68005 0.291261 5.48597 0.37965 5.32178 0.532849C4.98526 0.84682 4.96699 1.37414 5.28096 1.71065C5.57723 2.0282 6.06348 2.06237 6.40011 1.8014C6.40204 1.80065 6.40412 1.79985 6.40639 1.799C6.45085 1.78237 6.52809 1.7598 6.64254 1.73785C6.87139 1.69395 7.17407 1.66667 7.50015 1.66667C7.82623 1.66667 8.12891 1.69395 8.35775 1.73785C8.4722 1.7598 8.54944 1.78237 8.59391 1.799C8.59617 1.79985 8.59826 1.80065 8.60018 1.8014C8.93681 2.06237 9.42306 2.0282 9.71933 1.71065C10.0333 1.37414 10.015 0.846819 9.67852 0.532848C9.51432 0.37965 9.32025 0.29126 9.17795 0.23802C9.02129 0.179405 8.84837 0.134907 8.67175 0.101025Z" fill="#898989"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>
                        @endif
                        @doAction('after_add_to_cart_header', $header)
                        @if (isset($header['main']['show_track']) && $header['main']['show_track'] == 1)
                            <li class="hidden md:block ml-5">
                                <a href="{{ route('site.trackOrder') }}" class="relative py-2 block w-fill ">
                                    <div slot="icon" class="relative flex flex-col justify-center items-center">
                                        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.66667C7.39763 3.66667 3.66667 7.39763 3.66667 12C3.66667 16.6024 7.39763 20.3333 12 20.3333C16.6024 20.3333 20.3333 16.6024 20.3333 12C20.3333 7.39763 16.6024 3.66667 12 3.66667ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="{{ $header['main']['text_color'] }}"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7559 7.2441C16.9791 7.46729 17.0571 7.79743 16.9573 8.09688L14.8739 14.3469C14.791 14.5957 14.5957 14.791 14.3469 14.8739L8.09688 16.9573C7.79743 17.0571 7.46729 16.9791 7.2441 16.7559C7.02091 16.5328 6.94297 16.2026 7.04279 15.9032L9.12612 9.65317C9.20907 9.40433 9.40433 9.20907 9.65317 9.12612L15.9032 7.04279C16.2026 6.94297 16.5328 7.02091 16.7559 7.2441ZM10.5755 10.5755L9.15097 14.8491L13.4245 13.4245L14.8491 9.15097L10.5755 10.5755Z" fill="{{ $header['main']['text_color'] }}"/>
                                        </svg>

                                        <p style="color: {{ $header['main']['text_color'] }}" class="text-xs text-xss font-medium roboto-medium text-center mt-2 leading-3">{{ __('Track Order') }}</p>
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start Header -->
    </div>
</section>

