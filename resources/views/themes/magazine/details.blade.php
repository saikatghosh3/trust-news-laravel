<x-web-layout>
    <!-- Pagination -->
    <section class="container mt-2">
        <div class="bg-neutral-100 dark:text-white dark:bg-neutral-800 flex items-center p-2 gap-3">
            <ul class="flex gap-1 items-center">
                <li>
                    <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap"
                        href="{{ __url('/') }}">{{ localize('home') }}</a>
                </li>
                @if ($newsDetail->category)
                    <svg width="12" height="14" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <li>
                        <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap"
                            href="{{ __url($newsDetail->category->slug) }}">{{ $newsDetail->category->category_name ?? '' }}</a>
                    </li>
                @endif

                @if ($newsDetail->subCategory)
                    <svg width="12" height="14" viewBox="0 0 12 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <li>
                        <a class="text-neutral-600 dark:text-white transition_3 capitalize whitespace-nowrap"
                            href="{{ __url($newsDetail->subCategory->slug) }}">{{ $newsDetail->subCategory->category_name ?? '' }}</a>
                    </li>
                @endif

                <svg width="12" height="14" viewBox="0 0 12 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 15" stroke="oklch(70.8% 0 0)" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <li class="text-brand-primary line-clamp-1">{{ $newsDetail->title }}</li>
            </ul>
        </div>
    </section>

    <!-- Details Page News (right side news sticky) Start -->

    <section class="container mt-2 pb-8 grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 4xl:grid-cols-4 gap-4">
        <!-- Left section news -->
        <section class="lg:col-span-2 xl:col-span-2 4xl:col-span-3 gap-6">
            <!-- heading -->
            {{-- old code  --}}
            {{-- <div class=""> 
                 <div class="h-7 pl-3 pr-6 text-white uppercase flex justify-center items-center bg-brand-primary clip-hex-right"
                    {!! bgColorStyle($newsDetail->category->color_code) !!}>
                    {{ Str::upper($newsDetail->category->category_name) }}
                  
                </div> --}}

                {{-- new code and perfectly working --}}
            
                <div class="xl:mt-0 lg:mt-6 md:mt-8 sm:mt-10 mt-12">
    <div
        class="h-7 pl-3 pr-6 text-white uppercase flex justify-center items-center bg-brand-primary clip-hex-right"
        {!! bgColorStyle($newsDetail->category->color_code) !!}>
        {{ Str::upper($newsDetail->category->category_name) }}
    </div>
</div>


           {{-- new code  and perfectly working end  --}}

                @if ($newsDetail->stitle)
                    <h2 class="dark:text-white mt-2">{{ $newsDetail->stitle }}</h2>
                @endif
                <h1 class="dark:text-white text-2xl lg:text-3xl my-2 font-semibold">
                    {{ $newsDetail->title }}
                </h1>
                <div class="flex md:items-center justify-between flex-col md:flex-row gap-4 mt-2">
                
                    <div class="dark:text-white capitalize flex items-center gap-1 text-sm">
                        <span>{{ $newsDetail->postByUser->full_name ?? localize('unknown') }}</span>
                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z" />
                        </svg>
                        <span>{{ news_publish_date_format($newsDetail->created_at) }}</span>
                        <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                        </svg>
                        <span>{{ $newsDetail->comments_count }}</span>
                    </div>

                    <!-- Social section -->
                
                    @include ('themes.magazine.components.common.social-section')

                    {{-- ***************experiment code start******************* --}}
                     
                        

{{-- <div class="my-4 flex justify-end ">
    <button 
        onclick="printNews()" 
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-all">
        🖨️
    </button>
</div> --}}



<script>
function printNews() {
    // Get the content
    const title = document.querySelector('h1').innerText;
    
    // Try multiple ways to get the image
    let imageUrl = '';
    const imageElement = document.querySelector('figure.printable-image img') || 
                        document.querySelector('figure.mb-8 img') || 
                        document.querySelector('figure img') ||
                        document.querySelector('.printable-image img');
    
    if (imageElement) {
        imageUrl = imageElement.src; 
    }
    
    const content = document.getElementById('news-content').innerHTML;
    // logo path adjuted
    const logoUrl = `{{ asset('assets/logo2.jpg') }}`; 
    const siteName = `{{ config('app.name', 'News Site') }}`;
    
    // Debug - check what we got
    console.log('Title:', title);
    console.log('Image URL:', imageUrl);
    console.log('Content length:', content.length);
    
    // Create new window
    const printWindow = window.open('', '_blank', 'width=800,height=600');
    
    // Write HTML
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Print - ${title.replace(/'/g, "\\'")}</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: Arial, sans-serif;
                    padding: 20mm;
                    color: #000;
                    background: white;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                    padding-bottom: 15px;
                    border-bottom: 2px solid #333;
                }
                .logo {
                    max-width: 350px;
                    height: auto;
                    margin: 0 auto 2px;
                    display: block;
                }
           
                h1 {
                    font-size: 22pt;
                    margin-top: 3rem;
                    font-weight: bold;
                    text-align: left;
                }
                .news-image-container {
                    width: 100%;
                    margin: 20px 0;
                    text-align: center;
                }
                .news-image {
                    max-width: 100%;
                    width: 100%;
                    height: auto;
                    display: block;
                    margin: 0 auto;
                }
                .content {
                    font-size: 11pt;
                    line-height: 1.7;
                    text-align: justify;
                }
                .content p {
                    margin-bottom: 12px;
                }
                .content * {
                    color: #000 !important;
                    background: transparent !important;
                }
                .content img {
                    max-width: 100%;
                    height: auto;
                    margin: 15px 0;
                }
                @media print {
                    @page {
                        size: A4;
                        margin: 15mm;
                    }
                    body {
                        padding: 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <img src="${logoUrl}" alt="Logo" class="logo" onerror="this.style.display='none'">
                
            </div>
            
            <h1>${title.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</h1>
            
            ${imageUrl ? `<div class="news-image-container"><img src="${imageUrl}" alt="News Image" class="news-image"></div>` : '<p style="color:red;">No image found</p>'}
            
            <div class="content">${content}</div>
        </body>
        </html>
    `);
    
    printWindow.document.close();
    
    // Give more time for images to load
    setTimeout(() => {
        printWindow.print();
        setTimeout(() => printWindow.close(), 1500);
    }, 1500);
}
</script>
                    {{--************************ experiment code end*******************  --}}
                </div>
            </div>



    {{-- download button  code start   --}}
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
function downloadSocialCard() {
    // Get the content
    const title = document.querySelector('h1').innerText;
    
    // Get the image
    let imageUrl = '';
    const imageElement = document.querySelector('figure.printable-image img') || 
                        document.querySelector('figure.mb-8 img') || 
                        document.querySelector('figure img') ||
                        document.querySelector('.printable-image img');
    
    if (imageElement) {
        imageUrl = imageElement.src; 
    }
    
    const logoUrl = `{{ asset('assets/logo3.png') }}`; 
    const siteName = `{{ config('app.name', 'News Site') }}`;
    const websiteUrl = window.location.origin;
    
    // Create a hidden container for the card
    const cardContainer = document.createElement('div');
    cardContainer.style.position = 'fixed';
    cardContainer.style.left = '-9999px';
    cardContainer.style.top = '0';
    document.body.appendChild(cardContainer);
    
    // Create the card HTML
  cardContainer.innerHTML = `
    <div id="social-card" style="max-width: 800px; width: 100%; background: white; font-family: Arial, sans-serif; margin: 0 auto;">
        <!-- Image Section with Logo Overlay (RED BORDER) -->
        <div style="position: relative; border: 8px solid #dc2626; overflow: hidden;">
            <img src="${imageUrl}" style="width: 100%; height: auto; min-height: 250px; max-height: 600px; object-fit: cover; display: block;" crossorigin="anonymous">
            
            <!-- Logo Overlay (Top Right) -->
            <div style="position: absolute; top: 10px; right: 10px; z-index: 10; background: white; padding: 8px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                <img src="${logoUrl}" style="width: clamp(80px, 15vw, 150px); height: auto; display: block;" crossorigin="anonymous">
            </div>
        </div>
        
        <!-- Headline Section (BLUE BACKGROUND) -->
        <div style="background: #2563eb; padding: clamp(15px, 4vw, 30px); color: white;">
            <h1 style="font-size: clamp(18px, 4vw, 32px); font-weight: bold; margin: 0; line-height: 1.4; word-wrap: break-word;">
                ${title.replace(/</g, '&lt;').replace(/>/g, '&gt;')}
            </h1>
        </div>
        
        <!-- Comment Section (BLUE BACKGROUND) -->
        <div style="background: #2563eb; padding: clamp(15px, 3vw, 25px); color: white; text-align: center;">
            <p style="font-size: clamp(14px, 2.5vw, 20px); margin: 0; font-weight: 500;">
                >> বিস্তারিত সংবাদ কমেন্ট সেকশনে দেখুন 
            </p>
        </div>
        
        <!-- Social Media Links (BLUE BACKGROUND) -->
        <div style="background: #2563eb; padding: clamp(15px, 3vw, 25px); display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: clamp(15px, 3vw, 40px);">
            <!-- Facebook -->
            <div style="display: flex; align-items: center; gap: 8px; color: white; min-width: 0;">
                <svg style="width: clamp(24px, 4vw, 32px); height: clamp(24px, 4vw, 32px); flex-shrink: 0; fill: white;" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500; word-break: break-word;">facebook.com/trustnewspressbd</span>
            </div>
            
            <!-- YouTube -->
            <div style="display: flex; align-items: center; gap: 8px; color: white; min-width: 0;">
                <svg style="width: clamp(24px, 4vw, 32px); height: clamp(24px, 4vw, 32px); flex-shrink: 0; fill: white;" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
                <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500; word-break: break-word;">youtube.com/@trustnews-bd</span>
            </div>
            
            <!-- Website -->
            <div style="display: flex; align-items: center; gap: 8px; color: white; min-width: 0;">
                <svg style="width: clamp(24px, 4vw, 32px); height: clamp(24px, 4vw, 32px); flex-shrink: 0; fill: white;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.93 6h-3.45c-.19-1.18-.57-2.28-1.07-3.27 1.87.83 3.34 2.3 4.52 3.91zM12 4c.53.89.94 1.89 1.22 2.93h-2.44C11.06 5.89 11.47 4.89 12 4zM4.07 12c0-.66.08-1.3.21-1.92h3.69c-.09.63-.14 1.31-.14 2s.05 1.37.14 2H4.28c-.13-.62-.21-1.26-.21-1.92zm1.9 4h3.45c.19 1.18.57 2.28 1.07 3.27-1.87-.83-3.34-2.3-4.52-3.91zM12 20c-.53-.89-.94-1.89-1.22-2.93h2.44C12.94 18.11 12.53 19.11 12 20zm2.36-1.73c.5-.99.88-2.09 1.07-3.27h3.45c-.83 1.6-2.26 3.07-4.52 3.91zM12 14c-.66 0-1.3-.05-1.92-.14V10.14C10.7 10.05 11.34 10 12 10s1.3.05 1.92.14v3.72C13.3 13.95 12.66 14 12 14zm-1.22-5.07h2.44C13.06 8.89 12.53 7.89 12 7.07 11.47 7.89 10.94 8.89 10.78 8.93z"/>
                </svg>
                <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500; word-break: break-word;">trustnews.press</span>
            </div>
        </div>
    </div>
`;
    
    // Wait for images to load
    const images = cardContainer.querySelectorAll('img');
    let loadedImages = 0;
    const totalImages = images.length;
    
    const checkImagesLoaded = () => {
        loadedImages++;
        if (loadedImages === totalImages) {
            generateImage();
        }
    };
    
    images.forEach(img => {
        if (img.complete) {
            checkImagesLoaded();
        } else {
            img.onload = checkImagesLoaded;
            img.onerror = checkImagesLoaded;
        }
    });
    
    // If no images, generate immediately
    if (totalImages === 0) {
        generateImage();
    }
    

    //    working function  for download

    function generateImage() {
        const card = document.getElementById('social-card');
        
        html2canvas(card, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: '#ffffff'
        }).then(canvas => {
        
            canvas.toBlob(blob => {
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `${title.substring(0, 30).replace(/[^a-z0-9]/gi, '_')}_card.png`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                
            
                document.body.removeChild(cardContainer);
            });
        });
    }

    // working function  to download end 

    // to see the preview function start 
//           function generateImage() {
//     const card = document.getElementById('social-card');
    
//     // PREVIEW MODE: Show the card on screen instead of hidden
//     cardContainer.style.position = 'fixed';
//     cardContainer.style.left = '50%';
//     cardContainer.style.top = '50%';
//     cardContainer.style.transform = 'translate(-50%, -50%)';
//     cardContainer.style.zIndex = '9999';
//     cardContainer.style.boxShadow = '0 0 50px rgba(0,0,0,0.5)';
//     cardContainer.style.maxWidth = '90vw';
//     cardContainer.style.maxHeight = '90vh';
//     cardContainer.style.overflow = 'auto';
    
//     // Add close button
//     const closeBtn = document.createElement('button');
//     closeBtn.innerHTML = '❌ Close';
//     closeBtn.style.position = 'fixed';
//     closeBtn.style.top = '20px';
//     closeBtn.style.right = '20px';
//     closeBtn.style.zIndex = '10000';
//     closeBtn.style.padding = '10px 20px';
//     closeBtn.style.background = '#dc2626';
//     closeBtn.style.color = 'white';
//     closeBtn.style.border = 'none';
//     closeBtn.style.borderRadius = '5px';
//     closeBtn.style.cursor = 'pointer';
//     closeBtn.style.fontSize = '16px';
//     closeBtn.onclick = () => {
//         document.body.removeChild(cardContainer);
//         document.body.removeChild(closeBtn);
//     };
//     document.body.appendChild(closeBtn);

// }
    // to see the preview function  end 
}
</script>
       
    {{-- download button code  end  --}}

            <!-- News Details -->
            <div class="dark:text-white mt-6">,
                
    {{-- @php
    $raw = $newsDetail->photoLibrary->large_image ?? null; // e.g. "large_xxx.webp" or "uploads/photo-library/large_xxx.webp"
    $src = asset('assets/news-details-view.png');

    if ($raw) {
        // normalize
        $img = ltrim(str_replace(['public/', 'storage/'], '', (string) $raw), '/');

        // ensure prefix
        if (! \Illuminate\Support\Str::startsWith($img, 'uploads/photo-library/')) {
            $img = 'uploads/photo-library/' . $img;
        }

        // (dev-only) existence check
        // if (app()->isLocal() && ! file_exists(public_path($img))) dump('MISSING FILE: '.public_path($img));

        $src = asset($img);
    }
@endphp --}}
                    {{-- <figure class="mb-8"> --}}
                             {{-- original code  --}}
                       
                        {{-- <img class="w-full max-h-[550px]"
                            src="{{ isset($newsDetail->photoLibrary->large_image) ? asset('storage/' . $newsDetail->photoLibrary->large_image) : asset('/assets/news-details-view.png') }}"
                            alt="{{ $newsDetail->image_alt }}" /> --}}



                             {{-- changing the path  but code is not working testing code one--}}

                            {{-- <img class="w-full max-h-[550px]"
     src="{{ $newsDetail->photoLibrary && $newsDetail->photoLibrary->large_image
         ? asset('storage/'.$newsDetail->photoLibrary->large_image)
         : asset('assets/news-details-view.png') }}"
     alt="{{ $newsDetail->image_alt ?? 'News Image' }}" /> --}}


              {{-- testing code 2  --}}

     {{-- <figure class="mb-8">
  <img class="w-full max-h-[550px]" src="{{ $src }}" alt="{{ $newsDetail->image_alt ?? 'News Image' }}">
  <figcaption class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic text-center">
    {{ $newsDetail->image_title }}
  </figcaption>
</figure> --}}
                   
                   




{{-- full code testing  --}}


@php
    $defaultImage = asset('assets/news-details-view.png');
    $largeImage   = $newsDetail->photoLibrary->large_image ?? null;
    

    if ($largeImage) {
        // normalize without forcing prefix
        $imagePath = ltrim(str_replace(['public/', 'storage/'], '', $largeImage), '/');

        // if the path already starts with 'uploads/photo-library', leave it
        // otherwise prefix it
        if (!\Illuminate\Support\Str::startsWith($imagePath, 'uploads/photo-library')) {
            $imagePath = 'uploads/photo-library/' . $imagePath;
        }

        $src = asset($imagePath);
    } else {
        $src = $defaultImage;
    }
@endphp


<figure class="mb-8">
    <img class="w-full max-h-[550px]" src="{{ $src }}" alt="{{ $newsDetail->image_alt ?? 'News Image' }}">
    <figcaption class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic text-center">
        {{ $newsDetail->image_title }}
    </figcaption>
</figure>




{{-- end testing code  --}}

                

                <div id="news-content" class="text-base prose-content">
                    {!! $newsDetail->news ?? 'null' !!}
                </div>

                {{-- News Post Video Url --}}
                @if ($newsDetail->videos)
                    @php
                        $videoData = manageVideoUrl($newsDetail->videos);
                    @endphp

                    @if ($videoData['type'] === 'video')
                        <video controls class="w-full h-auto aspect-video"
                            @if($videoData['thumb']) poster="{{ $videoData['thumb'] }}" @endif>
                            <source src="{{ $videoData['src'] }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                    @elseif ($videoData['type'] === 'iframe')
                        <div x-data="{ showPlayer: false }" class="relative aspect-video mt-4">
                            {{-- Thumbnail --}}
                            <template x-if="!showPlayer">
                                <div class="absolute inset-0 cursor-pointer" @click="showPlayer = true">
                                    <img src="{{ $videoData['thumb'] ?? asset('images/default-thumbnail.jpg') }}"
                                        class="w-full h-full object-cover shadow-md">
                                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="white">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </template>

                            {{-- iFrame --}}
                            <template x-if="showPlayer">
                                <iframe class="absolute top-0 left-0 w-full h-full"
                                    src="{{ $videoData['src'] }}{{ Str::contains($videoData['src'], '?') ? '&' : '?' }}autoplay=1"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            </template>
                        </div>
                    @endif
                @endif

                {{-- Post Tag --}}
                @if ($newsDetail->postTags->count() > 0)
                    <div class="bg-white rounded-md shadow-sm p-3 mt-4 border border-gray-200">
                        <h2 class="font-bold text-gray-800 mb-2">{{ localize('tags') }}</h2>

                        <div class="flex flex-wrap gap-2">
                            @foreach ($newsDetail->postTags as $postTag)
                                <span class="inline-block text-neutral-700 bg-gray-100 px-3 py-1 rounded capitalize">
                                    {{ $postTag->tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

        </section>

        <!-- Right section news -->
        <section>
            <div class="space-y-6 sticky top-16">
                <!-- Popular post -->
                @include('themes.magazine.components.common.popular-post')

                <!-- Ads section -->
                <figure class="">
                    @if ($ad = get_advertisements(3, 1))
                        {!! $ad->embed_code !!}
                    @else
                        <img class="w-full h-full object-cover" src="{{ asset('assets/ads-electronic.png') }}"
                            alt="" />
                    @endif
                </figure>

            </div>
        </section>


    </section>

    <section class="container mt-2 pb-8 grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 4xl:grid-cols-4 gap-4">
        <!-- Left section news -->
        <section class="lg:col-span-2 xl:col-span-2 4xl:col-span-3 gap-6">

            <!-- add section -->
            <figure class="mt-6">
                @if ($ad = get_advertisements(3, 3))
                    {!! $ad->embed_code !!}
                @else
                    <img class="w-full h-full object-cover" src="{{ asset('assets/banner-large.png') }}"
                        alt="" />
                @endif
            </figure>

            <!-- Article-slider -->
            @include ('themes.magazine.components.slider.article-slider')

            <!-- Single Comment 1 -->
            @if (app_setting()->show_reporter_message == 1)
                <section class="flex gap-4 my-8">
                    <div>
                        <figure class="md:w-24 md:h-24 w-16 h-16 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ $newsDetail->reporterBy->photo ? asset('storage/' . $newsDetail->reporterBy->photo) : asset('assets/opinion-avatar.png') }}"
                                alt="" />
                        </figure>
                    </div>
                    <div class="space-y-6">
                        <div class="space-y-3 dark:text-white">
                            <div class='flex gap-2 items-center justify-between'>
                                <h2 class="capitalize">
                                    <strong>{{ $newsDetail->reporterBy->name . ' ' . $newsDetail->reporterBy->nick_name }}</strong>
                                </h2>
                            </div>
                            <p class="text-neutral-500 dark:text-white line-clamp-3 capitalize">
                                {{ $newsDetail->reporter_message ?? null }}
                            </p>
                        </div>
                    </div>
                </section>
            @endif



            <!-- Related post Section -->
            @if ($sectionSixNews->isNotEmpty())
                @include ('themes.magazine.components.common.related-post')
            @endif

            <!-- Comment Section -->
            <input type="hidden" form="comment-form" name="news_comment_type" value="news">

            @if (app_setting()->web_user_can_comment == 1)
                @include ('themes.magazine.components.details.comment-section')
            @endif

        </section>

        <!-- Right section news -->
        <section class="md:w-1/2 lg:w-auto">
            <div class="space-y-6 sticky top-16">
                <!-- Top Week -->
                @include('themes.magazine.components.common.recommended-top-week-post')
                <!-- Voting poll -->
                @if ($votingPoll)
                    @include('themes.magazine.components.common.voting-poll')
                @endif

                <!-- Ads section -->
                <figure class="">
                    @if ($ad = get_advertisements(3, 4))
                        {!! $ad->embed_code !!}
                    @else
                        <img class="w-full h-full object-cover" src="{{ asset('assets/ads-electronic-medium.png') }}"
                            alt="" />
                    @endif
                </figure>
            </div>
        </section>


    </section>

    <!-- Details Page News (right side news sticky) End -->

</x-web-layout>
