<section class="layout-wrapper px-4 xl:px-0 my-10 md:my-12"
    style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
    
    <style>
        .testimonial-card-skeleton {
            background-color: #f8f8f8;
            border-radius: 8px;
            padding: 24px;
            border: 1px solid #f1f1f1;
            height: 100%;
        }
        .testimonial-card {
            background-color: #f8f8f8;
            border-radius: 8px;
            padding: 24px;
            border: 1px solid #f1f1f1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .testimonial-header-title {
            font-size: 20px;
            font-weight: 700;
            color: #222;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: inline-block;
        }
        .testimonial-header-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #1a56db;
        }
        .testimonial-sub {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            line-height: 1.3;
            margin-bottom: 15px;
        }
        .testimonial-quote {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            font-style: italic;
            margin-bottom: 20px;
        }
        .testimonial-author img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .blog-section-title {
            font-size: 24px;
            font-weight: 700;
            color: #222;
            text-align: center;
            text-transform: uppercase;
        }
        .blog-section-subtitle {
            font-size: 14px;
            color: #777;
            text-align: center;
            margin-top: 4px;
        }
        .blog-card-custom {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #f1f1f1;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .blog-card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .blog-card-custom .blog-img-wrap {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        .blog-card-custom .blog-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .blog-card-custom:hover .blog-img-wrap img {
            transform: scale(1.05);
        }
        .blog-card-custom .blog-content-wrap {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .blog-card-custom .blog-date {
            font-size: 12px;
            font-weight: 600;
            color: #1a56db;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .blog-card-custom .blog-title {
            font-size: 16px;
            font-weight: 700;
            color: #222;
            line-height: 1.4;
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 44px;
            transition: color 0.2s ease;
        }
        .blog-card-custom:hover .blog-title {
            color: #1a56db;
        }
        .blog-card-custom .blog-readmore {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            display: inline-flex;
            align-items: center;
            margin-top: auto;
            padding-top: 15px;
            transition: color 0.2s ease;
        }
        .blog-card-custom:hover .blog-readmore {
            color: #1a56db;
        }
    </style>

    <div class="flex justify-center md:justify-between md:items-center md:mb-5 mb-2.5">
        @if ($component->title)
            <P class="dm-bold text-sm text-center md:text-left md:text-22 text-gray-12 uppercase">
                {!! $component->title !!}</P>
        @endif
        <a href="{{ route('blog.all') }}"
        class="process-goto justify-center text-gray-10 font-medium text-base dm-sans hidden md:inline-flex items-center dm-sans hover:text-gray-12 trans-2 ltr:ml-auto">
        <span>{{ __('Read Blogs') }}</span>
        <svg class="relative ltr:ml-2 rtl:mr-2 neg-transition-scale" width="15" height="10" viewBox="0 0 15 10" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M9.70696 0L8.29274 1.41421L10.5856 3.70711H0.999849C0.447564 3.70711 -0.000150681 4.15482 -0.000150681 4.70711C-0.000150681 5.25939 0.447564 5.70711 0.999849 5.70711H10.5856L8.29274 8L9.70696 9.41421L14.4141 4.70711L9.70696 0Z"
                fill="currentColor"></path>
        </svg>
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 w-full">
        <!-- Left: Customer Comment Skeleton -->
        <div class="w-full lg:w-1/4 flex-shrink-0">
            <div class="testimonial-card-skeleton skeleton-box">
                <div class="h-6 bg-gray-200 rounded w-1/2 mb-6"></div>
                <div class="h-5 bg-gray-200 rounded w-3/4 mb-4"></div>
                <div class="h-20 bg-gray-200 rounded w-full mb-6"></div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gray-200"></div>
                    <div class="flex-1">
                        <div class="h-4 bg-gray-200 rounded w-1/2 mb-2"></div>
                        <div class="h-3 bg-gray-200 rounded w-1/3"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Blog Skeleton -->
        <div class="w-full lg:w-3/4 flex flex-col">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex flex-col bg-white rounded-lg border border-gray-100 p-4 h-full">
                        <div class="skeleton-box bg-gray-11 rounded-md h-48 w-full mb-4"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/3 mb-2"></div>
                        <div class="h-6 bg-gray-200 rounded w-3/4 mb-4"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2 mt-auto"></div>
                    </div>
                @endfor
            </div>
        </div>

        <button class="has-ajax-load-data opacity-0 invisible" onclick="ajaxProductLoad(this)"
            data-component="{{ $component->id }}"></button>
    </div>
</section>


