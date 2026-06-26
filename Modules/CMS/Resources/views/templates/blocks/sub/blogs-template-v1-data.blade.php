@php
    $blogs = $homeService->getBlogs($component->blog_type, $component->blog_limit, null, $component->blogs);
    
    // Fetch latest active review with comments
    $review = \App\Models\Review::with('user')
        ->where('status', 'Active')
        ->where('is_public', '1')
        ->whereNotNull('comments')
        ->where('comments', '<>', '')
        ->latest()
        ->first();

    if ($review) {
        $review_comments = $review->comments;
        $review_user_name = optional($review->user)->name ?? __('Anonymous');
        $userFile = $review->user ? $review->user->fileUrlQuery() : '';
        $review_avatar = !empty($userFile) ? $userFile : asset('public/dist/img/default-image.png');
    } else {
        $review_comments = __("We Care About Our Customer Experience. In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.");
        $review_user_name = "Tina Mcdonnale";
        $review_avatar = asset('public/dist/img/default-image.png');
    }
@endphp

<!-- Left: Customer Comment Column -->
<div class="w-full lg:w-1/4 flex-shrink-0">
    <div class="testimonial-card">
        <div>
            <h4 class="testimonial-header-title">{{ __('Customer Comment') }}</h4>
            <h3 class="testimonial-sub">{{ __('We Care About Our Customer Experience') }}</h3>
            <p class="testimonial-quote">
                "{{ $review_comments }}"
            </p>
        </div>
        <div class="flex items-center gap-4 mt-auto pt-4 border-t border-gray-100 testimonial-author">
            <img src="{{ $review_avatar }}" alt="{{ $review_user_name }}">
            <div>
                <h5 class="font-bold text-sm text-gray-12 dm-bold">{{ $review_user_name }}</h5>
                <p class="text-xs text-gray-10 dm-sans">{{ __('Verified Purchaser') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Right: Featured Blog Column -->
<div class="w-full lg:w-3/4 flex flex-col">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($blogs as $blog)
            <div class="blog-card-custom">
                <div class="blog-img-wrap">
                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                        <img src="{{ $blog->fileUrlQuery() }}" alt="{{ $blog->title }}">
                    </a>
                </div>
                <div class="blog-content-wrap">
                    <span class="blog-date">{{ date('d F, Y', strtotime($blog->created_at)) }}</span>
                    <h4 class="blog-title">
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">
                            {{ trimWords($blog->title, 65) }}
                        </a>
                    </h4>
                    
                    <a href="{{ route('blog.details', $blog->slug) }}"
                        class="blog-readmore">
                        <span>{{ __('Read Now') }}</span>
                        <svg class="w-3.5 h-3.5 ml-2 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.70696 0L8.29274 1.41421L10.5856 3.70711H0.999849C0.447564 3.70711 -0.000150681 4.15482 -0.000150681 4.70711C-0.000150681 5.25939 0.447564 5.70711 0.999849 5.70711H10.5856L8.29274 8L9.70696 9.41421L14.4141 4.70711L9.70696 0Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

