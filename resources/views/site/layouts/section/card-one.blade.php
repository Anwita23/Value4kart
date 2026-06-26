@php
    $offerFlag = $item->offerCheck(); 
    $metaData = $item->getMetaCollection();
    $outOfStockVisibility = 0;
    $isApprove = 1;
    $layout = \Modules\CMS\Entities\Page::firstWhere('default', '1')->layout;
    $product = option($layout . '_template_product', '');

    $outOfStock = $item->isOutOfStock();
    $outStock = false; 
    $newArrival = isset($newArrival) ? $newArrival : false;
@endphp
<style>
    .theme-blue-bg { background-color: #2563eb !important; }
    .theme-blue-text { color: #2563eb !important; }
    .hover\:theme-blue-text:hover { color: #2563eb !important; }
    .compare-remove.theme-blue-text { color: #2563eb !important; }
    .remove-wishlist.theme-blue-text { color: #2563eb !important; }
</style>
@if($outOfStock['isApprove'])
<div class="h-full flex flex-col bg-white border border-gray-200 transition duration-300 hover:shadow-md relative group rounded-md">
    
    {{-- Top Badges --}}
    @if ($product['badge'])
        <div class="absolute top-0 left-0 z-20 flex flex-col">
            @if ($item->isShowStockStatus() && $item->getStockStatus() == 'Out Of Stock')
                @php $outStock = true @endphp
                <div class="theme-blue-bg text-white text-xs font-bold px-2 py-1 uppercase rounded-br-lg rounded-tl-md shadow-sm mb-1">
                    {{ __('Out Of Stock') }}
                </div>
            @elseif ($newArrival && $outStock == false)
                <div class="theme-blue-bg text-white text-xs font-bold px-3 py-1 uppercase rounded-br-lg rounded-tl-md shadow-sm mb-1 tracking-wider" style="clip-path: polygon(0 0, 100% 0, 90% 50%, 100% 100%, 0 100%); padding-right: 1.5rem;">
                    {{ __('NEW') }}
                </div>
            @elseif (isset($item->featured) && $outStock == false && $newArrival == false)
                <div class="theme-blue-bg text-white text-xs font-bold px-2 py-1 uppercase rounded-br-lg rounded-tl-md shadow-sm mb-1">
                    {{ __('Featured') }}
                </div>
            @endif

            @if ($offerFlag && !$item->isVariableProduct() && $outStock == false && $newArrival == false)
                <div class="theme-blue-bg text-white text-xs font-bold px-2 py-1 uppercase rounded-br-lg shadow-sm w-max">
                    {{ formatCurrencyAmount($item->getDiscountAmount()) }}% {{ __('OFF') }}
                </div>
            @endif
        </div>
    @endif

    {{-- Image & Hover Actions --}}
    <div style="height: {{ $product['height'] ?? 200 }}px" class="relative w-full overflow-hidden flex justify-center items-center p-4 rev-img product-hover">
        <a href="{{ route('site.productDetails', ['slug' => $item->slug]) }}" class="w-full h-full flex justify-center items-center"> 
            @if (in_array(pathinfo($item->getFeaturedImage(preference('front_image_resolution', 'medium')), PATHINFO_EXTENSION), getFileExtensions(6)))
            <video class="max-h-full max-w-full object-contain transition-transform duration-500" autoplay muted loop>
                <source src="{{ $item->getFeaturedImage() }}" type="video/mp4">
            </video>
            @else
            <img class="max-h-full max-w-full object-contain mix-blend-multiply transition-transform duration-500" src="{{ $item->getFeaturedImage(preference('front_image_resolution', 'medium')) }}" alt="{{ __('Image') }}">
            @endif
        </a>
        
        {{-- Hover Actions Bar --}}
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-30">
            <div class="flex items-center bg-white shadow-md rounded-md opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-4 group-hover:translate-y-0">
                {{-- Quick View --}}
                @if ($product['quick_view'] && !$item->isGroupedProduct())
                    <button class="open-view-modal p-2 text-gray-500 hover:theme-blue-text transition-colors tooltip" data-itemCode="{{ $item->code }}" title="{{ __('Quick View') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                @else
                    <a href="{{ route('site.productDetails', ['slug' => $item->slug]) }}" class="p-2 text-gray-500 hover:theme-blue-text transition-colors tooltip" title="{{ __('View') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>
                @endif

                {{-- Compare --}}
                @if (preference('compare') && $product['compare'])
                    <div data-itemId="{{ $item->id }}" class="p-2 text-gray-500 hover:theme-blue-text transition-colors cursor-pointer border-l border-r border-gray-100 {{ isCompared($item->id) ? 'compare-remove theme-blue-text' : 'add-to-compare' }}" title="{{ __('Compare') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 3h5v5"></path>
                            <path d="M4 20h17"></path>
                            <path d="M16 21v-2l5-3-5-3v-2"></path>
                            <path d="M4 4h17"></path>
                            <path d="M8 3v2L3 8l5 3v2"></path>
                        </svg>
                    </div>
                @endif

                {{-- Wishlist --}}
                @php
                    $wishlisted = false;
                    if (auth()->check()) {
                        $wishlisted = $item->isWishlist($item->id, auth()->user()->id);
                    }
                @endphp
                @if (preference('wishlist') && $product['wishlist'])
                    <div data-id="{{ $item->id }}" class="wishlist p-2 text-gray-500 hover:theme-blue-text transition-colors cursor-pointer {{ $wishlisted ? 'remove-wishlist theme-blue-text' : 'add-wishlist' }}" title="{{ __('Wishlist') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="{{ $wishlisted ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Content Section --}}
    <div class="p-4 pt-2 flex flex-col flex-grow text-left">
        {{-- Title --}}
        <a href="{{ route('site.productDetails', ['slug' => $item->slug]) }}" class="mb-2 h-10 block overflow-hidden">
            <p class="text-sm text-gray-800 font-semibold leading-5 line-clamp hover:theme-blue-text transition-colors">{{ $item->name }}</p>
        </a>

        {{-- Pricing --}}
        @if ($product['price'])
            <div class="flex items-center gap-2 mb-2">
                @if($item->isVariableProduct())
                    @php $minMaxPrice = $item->variantMaxMinPrice(); @endphp
                    <span class="theme-blue-text font-bold text-base">
                        @if ($minMaxPrice['min'] == $minMaxPrice['max'])
                            {{ multiCurrencyFormatNumber($minMaxPrice['min']) }}
                        @else
                            {{ multiCurrencyFormatNumber($minMaxPrice['min']) }} - {{ multiCurrencyFormatNumber($minMaxPrice['max']) }}
                        @endif
                    </span>
                @elseif($item->isGroupedProduct())
                    @php $groupProductPrice = $item->getGroupSalePrice() @endphp
                    <span class="theme-blue-text font-bold text-base">
                        {{ multiCurrencyFormatNumber($groupProductPrice['min']) }} - {{ multiCurrencyFormatNumber($groupProductPrice['max']) }}
                    </span>
                @else
                    @if ($offerFlag)
                        <span class="theme-blue-text font-bold text-base">
                            {{ multiCurrencyFormatNumber($item->priceWithTax($displayPrice, 'sale', false)) }}
                        </span>
                        <span class="text-gray-400 text-sm line-through decoration-gray-400">
                            {{ multiCurrencyFormatNumber($item->priceWithTax($displayPrice, 'regular', false)) }}
                        </span>
                    @else
                        <span class="theme-blue-text font-bold text-base">
                            {{ multiCurrencyFormatNumber($item->priceWithTax($displayPrice, 'regular', false)) }}
                        </span>
                    @endif
                @endif
            </div>
        @endif

        {{-- Rating & Stock --}}
        <div class="flex flex-wrap items-center justify-between mb-4 mt-auto">
            @if ($product['review'])
                <div class="flex text-[#ffb321] gap-0 items-center">
                    @for($i = 1; $i <= 5; $i++)
                        @if ($item->review_average >= $i)
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @elseif ($item->review_average < $i && $item->review_average > $i-1)
                            <div class="relative w-4 h-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="clip-path: inset(0 50% 0 0); position: absolute; left: 0; top: 0;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 0; top: 0;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </div>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#ddd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @endif
                    @endfor
                    <span class="text-gray-400 text-xs ml-1">({{ $item->review_count }})</span>
                </div>
            @endif

            @if($item->type != \App\Enums\ProductType::$Variable && $outStock == false)
                <span class="theme-blue-text text-xs font-medium ml-2">{{ __('In Stock') }}</span>
            @endif
        </div>

        {{-- Full Width Add Button --}}
        <div class="mt-auto w-full">
            @if(!$item->isVariableProduct() && $outStock == false && !$item->isExternalProduct() && $product['add_to_cart'] && !$item->isGroupedProduct())
                <button class="add-to-cart w-full h-10 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 flex items-center justify-between rounded transition-colors" data-itemCode={{ $item->code }}>
                    <span class="text-sm">{{ __('Add') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>
            @elseif($outStock == true)
                <button class="w-full h-10 bg-gray-100 text-gray-400 font-medium px-4 flex items-center justify-center rounded cursor-not-allowed">
                    <span class="text-sm">{{ __('Out Of Stock') }}</span>
                </button>
            @else
                <a href="{{ route('site.productDetails', ['slug' => $item->slug]) }}" class="w-full h-10 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 flex items-center justify-between rounded transition-colors">
                    <span class="text-sm">{{ __('Add') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</div>
@endif
