@php
    $cType = $component->category_type;
    $categories = $homeService->categories($cType, [], $component->max, $component->categories);
    $totalCols = $homeService->getColumnCount($component, $component->max);
@endphp
<style>
    .category-card-custom {
        width: 110px !important;
        height: 110px !important;
        margin: 0 auto;
        overflow: hidden;
    }
    .category-card-custom .img-container {
        height: 110px !important;
    }
    .category-card-custom img {
        width: 52px !important;
        height: 52px !important;
    }
    .category-card-custom .category-card-text {
        font-size: 13px !important;
        line-height: 1.2 !important;
        bottom: 8px !important;
        padding: 0 4px;
    }
    @media (max-width: 768px) {
        .category-card-custom {
            width: 96px !important;
            height: 96px !important;
        }
        .category-card-custom .img-container {
            height: 96px !important;
        }
        .category-card-custom img {
            width: 44px !important;
            height: 44px !important;
        }
        .category-card-custom .category-card-text {
            font-size: 11px !important;
            bottom: 4px !important;
        }
    }
</style>
<section class="{{ $component->full == 1 ? 'px-4' : 'layout-wrapper px-4 xl:px-0' }} my-10 md:my-12"
    style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
    @if ($component->title)
        <p class="text-center font-bold text-sm md:text-[22px] text-gray-12 mb-2.5 md:mb-5 uppercase dm-bold">
            {!! $component->title !!}</p>
    @endif
    <div
        class="grid lg:grid-cols-{{ $totalCols }} lg:gap-7 grid-flow-col lg:grid-flow-row gap-4 auto-cols-max overflow-auto">
        @foreach ($categories ?? [] as $category)
            <a href="{{ route('site.productSearch', ['categories' => $category->slug]) }}">
                <div
                    class="border primary-bg-hover mb-4 md:mb-0 rounded-md relative t-img trans-effect category-card-custom">
                    <div class="flex justify-center items-center img-container">
                        <img class="object-contain trans-effect"
                            src="{{ $category->fileUrlQuery() }}" alt="{{ __('Image') }}">
                    </div>
                    <div
                        class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-xs md:text-base mx-3 text-white font-semibold">
                        <p class="text-gray-12 dm-bold absolute inset-x-0 text-center leading-5 line-clamp-single category-card-text">
                            {{ trimWords($category->name, 15) }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>

