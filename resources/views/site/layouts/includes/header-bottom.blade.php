<section>
    @php
        $fixedMenu = isset($slides) && $slides->count() && isset($header['bottom']['category_expand']) && $header['bottom']['category_expand'] == 1;
    @endphp

    @if ((isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1) ||
        (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1))
        <div style="border-bottom: 1px solid {{ $header['bottom']['border_bottom'] }}" class="w-full mt-16 absolute"></div>
    @endif

    <header style="background: {{ $header['bottom']['bg_color'] }}; border-top: 1px solid {{ $header['bottom']['border_top'] }}; position: relative; overflow: visible !important;" class="header">

        <style>
            /* ===== V4K NAV BAR ===== */
            .v4k-navrow {
                display: flex;
                align-items: center;
                justify-content: space-between;
                height: 56px;
                position: relative;
                overflow: visible !important;
            }

            /* All Categories button */
            .v4k-allcat-btn {
                display: flex;
                align-items: center;
                gap: 10px;
                background: {{ $primaryColor }};
                color: #ffffff !important;
                font-size: 15px;
                font-weight: 700;
                padding: 0 22px;
                height: 100%;
                border: none;
                cursor: pointer;
                white-space: nowrap;
                flex-shrink: 0;
                transition: background 0.2s, filter 0.2s;
                text-decoration: none !important;
                font-family: 'DM Sans', sans-serif;
                letter-spacing: 0.01em;
                border-radius: 6px;
            }
            .v4k-allcat-btn:hover { filter: brightness(0.9); color: #fff !important; }

            /* All Categories flyout - Multi-level menu */
            .v4k-allcat-wrap {
                position: relative;
                height: 100%;
                flex-shrink: 0;
                display: flex;
                align-items: center;
            }
            .v4k-allcat-flyout {
                display: none;
                position: fixed; /* fixed to escape any overflow:hidden parent */
                width: 600px;
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 12px 32px rgba(0,0,0,0.13);
                z-index: 99999;
                padding: 0;
                list-style: none;
                margin: 0;
                animation: v4kFadeIn 0.15s ease;
            }
            .v4k-allcat-flyout.v4k-open { display: flex; }
            
            /* Left panel - Main categories */
            .v4k-cat-left-panel {
                width: 240px;
                background: #fff;
                border-right: 1px solid #e5e7eb;
                padding: 8px 0;
                list-style: none;
                margin: 0;
            }
            .v4k-cat-left-panel li {
                position: relative;
            }
            .v4k-cat-left-panel li a {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 11px 18px;
                font-size: 13.5px;
                color: #374151;
                font-weight: 500;
                text-decoration: none !important;
                transition: background 0.15s, color 0.15s;
                font-family: 'DM Sans', sans-serif;
                justify-content: space-between;
            }
            .v4k-cat-left-panel li a:hover { background: #f3f4f6; color: {{ $primaryColor }}; }
            .v4k-cat-left-panel li a img {
                width: 22px; height: 22px; object-fit: cover;
                border-radius: 4px; flex-shrink: 0;
            }
            .v4k-cat-left-panel li a .v4k-cat-arrow {
                opacity: 0.5;
                transition: opacity 0.15s;
            }
            .v4k-cat-left-panel li a:hover .v4k-cat-arrow {
                opacity: 1;
            }
            .v4k-cat-left-panel li.active a {
                background: {{ $primaryColor }};
                color: #fff;
            }
            .v4k-cat-left-panel li.active a .v4k-cat-arrow {
                opacity: 1;
            }
            
            /* Right panel - Sub-menu */
            .v4k-cat-right-panel {
                flex: 1;
                background: #fff;
                padding: 20px 24px;
                display: none;
                overflow-y: auto;
                max-height: 400px;
            }
            .v4k-cat-right-panel.v4k-active {
                display: block;
            }
            .v4k-cat-right-panel::-webkit-scrollbar {
                width: 6px;
            }
            .v4k-cat-right-panel::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 3px;
            }
            .v4k-cat-right-panel::-webkit-scrollbar-thumb {
                background: {{ $primaryColor }};
                border-radius: 3px;
            }
            .v4k-subcat-title {
                font-size: 15px;
                font-weight: 700;
                color: #111827;
                margin: 0 0 12px 0;
                font-family: 'DM Sans', sans-serif;
            }
            .v4k-subcat-list {
                list-style: none;
                padding: 0;
                margin: 0 0 20px 0;
            }
            .v4k-subcat-list li {
                margin-bottom: 8px;
            }
            .v4k-subcat-list li a {
                font-size: 13.5px;
                color: #6b7280;
                text-decoration: none !important;
                transition: color 0.15s;
                font-family: 'DM Sans', sans-serif;
                display: block;
                padding: 4px 0;
            }
            .v4k-subcat-list li a:hover {
                color: {{ $primaryColor }};
            }

            /* Deal Today button */
            .v4k-deal-btn {
                display: flex;
                align-items: center;
                gap: 7px;
                color: {{ $primaryColor }} !important;
                border: 1.5px solid {{ $primaryColor }};
                background: transparent;
                font-size: 14px;
                font-weight: 700;
                padding: 0 18px;
                height: 38px;
                border-radius: 8px;
                cursor: pointer;
                white-space: nowrap;
                flex-shrink: 0;
                transition: all 0.2s;
                text-decoration: none !important;
                font-family: 'DM Sans', sans-serif;
            }
            .v4k-deal-btn:hover { background: {{ $primaryColor }}; color: #ffffff !important; }
            .v4k-deal-btn:hover .v4k-bolt { stroke: #ffffff !important; }

            @keyframes v4kFadeIn {
                from { opacity: 0; transform: translateY(6px); }
                to   { opacity: 1; transform: translateY(0); }
            }
        </style>

        <div class="layout-wrapper px-4 xl:px-0" style="overflow: visible; position: relative;">
            <div class="v4k-navrow">

                {{-- LEFT: All Categories button + flyout --}}
                @php $menus = Modules\MenuBuilder\Http\Models\MenuItems::menus(4); @endphp

                @if (isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1)
                <div class="v4k-allcat-wrap hidden md:flex" id="v4kAllCatWrap">
                    <a href="{{ route('site.productSearch', '') }}" class="v4k-allcat-btn" id="v4kAllCatBtn">
                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none">
                            <path d="M1 1H17" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                            <path d="M1 7H17" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                            <path d="M1 13H17" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                        </svg>
                        <span>All Categories</span>
                    </a>
                    @if (isset($header['bottom']['show_category']) && $header['bottom']['show_category'] == 1)
                    <div class="v4k-allcat-flyout" id="v4kAllCatFlyout">
                        {{-- Left panel - Main categories --}}
                        <ul class="v4k-cat-left-panel" id="v4kCatLeftPanel">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <li data-category-id="{{ $category->id }}">
                                        <a href="{{ route('site.productSearch', ['categories' => $category->slug]) }}">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $category->fileUrlQuery() }}" alt="">
                                                <span>{{ trimWords($category->name, 20) }}</span>
                                            </div>
                                            @if ($category->categories && $category->categories->count() > 0)
                                                <svg class="v4k-cat-arrow" width="5" height="9" viewBox="0 0 5 9" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.870679 3.60997e-07L-3.93887e-07 0.948839L3.25864 4.5L2.27018e-07 8.05116L0.87068 9L5 4.5L0.870679 3.60997e-07Z" fill="currentColor"/>
                                                </svg>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        
                        {{-- Right panel - Sub-categories --}}
                        <div class="v4k-cat-right-panel" id="v4kCatRightPanel">
                            <p class="text-gray-500 text-sm">Hover over a category to see sub-categories</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                {{-- CENTER: Navigation links with Mega Menu --}}
                @if (isset($header['bottom']['show_page_menu']) && $header['bottom']['show_page_menu'] == 1)
                <div id="nav-wrap" class="hidden md:flex flex-1 md:mt-3 nav-wrap ltr:mr-0 ltr:md:mr-5 rtl:ml-0 rtl:md:ml-5" style="overflow: visible !important;">
                    <ul class="header-menu-nav text-white md:text-black mx-1 md:mx-1 custom-border" style="overflow: visible !important;">
                        @foreach ($menus as $menu)
                            @php
                                $url = $menu->url(empty($menu->params) ? 'page' : '');
                                $url = str_contains($url, url('/')) || str_contains($url, 'http') ? $url : url('/' . $url);
                                $activeUrl = $url;
                                if (strpos($activeUrl, '?')) {
                                    $activeUrl = explode('?', $activeUrl)[0];
                                }
                                $isActive = str_replace('/#', '', $activeUrl) == url()->current();
                                $isMegaMenu = strtolower($menu->label) == 'shop' || strtolower($menu->label) == 'product';
                            @endphp
                            <li class="first-dropdown-li" style="position: relative;">
                                <a style="color: {{ $header['bottom']['text_color'] }}" 
                                   class="first-list mb-2 dm-sans text-base custom-bottom-border {{ !empty($menu->class) ? $menu->class : '' }} {{ $isActive ? 'active-border-bottom' : ' ' }}"
                                   href="{{ $url }}">
                                    {{ ucwords($menu->label) }}
                                </a>
                                {{-- Mega Menu - always show for Shop/Product, test for first item --}}
                                @if ($isMegaMenu || $loop->first)
                                    <ul class="dm-sans text-sm bg-white first-dropdown mega-menu" style="display: none; position: absolute; left: 0; top: 100%; z-index: 99999; background: #ffffff; border: 1px solid #e5e7eb; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12); min-width: 800px; padding: 0; border-radius: 0 0 8px 8px;">
                                        <div class="flex" style="gap: 0;">
                                            {{-- Column 1: Shop by Category --}}
                                            <div style="width: 25%; padding: 25px 20px; border-right: 1px solid #f3f4f6;">
                                                <h4 style="font-size: 13px; font-weight: 700; color: #111827; margin: 0 0 15px 0; text-transform: uppercase; letter-spacing: 0.5px; padding-bottom: 10px; border-bottom: 2px solid #1a56db;">Shop by Category</h4>
                                                <ul style="list-style: none; padding: 0; margin: 0;">
                                                    @if ($menu->child->count() > 0)
                                                        @foreach ($menu->child->take(6) as $submenu)
                                                            @php
                                                                $childUrl = $submenu->url(empty($submenu->params) ? 'page' : '');
                                                                $childUrl = str_contains($childUrl, url('/')) || str_contains($childUrl, 'http') ? $childUrl : url('/' . $childUrl);
                                                            @endphp
                                                            <li style="margin-bottom: 12px;"><a href="{{ $childUrl }}" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">{{ ucwords($submenu->label) }}</a></li>
                                                        @endforeach
                                                    @else
                                                        <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Electronics</a></li>
                                                        <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Fashion</a></li>
                                                        <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Home & Garden</a></li>
                                                        <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Sports</a></li>
                                                        <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Beauty</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                            
                                            {{-- Column 2: Featured --}}
                                            <div style="width: 25%; padding: 25px 20px; border-right: 1px solid #f3f4f6;">
                                                <h4 style="font-size: 13px; font-weight: 700; color: #111827; margin: 0 0 15px 0; text-transform: uppercase; letter-spacing: 0.5px; padding-bottom: 10px; border-bottom: 2px solid #1a56db;">Featured</h4>
                                                <ul style="list-style: none; padding: 0; margin: 0;">
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">New Arrivals</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Best Sellers</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">On Sale</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Top Rated</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Trending</a></li>
                                                </ul>
                                            </div>
                                            
                                            {{-- Column 3: Brands --}}
                                            <div style="width: 25%; padding: 25px 20px; border-right: 1px solid #f3f4f6;">
                                                <h4 style="font-size: 13px; font-weight: 700; color: #111827; margin: 0 0 15px 0; text-transform: uppercase; letter-spacing: 0.5px; padding-bottom: 10px; border-bottom: 2px solid #1a56db;">Brands</h4>
                                                <ul style="list-style: none; padding: 0; margin: 0;">
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Apple</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Samsung</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Sony</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Nike</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Adidas</a></li>
                                                </ul>
                                            </div>
                                            
                                            {{-- Column 4: Quick Links --}}
                                            <div style="width: 25%; padding: 25px 20px;">
                                                <h4 style="font-size: 13px; font-weight: 700; color: #111827; margin: 0 0 15px 0; text-transform: uppercase; letter-spacing: 0.5px; padding-bottom: 10px; border-bottom: 2px solid #1a56db;">Quick Links</h4>
                                                <ul style="list-style: none; padding: 0; margin: 0;">
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">All Products</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Deals & Offers</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Gift Cards</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Track Order</a></li>
                                                    <li style="margin-bottom: 12px;"><a href="#" style="font-size: 14px; color: #6b7280; text-decoration: none; transition: all 0.2s; display: block; padding: 5px 0; font-weight: 500;">Support</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- RIGHT: Deal Today button --}}
                @if (isset($header['bottom']['show_download_app']) && $header['bottom']['show_download_app'] == 1)
                <div class="hidden md:flex items-center">
                    <a href="#" class="v4k-deal-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="v4k-bolt"
                             stroke="{{ $primaryColor }}" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                        </svg>
                        <span>{{ __('Deal Today') }}</span>
                    </a>
                </div>
                @endif

            </div>
        </div>

        {{-- ===== JavaScript for All Categories flyout hover alignment ===== --}}
        <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                var wrap    = document.getElementById('v4kAllCatWrap');
                var flyout  = document.getElementById('v4kAllCatFlyout');
                var btn     = document.getElementById('v4kAllCatBtn');
                var leftPanel = document.getElementById('v4kCatLeftPanel');
                var rightPanel = document.getElementById('v4kCatRightPanel');

                if (wrap && flyout && btn) {
                    var hoverTimer = null;
                    // Ensure flyout is hidden initially
                    flyout.classList.remove('v4k-open');
                    
                    wrap.addEventListener('mouseenter', function() {
                        clearTimeout(hoverTimer);
                        var rect = btn.getBoundingClientRect();
                        flyout.style.position = 'fixed';
                        flyout.style.top  = rect.bottom + 'px';
                        flyout.style.left = rect.left + 'px';
                        flyout.style.width = '600px';
                        flyout.classList.add('v4k-open');
                    });
                    wrap.addEventListener('mouseleave', function() {
                        hoverTimer = setTimeout(function(){ flyout.classList.remove('v4k-open'); }, 120);
                    });
                    flyout.addEventListener('mouseenter', function() { clearTimeout(hoverTimer); });
                    flyout.addEventListener('mouseleave', function() {
                        hoverTimer = setTimeout(function(){ flyout.classList.remove('v4k-open'); }, 120);
                    });
                }

                // Handle category hover to show sub-categories
                if (leftPanel && rightPanel) {
                    var categoryItems = leftPanel.querySelectorAll('li[data-category-id]');
                    @php
                        $subcatData = [];
                        if ($categories) {
                            foreach($categories as $cat) {
                                $children = [];
                                $childCount = 0;
                                if (isset($cat->categories) && $cat->categories && $cat->categories->count() > 0) {
                                    $childCount = $cat->categories->count();
                                    foreach($cat->categories as $child) {
                                        $children[] = [
                                            'name' => $child->name,
                                            'slug' => $child->slug,
                                            'url' => route('site.productSearch', ['categories' => $child->slug])
                                        ];
                                    }
                                }
                                $subcatData[strval($cat->id)] = [
                                    'id' => $cat->id,
                                    'name' => $cat->name,
                                    'childCount' => $childCount,
                                    'children' => $children
                                ];
                            }
                        }
                    @endphp
                    var subcatData = @json($subcatData);
                    console.log('Total subcatData:', subcatData);

                    categoryItems.forEach(function(item) {
                        item.addEventListener('mouseenter', function() {
                            // Remove active class from all items
                            categoryItems.forEach(function(i) { i.classList.remove('active'); });
                            // Add active class to current item
                            item.classList.add('active');

                            // Get category ID (convert to string to match PHP array keys)
                            var categoryId = String(item.dataset.categoryId);
                            console.log('Hovered Category ID:', categoryId);
                            console.log('Category from data:', subcatData[categoryId]);

                            var category = subcatData ? subcatData[categoryId] : null;

                            if (category) {
                                console.log('Category found:', category.name, 'Child count:', category.childCount);
                                if (category.children && category.children.length > 0) {
                                    // Build sub-categories HTML
                                    var html = '<h3 class="v4k-subcat-title">' + category.name + '</h3>';
                                    html += '<ul class="v4k-subcat-list">';
                                    category.children.forEach(function(child) {
                                        html += '<li><a href="' + child.url + '">' + child.name + '</a></li>';
                                    });
                                    html += '</ul>';
                                    rightPanel.innerHTML = html;
                                    rightPanel.classList.add('v4k-active');
                                } else {
                                    rightPanel.innerHTML = '<p class="text-gray-500 text-sm">No sub-categories available (childCount: ' + category.childCount + ')</p>';
                                    rightPanel.classList.add('v4k-active');
                                }
                            } else {
                                console.log('Category not found in subcatData for ID:', categoryId);
                                rightPanel.innerHTML = '<p class="text-gray-500 text-sm">Category data not found</p>';
                                rightPanel.classList.add('v4k-active');
                            }
                        });
                    });
                }

                // ===== Main navigation dropdowns - force display with JavaScript =====
                console.log('Setting up dropdown handlers');
                var dropdownLis = document.querySelectorAll('.first-dropdown-li');
                console.log('Found dropdown LIs:', dropdownLis.length);
                
                dropdownLis.forEach(function(li) {
                    var dropdown = li.querySelector('.first-dropdown');
                    console.log('LI has dropdown:', dropdown ? 'yes' : 'no');
                    if (dropdown) {
                        console.log('Dropdown classes:', dropdown.className);
                        li.addEventListener('mouseenter', function() {
                            console.log('Mouse enter - showing dropdown');
                            dropdown.style.display = 'block';
                            dropdown.style.visibility = 'visible';
                            dropdown.style.opacity = '1';
                        });
                        li.addEventListener('mouseleave', function() {
                            console.log('Mouse leave - hiding dropdown');
                            dropdown.style.display = 'none';
                        });
                    }
                });

                // Handle child dropdowns
                var allLis = document.querySelectorAll('.first-dropdown li');
                allLis.forEach(function(li) {
                    var childDropdown = li.querySelector('.child-dropdown');
                    if (childDropdown) {
                        li.addEventListener('mouseenter', function() {
                            childDropdown.style.display = 'block';
                        });
                        li.addEventListener('mouseleave', function() {
                            childDropdown.style.display = 'none';
                        });
                    }
                });
            });
        })();
        </script>

    </header>

    {{-- Hero/slider section (preserved) --}}
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
                                                            style="color: {{ $slide->button_font_color }}; background: {{ $slide->button_bg_color . 'dd' }};">
                                                            {!! $slide->button_title !!}
                                                            <svg class="relative md:w-2.5 md:h-2 w-2 h-6p ltr:ml-5p rtl:mr-2.5 neg-transition-scale" width="10" height="7" viewBox="0 0 10 7" fill="currentColor">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7344 0L5.75327 1.05155L7.34399 2.75644H0.69376C0.310607 2.75644 0 3.08934 0 3.5C0 3.91066 0.310607 4.24356 0.69376 4.24356H7.34399L5.75327 5.94845L6.7344 7L10 3.5L6.7344 0Z" fill="currentColor"></path>
                                                            </svg>
                                                        </p>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <img class="hero-slide-img md:rounded-lg object-cover w-full" style="height:400px;min-height:250px;max-height:600px;width:100%;object-fit:cover;" src="{{ $slide->fileUrlQuery() }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <span class="prev swiper-button-prev md:flex hidden items-center justify-center p-2">
                                <svg class="neg-transition-scale" width="9" height="11" viewBox="0 0 9 13" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.32668 0.337159L8.66402 1.65614L3.65882 6.59262L8.66402 11.5291L7.32667 12.8481L0.98413 6.59262L7.32668 0.337159Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <span class="next swiper-button-next md:flex hidden items-center justify-center p-2">
                                <svg class="neg-transition-scale" width="9" height="11" viewBox="0 0 9 13" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3231 0.337159L0.985761 1.65614L5.99096 6.59262L0.985762 11.5291L2.32311 12.8481L8.66565 6.59262L2.3231 0.337159Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <div class="swiper-pagination" style="bottom:25px;position:absolute;z-index:99;"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</section>
