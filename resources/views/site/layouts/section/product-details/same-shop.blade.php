@if (count($sameShop) > 0)
<div class="mt-15p md:mt-30p">
    <p class="font-medium dm-sans text-base md:text-17 text-gray-12">{{ __('More Products From Them') }}</p>
    <div class="mt-2 md:mt-3 lg:mt-3 lg:flex-col flex overflow-auto gap-5 delivery-scrollbar">
        @foreach ($sameShop as $item)
            @php
                $offerFlag = $item->offerCheck();
                $outOfStock = $item->isOutOfStock();
            @endphp
        @if($outOfStock['isApprove'])
            @include('site.layouts.section.card-one')
        @endif
        @endforeach
    </div>
</div>
@endif
