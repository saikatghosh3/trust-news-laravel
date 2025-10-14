<!DOCTYPE html>
@php
    $direction = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<html lang="en" dir="{{ $direction }}" class="@if (mode()) dark @endif">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ app_setting()->favicon }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="google-site-verification" content="F_Q9nuMHlFCzzIgz2Ow-5bJM2ZVqoAYYIIVDwbsjOTI" />

    {!! SEOTools::generate() !!}

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/css/swiper-bundle.min.css') }}" />

    {{-- Load Google Fonts --}}
    @foreach ($loadedFonts as $font)
        <link href="{{ $font->source_url }}" rel="stylesheet">
    @endforeach

    {{-- Google Font - Hind Siliguri --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">


        
       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-news', 'Resources/assets/sass/app.scss') }} --}}

        <style>
            /* Apply Hind Siliguri to entire body */
            body {
                font-family: 'Hind Siliguri', Arial, sans-serif !important;
            }
        </style>

    {{-- Set CSS Variables --}}
    {{-- page loader css  --}}
   <style>
@import url('https://fonts.googleapis.com/css?family=Quattrocento+Sans');

.loading-text-word {
    display: inline-block;
    animation: blurText 1.5s linear infinite alternate;
    font-family: 'Quattrocento Sans', sans-serif;
}

/* Sequential delay for each letter */
.loading-text-word:nth-child(1) { animation-delay: 0s; }
.loading-text-word:nth-child(2) { animation-delay: 0.2s; }
.loading-text-word:nth-child(3) { animation-delay: 0.4s; }
.loading-text-word:nth-child(4) { animation-delay: 0.6s; }
.loading-text-word:nth-child(5) { animation-delay: 0.8s; }
.loading-text-word:nth-child(6) { animation-delay: 1s; }
.loading-text-word:nth-child(7) { animation-delay: 1.2s; }

@keyframes blurText {
    0% { filter: blur(0px); opacity: 1; }
    100% { filter: blur(4px); opacity: 0.6; }
}
</style>
    {{-- page loader css end  --}}
    

    <!-- Tailwind css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('plugins-css')
    @stack('custom-css')

    <!-- Google Analytics (GA4) -->
    @if (app()->environment('production') && isset($metaInfo->google_analytics) && $metaInfo->google_analytics)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $metaInfo->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $metaInfo->google_analytics }}');
        </script>
    @endif

</head>
<input type="hidden" name="language" id="language" value="{{ app()->getLocale() }}">
<input type="hidden" name="direction" id="direction" value="{{ $direction }}">

<body class="min-h-screen relative"
    @if (!$themeSettings->is_default && $themeSettings->font_family) style="font-family: {{ $themeSettings->font_family }};" @endif>
     
    {{-- page loader  --}}
    <div id="pageLoader" class="loading fixed inset-0 bg-black flex items-center justify-center z-50">
    <div class="loading-text flex space-x-1 text-white text-4xl font-sans">
        <span class="loading-text-word">L</span>
        <span class="loading-text-word">O</span>
        <span class="loading-text-word">A</span>
        <span class="loading-text-word">D</span>
        <span class="loading-text-word">I</span>
        <span class="loading-text-word">N</span>
        <span class="loading-text-word">G</span>
    </div>
</div>
    {{-- page loader end  --}}
      
    @include('themes.magazine.components.common.login')
   
    {{-- Menu section --}}
    @include('themes.magazine.layouts.header.top-menu')
    @include('themes.magazine.layouts.header.side-menu')
    @include ('themes.magazine.layouts.header.mobile-menu')
         
    <!-- Top Section -->
      @include('themes.magazine.layouts.header.top-section')


                      
    {{ $slot }}
      
    <!-- Footer section -->
    @include('themes.magazine.layouts.footer')

    <!-- Cookies section -->
	@include('themes.magazine.components.common.cookies')

    <!-- Global Modal -->
    <div id="globalModal"
        class="fixed inset-0 flex items-center justify-center bg-black/75 z-50 opacity-0 pointer-events-none transition-opacity duration-300">
        <div id="globalModalContent">
            <!-- Close Button -->
            <button id="globalModalClose"
                class="p-2 text-white bg-red-600 hover:bg-red-800 rounded-full w-8 h-8 flex items-center justify-center absolute top-4 right-4 transition_3">
                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                        fill="currentColor" />
                </svg>
            </button>

            <!-- Dynamic Content Goes Here -->
            <div id="modalBody"></div>
        </div>
    </div>
    {{-- Btn scroll To Top --}}
    <button id="scrollToTopBtn" type="button" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="hidden bg-cyan-600 hover:bg-cyan-500 rounded-full w-10 h-10 flex justify-center items-center fixed bottom-4 right-2 hover:-translate-y-1 z-50 transition-all duration-300 ease-in">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="#fff"
                d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z" />
        </svg>
    </button>
    {{-- scrollToTopBtn --}}
    <script>
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                scrollToTopBtn.classList.remove('hidden');
            } else {
                scrollToTopBtn.classList.add('hidden');
            }
        });

        const subscribeUrl = "{{ route('subscribe.ajax') }}";
        const categoryLoadMoreUrl = "{{ route('load.more.category.news') }}";
        const videoLoadMoreUrl = "{{ route('load.more.video.news') }}";
        const ajaxPollVoteUrl = "{{ route('ajax.poll.vote') }}";
        const ajaxPollResultUrl = "{{ route('ajax.poll.result', ['poll' => '__POLL_ID__']) }}";
    </script>
    {{-- <script src="{{ asset(path: 'website/js/jquery-3.7.1.min.js') }}"></script> --}}
    <script src="{{ asset('website/js/jquery-3.7.1.min.js') }}"></script>


    {{-- page loader section script start--}}
        <script>
window.addEventListener('load', () => {
    const loader = document.getElementById('pageLoader');
    if(loader) {
        // Add fade-out transition
        loader.style.transition = "opacity 0.5s ease";
        loader.style.opacity = 0;
        setTimeout(() => {
            loader.style.display = 'none';
        }, 500);
    }
});
</script>
     {{-- page loader  section script end  --}}

    <script src="{{ \App\Helpers\ThemeHelper::asset('plugins/swiper/js/swiper-bundle.min.js') }}"></script>
    {{-- <script src="{{ \App\Helpers\ThemeHelper::asset('plugins/youtube-api/youtube-iframe-api.js') }}"></script> --}}

    <script src="{{ \App\Helpers\ThemeHelper::asset('js/website.js?v=5') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/global-tab.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/dark-light.js?v=2') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/user-profile-setting.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/global-modal.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/mega-menu-inner-tab.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/mobile-side-menu.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/top-menu.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/video-play.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/login-modal.js?v=5') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/subscribe-form.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/category-view.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/poll-vote-result.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/youtube-play-alpinejs.js') }}"></script>
    <script src="{{ \App\Helpers\ThemeHelper::asset('js/language-switcher-sm.js') }}"></script>

    <script src="{{ asset('website/js/copy-url.js') }}"></script>
    <script src="{{ asset('website/js/customized-font-size.js?v=5') }}"></script>

    @stack('plugins-js')
    @stack('custom-js')
</body>

</html>
