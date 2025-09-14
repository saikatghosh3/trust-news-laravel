<x-web-layout>
    <!-- Pagination -->
    <section class="container mt-2">
        <div class="bg-neutral-100 dark:text-white dark:bg-neutral-800 flex items-center p-2 gap-3">
            <ul class="flex gap-1 items-center">
                <li>
                    <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap"
                        href="{{ __url('/') }}">{{ localize('home') }}</a>
                </li>
                <svg width="12" height="14" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                <li class="text-brand-primary line-clamp-1">{{ localize('archive') }}</li>
            </ul>
        </div>

        <form action="{{ __url('archive') }}" method="GET">
            <section class="grid items-center grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-3 my-4">
                <!-- Date Range -->
                <div>
                    <input id="myDateRangeInput" name="daterange"
                        value="{{ request('daterange') }}"
                        class="text-sm w-full px-2 py-2 border rounded-md dark:bg-neutral-800 dark:border-neutral-800 dark:text-neutral-50"
                        placeholder="Select Date" type="text">
                </div>

                <!-- Category -->
                <div>
                    <select name="category" id="category"
                        class="text-sm w-full px-2 py-2 border rounded-md dark:bg-neutral-800 dark:border-neutral-800 dark:text-neutral-50">
                        <option value="">{{ localize('select_category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Content Search -->
                <div>
                    <input type="text" name="content" id="content"
                        value="{{ request('content') }}"
                        class="text-sm w-full px-2 py-2 border rounded-md dark:bg-neutral-800 dark:border-neutral-800 dark:text-neutral-50"
                        placeholder="{{ localize('search_here') }}">
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <div class="w-1/2">
                        <button type="submit"
                            class="w-full text-sm bg-neutral-600 px-7 py-2 rounded-md text-white">
                            {{ localize('search') }}
                        </button>
                    </div>
                    <div class="w-1/2">
                        <a href="{{ __url('archive') }}"
                        class="w-full text-sm bg-sky-600 px-7 py-2 rounded-md text-white block text-center">
                            {{ localize('search_all') }}
                        </a>
                    </div>
                </div>
            </section>
        </form>

    </section>

    <!-- Archive News Grid -->
    <section class="container mt-2 pb-8 gap-4">
        <div class="block">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @if ($archiveNews->isNotEmpty())
                    @foreach ($archiveNews as $news)
                        <!-- Single News Card -->
                        <div class="">
                            <a href="{{ __url($news->encode_title) }}"
                            class="block w-full h-42 md:h-[150px] 2xl:h-40 4xl:h-52 group overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition_5"
                                    src="{{ $news->photoLibrary->image_base_url ?? asset('/assets/news-card-view.png') }}"
                                    alt="{{ $news->image_alt }}" />
                            </a>
                            <div class="py-3 space-y-2">
                                <a href="{{ __url($news->encode_title) }}"
                                class="line-clamp-2 text-gray-600 dark:text-white hover:text-brand-primary dark:hover:text-brand-primary font-bold text-lg leading-6 transition_3">
                                    {{ $news->title }}
                                </a>

                                <p class="text-sm line-clamp-2 text-neutral-600 dark:text-neutral-400">
                                    {{ clean_news_content($news->news) }}
                                </p>

                                <div class="text-neutral-500 capitalize flex items-center gap-1 text-sm">
                                    <span>{{ $news->postByUser->full_name ?? localize('unknown') }}</span>
                                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                    <span>{{ news_publish_date_format($news->publish_date) }}</span>
                                    <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                                    </svg>
                                    <span>{{ $news->comments_count }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-full">
                        <div class="bg-red-100 text-red-700 px-4 py-3 rounded text-center w-full text-xl" role="alert">
                            {{ localize('no_information_found') }}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination Links -->
            <div class="mt-6 flex justify-center">
                {{ $archiveNews->links('vendor.pagination.archive') }}
            </div>
        </div>
    </section>

    @push('plugins-css')
        <!-- daterangepicker CSS  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website/plugins/daterangepicker/daterangepicker.css') }}" />
    @endpush

    <!-- Details Page News (right side news sticky) End -->
    @push('plugins-js')
        <script src="{{ asset('website/plugins/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('website/plugins/daterangepicker/daterangepicker.min.js') }}"></script>
    @endpush
    @push('custom-js')
        <script src="{{ asset('website/js/date-range.js') }}"></script>
    @endpush
</x-web-layout>
