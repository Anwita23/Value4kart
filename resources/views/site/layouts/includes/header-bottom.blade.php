<section>
    @php
        $fixedMenu = isset($slides) && $slides->count() && isset($header['bottom']['category_expand']) && $header['bottom']['category_expand'] == 1;
    @endphp
    @if ((isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1) ||
        (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1))
        <div style="border-bottom: 1px solid {{ $header['bottom']['border_bottom'] }}" class="w-full mt-16 absolute">
        </div>
    @endif
    <header style="background: {{ $header['bottom']['bg_color'] }}; border-top: 1px solid {{ $header['bottom']['border_top'] }}" class="header">
        {{-- ======= ROW 1: Nav links bar (blue) ======= --}}
        <div class="flex justify-between layout-wrapper px-4 xl:px-0">
            @php
                $menus = Modules\MenuBuilder\Http\Models\MenuItems::menus(4);
            @endphp
            <div class="w-full">
                <div class="flex justify-between">
                    @if (isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1)
                        <div id="nav-wrap" class="w-full md:w-5/6 lg:w-72% md:mt-3 nav-wrap ltr:mr-0 ltr:md:mr-5 rtl:ml-0 rtl:md:ml-5">
                            <ul class="header-menu-nav text-white md:text-black mx-1 md:mx-1 custom-border">
                                @foreach ($menus as $menu)
                                    @php
                                        $url = $menu->url(empty($menu->params) ? 'page' : '');
                                        $url = str_contains($url, url('/')) || str_contains($url, 'http') ? $url : url('/' . $url);
                                        $activeUrl = $url;
                                        if (strpos($activeUrl, '?')) {
                                            $activeUrl = explode('?', $activeUrl)[0];
                                        }
                                    @endphp
                                    <li class="first-dropdown-li">
                                        <a style="color: {{ $header['bottom']['text_color'] }}" class="first-list mb-2 dm-sans text-base custom-bottom-border {{ !empty($menu->class) ? $menu->class : '' }} {{ str_replace('/#', '', $activeUrl) == url()->current() ? 'active-border-bottom' : ' ' }}"
                                            href="{{ $url }}">{{ ucwords($menu->label) }}</a>
                                        <ul class="dm-sans text-sm hidden md:block bg-white first-dropdown menu dropdown-enable box-shadow-dropdown {{ strtolower($menu->label) == 'pages' || (!empty($menu->link) && str_contains($menu->link, 'pages')) ? 'horizontal-dropdown' : '' }}">
                                            @foreach ($menu->child as $submenu)
                                                @php
                                                    $childUrl = $submenu->url(empty($submenu->params) ? 'page' : '');
                                                    $childUrl = str_contains($childUrl, url('/')) || str_contains($childUrl, 'http') ? $childUrl : url('/' . $childUrl);
                                                @endphp
                                                <li class="whitespace-normal border-b break-all">
                                                    <button class="outline-none focus:outline-none first-dropdown-menu w-full ltr:text-left rtl:text-right">
                                                        <div class="primary-bg-hover {{ str_replace('/#', '', $childUrl) == url()->current() ? 'primary-bg-color text-gray-12' : ' ' }}">
                                                            <a class="w-48" href="{{ $childUrl }}">
                                                                <div class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                                    <span class="text-sm cursor-pointer w-36">
                                                                        {{ ucwords($submenu->label) }}
                                                                    </span>
                                                                    @if ($submenu->child->count())
                                                                        <span>
                                                                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z" fill="currentColor"/>
                                                                            </svg>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </button>
                                                    <ul class="dm-sans text-sm font-medium child-dropdown box-shadow-dropdown">
                                                        @foreach ($submenu->child as $subChildMenu)
                                                            @php
                                                                $subChildUrl = $subChildMenu->url(empty($subChildMenu->params) ? 'page' : '');
                                                                $subChildUrl = str_contains($subChildUrl, url('/')) || str_contains($subChildUrl, 'http') ? $subChildUrl : url('/' . $subChildUrl);
                                                            @endphp
                                                            <li class="whitespace-normal bg-white border-b break-all">
                                                                <button class="outline-none focus:outline-none first-dropdown-menu w-full ltr:text-left rtl:text-right">
                                                                    <div class="primary-bg-hover">
                                                                        <a class="w-48" href="{{ $subChildUrl }}">
                                                                            <div class="flex items-center justify-between w-full menuss-hover px-15p py-4">
                                                                                <span class="text-sm cursor-pointer w-36">
                                                                                    {{ $subChildMenu->label }}
                                                                                </span>
                                                                                <span>
                                                                                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
                                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z" fill="currentColor"/>
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1)
                      <div class="hidden md:block">
                        <div class="flex justify-end items-center">
                            <div class="flex {{ isset($header['bottom']) && count(array_filter($header['bottom'])) == 1 ? 'ml-6' : 'justify-end' }}">
                                @php $textColor = $header['bottom']['text_color']; @endphp
                                <div>
                                    <div class="relative inline-block ltr:text-left rtl:text-right">
                                        <div style="background: {{ $header['bottom']['bg_color'] }}; color: {{ $header['bottom']['text_color'] }} ;" class="inline-flex justify-center items-center w-full bg-white text-13 font-medium text-gray-700 cursor-pointer test-click height-63px">
                                            <svg class="ltr:mr-2 rtl:ml-2" width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1" y="1" width="12" height="18" rx="2" stroke="{{ $textColor }}" stroke-width="2" />
                                                <circle cx="7" cy="16" r="1" fill="{{ $textColor }}" />
                                            </svg>
                                            <p class="text-sm 2xl:text-base dm-sans">{{ __('Download Our App') }}</p>
                                            <svg class="ltr:ml-2.5 rtl:mr-2.5" width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0.870679L8.05116 -4.35362e-07L4.5 3.25864L0.948838 -1.2491e-07L-1.80498e-07 0.870679L4.5 5L9 0.870679Z" fill="{{ $textColor }}" />
                                            </svg>
                                        </div>
                                        @if ($header['bottom']['show_google_play'] || $header['bottom']['show_app_store'])
                                            <div class="hidden origin-top-right absolute w-48 border rounded-t-none rounded bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50 test-drop ltr:right-0 rtl:left-0">
                                                <div>
                                                    @if ($header['bottom']['show_google_play'])
                                                        <a href="{{ isset($header['bottom']['google_play_link']) ? $header['bottom']['google_play_link'] : '#' }}" class="flex p-15p text-base font-medium text-gray-10 roboto-medium hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                            @if ($downloadGooglePlay->objectFile)
                                                                <img src="{{ $downloadGooglePlay->fileUrlQuery() }}" alt="{{ __('Image') }}">
                                                            @else
                                                                {{ __('Google Play') }}
                                                            @endif
                                                        </a>
                                                    @endif
                                                    @if ($header['bottom']['show_app_store'])
                                                        <a href="{{ isset($header['bottom']['app_store_link']) ? $header['bottom']['app_store_link'] : '#' }}" class="flex p-15p text-base font-medium text-gray-10 roboto-medium hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                            @if ($downloadAppStore->objectFile)
                                                                <img src="{{ $downloadAppStore->fileUrlQuery() }}" alt="{{ __('Image') }}">
                                                            @else
                                                                {{ __('IOS') }}
                                                            @endif
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ======= ROW 2: Flipkart-style category bar with flyout submenus ======= --}}
        @if (isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 1)
        <div class="flipkart-category-bar hidden md:block" style="background:#ffffff; border-top: 1px solid #f0f0f0;">
            <div class="layout-wrapper px-4 xl:px-0">
                <div class="flipkart-cat-inner">
                    @foreach ($categories as $category)
                        @php
                            $subCategories = $category->childrenCategories->where('is_global', 1);
                        @endphp
                        <div class="flipkart-cat-item-wrap">
                            <a href="{{ route('site.productSearch', ['categories' => $category->slug]) }}" class="flipkart-cat-item">
                                <div class="flipkart-cat-icon">
                                    <img src="{{ $category->fileUrlQuery() }}" alt="{{ __('Image') }}">
                                </div>
                                <span class="flipkart-cat-label">{{ trimWords($category->name, 12) }}</span>
                            </a>

                            {{-- Level-1 flyout panel --}}
                            @if($subCategories->count())
                            <div class="fk-flyout-l1">
                                @foreach($subCategories as $sub)
                                    @php
                                        $subSubs = $sub->childrenCategories->where('is_global', 1);
                                    @endphp
                                    <div class="fk-flyout-row {{ $subSubs->count() ? 'has-children' : '' }}">
                                        <a href="{{ route('site.productSearch', ['categories' => $sub->slug]) }}" class="fk-flyout-link">
                                            <span>{{ trimWords($sub->name, 22) }}</span>
                                            @if($subSubs->count())
                                                <svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.870679 3.61e-07L0 0.948839L3.25864 4.5L0 8.05116L0.87068 9L5 4.5L0.870679 3.61e-07Z" fill="currentColor"/>
                                                </svg>
                                            @endif
                                        </a>
                                        {{-- Level-2 flyout panel --}}
                                        @if($subSubs->count())
                                        <div class="fk-flyout-l2">
                                            @foreach($subSubs as $subSub)
                                                @php
                                                    $subSubSubs = $subSub->childrenCategories->where('is_global', 1);
                                                @endphp
                                                <div class="fk-flyout-row {{ $subSubSubs->count() ? 'has-children' : '' }}">
                                                    <a href="{{ route('site.productSearch', ['categories' => $subSub->slug]) }}" class="fk-flyout-link">
                                                        <span>{{ trimWords($subSub->name, 22) }}</span>
                                                        @if($subSubSubs->count())
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.870679 3.61e-07L0 0.948839L3.25864 4.5L0 8.05116L0.87068 9L5 4.5L0.870679 3.61e-07Z" fill="currentColor"/>
                                                            </svg>
                                                        @endif
                                                    </a>
                                                    {{-- Level-3 flyout panel --}}
                                                    @if($subSubSubs->count())
                                                    <div class="fk-flyout-l3">
                                                        @foreach($subSubSubs as $l3)
                                                            <div class="fk-flyout-row">
                                                                <a href="{{ route('site.productSearch', ['categories' => $l3->slug]) }}" class="fk-flyout-link">
                                                                    <span>{{ trimWords($l3->name, 22) }}</span>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </header>

    @if ($fixedMenu && isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 1)
        <div class="layout-wrapper px-4 xl:px-0">
            @if (isset($slides) && $slides->count())
                <div class="w-full">
                    <div class="slideshow-container md:mt-6">
                        <div class="swiper mySwiper custom-swiper slider1">
                            <div class="swiper-wrapper">
                                @php $buttonDirection = ['left' => 'justify-start', 'right' => 'justify-end', 'center' => 'justify-center']; @endphp
                                @foreach ($slides as $slide)
                                <div class="swiper-slide">
                                    <div class="relative z-0 flex align-items-center">
                                        <div class="costume-title w-full px-5 sm:px-11">
                                            <div class="text-{{ $slide->title_direction }}">
                                                <p class="sliders-animation inline-block anim text-x-title dm-regular animated small-title" data-animation="{{ $slide->title_animation }}"
                                                    style="animation-delay: {{ $slide->title_delay }}s; color: {{ $slide->title_font_color }}; font-size: {{ $slide->title_font_size . 'px' }}">
                                                    {!! $slide->title_text !!}
                                                </p>
                                            </div>
                                            <div class="text-{{ $slide->sub_title_direction }}">
                                                <p class="sliders-animation inline-block anim text-y-title dm-bold animated bold-title" data-animation="{{ $slide->sub_title_animation }}"
                                                    style="animation-delay: {{ $slide->sub_title_delay }}s; color: {{ $slide->sub_title_font_color }}; font-size: {{ $slide->sub_title_font_size . 'px' }}">
                                                    {!! $slide->sub_title_text !!}
                                                </p>
                                            </div>
                                            <div class="text-{{ $slide->description_title_direction }}">
                                                <p class="sliders-animation inline-block anim text-z-title dm-regular mt-3 animated bottom-title" data-animation="{{ $slide->description_title_animation }}"
                                                    style="animation-delay: {{ $slide->description_title_delay }}s; color: {{ $slide->description_title_font_color }}; font-size: {{ $slide->description_title_font_size . 'px' }}">
                                                    {!! $slide->description_title_text !!}
                                                </p>
                                            </div>
                                            @if (!empty($slide->button_title))
                                                <div class="flex {{ $buttonDirection[strtolower($slide->button_position)] }}">
                                                    <a style="animation-delay: {{ $slide->button_delay }}s;" href="{{ $slide->button_link }}"
                                                        {{ $slide->is_open_in_new_window == 'Yes' ? 'target=_blank' : '' }}
                                                        class="sliders-animation animated anim"
                                                        data-animation="{{ $slide->button_animation }}">
                                                        <p class="process-goto shop-btn cursor-pointer relative flex justify-center text-gray-12 rounded-sm md:text-base text-xss items-center md:py-2 py-1.5 w-max md:px-8 px-5 dm-sans mt-2 border md:border-none border-gray-12"
                                                            style="color: {{ $slide->button_font_color }}; background: {{ $slide->button_bg_color . 'dd' }}; --hover-bg-color:{{ $slide->button_bg_color }}; --hover-color:{{ $slide->button_font_color }}">
                                                            {!! $slide->button_title !!}
                                                            <svg class="relative md:w-2.5 md:h-2 w-2 h-6p ltr:ml-5p rtl:mr-2.5 neg-transition-scale" width="10" height="7" viewBox="0 0 10 7" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7344 0L5.75327 1.05155L7.34399 2.75644H0.69376C0.310607 2.75644 0 3.08934 0 3.5C0 3.91066 0.310607 4.24356 0.69376 4.24356H7.34399L5.75327 5.94845L6.7344 7L10 3.5L6.7344 0Z" fill="currentColor"></path>
                                                            </svg>
                                                        </p>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <img class="hero-slide-img md:rounded-lg object-contain w-full" src="{{ $slide->fileUrlQuery() }}">
                                    </div>
                                </div>
                                @endforeach
                                <a class="md:flex hidden">
                                    <span class="prev swiper-button-prev items-center justify-center p-2">
                                        <svg class="neg-transition-scale" width="9" height="11" viewBox="0 0 9 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.32668 0.337159L8.66402 1.65614L3.65882 6.59262L8.66402 11.5291L7.32667 12.8481L0.98413 6.59262L7.32668 0.337159Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a class="md:flex hidden">
                                    <span class="next swiper-button-next items-center justify-center p-2">
                                        <svg class="neg-transition-scale" width="9" height="11" viewBox="0 0 9 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3231 0.337159L0.985761 1.65614L5.99096 6.59262L0.985762 11.5291L2.32311 12.8481L8.66565 6.59262L2.3231 0.337159Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>
                                @foreach ($slides as $slide)
                                    <div class="swiper-pagination"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</section>
