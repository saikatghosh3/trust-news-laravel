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

                {{-- testing text to speech start  --}}
                
      <!-- Text to Speech Button code  -->
     


{{-- old script and  was working for english start  --}}

<script>
 let speechSynthesisObj = window.speechSynthesis;
let currentUtterance = null;
let voices = [];


function loadVoices() {
    voices = speechSynthesisObj.getVoices();
    console.log('Available voices:', voices.map(v => `${v.name} (${v.lang})`));
}

loadVoices();


if (speechSynthesisObj.onvoiceschanged !== undefined) {
    speechSynthesisObj.onvoiceschanged = loadVoices;
}

function playSpeech() {
    const title = document.querySelector('h1').innerText;
    const content = document.getElementById('news-content').innerText;

   
    if (speechSynthesisObj.speaking) {
        stopSpeech();
        return;
    }

    
    const textToSpeak = `${title}. ${content}`;

    
    const banglaPattern = /[\u0980-\u09FF]/;
    const isBangla = banglaPattern.test(textToSpeak);

    
    currentUtterance = new SpeechSynthesisUtterance(textToSpeak);
    
    if (isBangla) {
   
        const banglaVoice = voices.find(voice => 
            voice.lang === 'bn-BD' || 
            voice.lang === 'bn-IN' || 
            voice.lang.startsWith('bn')
        );
        
        if (banglaVoice) {
            console.log('Using Bangla voice:', banglaVoice.name);
            currentUtterance.voice = banglaVoice;
            currentUtterance.lang = 'bn-BD';
            currentUtterance.rate = 0.9;
        } else {
            console.warn('No Bangla voice found, using default');
            currentUtterance.lang = 'bn-BD';
            currentUtterance.rate = 0.9;
        }
    } else {
        
        const englishVoice = voices.find(voice => 
            voice.lang.startsWith('en')
        );
        
        if (englishVoice) {
            currentUtterance.voice = englishVoice;
        }
        currentUtterance.lang = 'en-US';
        currentUtterance.rate = 1;
    }

    currentUtterance.pitch = 1;

    
    document.getElementById('ttsButton').classList.add('hidden');
    document.getElementById('stopTtsButton').classList.remove('hidden');

   
    currentUtterance.onend = () => {
        document.getElementById('ttsButton').classList.remove('hidden');
        document.getElementById('stopTtsButton').classList.add('hidden');
    };

    
    currentUtterance.onerror = (event) => {
        console.error('Speech synthesis error:', event);
        document.getElementById('ttsButton').classList.remove('hidden');
        document.getElementById('stopTtsButton').classList.add('hidden');
    };

 
    speechSynthesisObj.speak(currentUtterance);
}

function stopSpeech() {
    if (speechSynthesisObj.speaking) {
        speechSynthesisObj.cancel();
    }
    document.getElementById('ttsButton').classList.remove('hidden');
    document.getElementById('stopTtsButton').classList.add('hidden');
}
</script>
{{-- old script and  was working  only for english end --}}


{{-- new  script start  with api. working both for bangla and english --}}
{{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=Nwnl5BBC"></script> 
<script>
let speechSynthesisObj = window.speechSynthesis;
let currentUtterance = null;
let voices = [];

function loadVoices() {
    voices = speechSynthesisObj.getVoices();
    console.log('Available voices:', voices.map(v => `${v.name} (${v.lang})`));
}

loadVoices();

if (speechSynthesisObj.onvoiceschanged !== undefined) {
    speechSynthesisObj.onvoiceschanged = loadVoices;
}

function playSpeech() {
    const title = document.querySelector('h1').innerText;
    const content = document.getElementById('news-content').innerText;

    if (speechSynthesisObj.speaking || responsiveVoice.isPlaying()) {
        stopSpeech();
        return;
    }

    const textToSpeak = `${title}. ${content}`;
    const banglaPattern = /[\u0980-\u09FF]/;
    const isBangla = banglaPattern.test(textToSpeak);

    
    const banglaVoice = voices.find(voice => 
        voice.lang === 'bn-BD' || 
        voice.lang === 'bn-IN' || 
        voice.lang.startsWith('bn')
    );

    if (isBangla && !banglaVoice) {
        
        console.log('Using ResponsiveVoice for Bangla');
        
        document.getElementById('ttsButton').classList.add('hidden');
        document.getElementById('stopTtsButton').classList.remove('hidden');
        
        responsiveVoice.speak(textToSpeak, 'Bangla Bangladesh Female', {
            rate: 0.9,
            pitch: 1,
            onstart: () => {
                console.log('Speech started');
            },
            onend: () => {
                console.log('Speech ended');
                document.getElementById('ttsButton').classList.remove('hidden');
                document.getElementById('stopTtsButton').classList.add('hidden');
            },
            onerror: (error) => {
                console.error('Speech error:', error);
                document.getElementById('ttsButton').classList.remove('hidden');
                document.getElementById('stopTtsButton').classList.add('hidden');
            }
        });
        return;
    }

   
    currentUtterance = new SpeechSynthesisUtterance(textToSpeak);

    if (isBangla && banglaVoice) {
        currentUtterance.voice = banglaVoice;
        currentUtterance.lang = 'bn-BD';
        currentUtterance.rate = 0.9;
    } else {
        const englishVoice = voices.find(v => v.lang.startsWith('en'));
        if (englishVoice) currentUtterance.voice = englishVoice;
        currentUtterance.lang = 'en-US';
        currentUtterance.rate = 1;
    }

    currentUtterance.pitch = 1;

    document.getElementById('ttsButton').classList.add('hidden');
    document.getElementById('stopTtsButton').classList.remove('hidden');

    currentUtterance.onend = () => {
        document.getElementById('ttsButton').classList.remove('hidden');
        document.getElementById('stopTtsButton').classList.add('hidden');
    };

    currentUtterance.onerror = () => {
        console.error('Speech synthesis error');
        document.getElementById('ttsButton').classList.remove('hidden');
        document.getElementById('stopTtsButton').classList.add('hidden');
    };

    speechSynthesisObj.speak(currentUtterance);
}

function stopSpeech() {
    if (speechSynthesisObj.speaking) {
        speechSynthesisObj.cancel();
    }
    if (responsiveVoice.isPlaying()) {
        responsiveVoice.cancel();
    }
    document.getElementById('ttsButton').classList.remove('hidden');
    document.getElementById('stopTtsButton').classList.add('hidden');
}
</script> --}}

{{-- new  script experiment end --}}

                    {{-- ***************working  code start for print ******************* --}}
       
 <script>
function printNews() {
    const title = document.querySelector('h1').innerText;

    // Try multiple image sources
    let imageUrl = '';
    const imageElement = document.querySelector('figure.printable-image img') || 
                        document.querySelector('figure.mb-8 img') || 
                        document.querySelector('figure img') ||
                        document.querySelector('.printable-image img');
    
    if (imageElement) {
        imageUrl = imageElement.src;
    }

    
    const reporterName = `{!! $newsDetail->postByUser->full_name ?? localize('unknown') !!}`;
    const publishDate = `{!! news_publish_date_format($newsDetail->created_at) !!}`;
    const comments = `{{ $newsDetail->comments_count }}`;

    const logoUrl = `{{ asset('assets/trust-news-press.svg') }}`;
    const content = document.getElementById('news-content').innerHTML;

    const printWindow = window.open('', '_blank', 'width=800,height=600');
    printWindow.document.write(`
        <!DOCTYPE html>
        <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="UTF-8">
            <title>${title}</title>
            <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
            <style>
        body { 
    font-family: 'Hind Siliguri', Arial, sans-serif; 
    padding: 15mm; 
    margin: 0;
}
.header { 
    text-align: center; 
    margin-bottom: 10px; 
    border-bottom: 2px solid #333; 
    padding-bottom: 5px;
    line-height: 1;  /* ADD THIS - reduces line spacing */
}
    .wrapper{
     margin-bottom: 2rem;
    }
.logo { 
    max-width: 800px; 
    margin-left:auto;
    margin-right:auto;
    margin-top:10px; 
    display: block; 
    padding: 0;
    margin-bottom: 0;  
}
.meta { 
    font-size:18px;
    text-align: center; 
    font-weight: 500; 
    margin-top: 10px; 
    padding: 0;
    line-height: 1;  
    transform: translateY(-5px);  
}
h1 { 
    text-align: center; 
    margin-bottom: 15px; 
    margin-top: 10px;
}
img { 
    max-width: 100%; 
    height: auto; 
    margin-bottom: 10px; 
    display: block;
}
            </style>
        </head>
        <body>
            <div class="header">
                <img src="${logoUrl}" alt="Logo" class="logo" onerror="this.style.display='none'">
               
                <div class="meta">
                    <span>${reporterName}</span>
                    <span>${publishDate}</span> 
                    
                </div>
                
            </div>
            <h1>${title}</h1>
            ${imageUrl ? `<img src="${imageUrl}" alt="News Image">` : ''}
            <div>${content}</div>
                
            
        </body>
        </html>
    `);

    printWindow.document.close();
    setTimeout(() => {
        printWindow.print();
        setTimeout(() => printWindow.close(), 1000);
    }, 1000);
}
</script>

                   
                    {{--************************ working  code end for print*******************  --}}
                </div>
            </div>



    {{-- download button  code start   --}}
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>



<script>
    // old function working ************************
// function downloadSocialCard() {
    
//     const title = document.querySelector('h1').innerText;
    
//     // Getting the image
//     let imageUrl = '';
//     const imageElement = document.querySelector('figure.printable-image img') || 
//                         document.querySelector('figure.mb-8 img') || 
//                         document.querySelector('figure img') ||
//                         document.querySelector('.printable-image img');
    
//     if (imageElement) {
//         imageUrl = imageElement.src; 
//     }
    
//     const logoUrl = `{{ asset('assets/logo4.png') }}`; 
//     const siteName = `{{ config('app.name', 'News Site') }}`;
//     const websiteUrl = window.location.origin;
    
    
//     const cardContainer = document.createElement('div');
//     cardContainer.style.position = 'fixed';
//     cardContainer.style.left = '-9999px';
//     cardContainer.style.top = '0';
//     document.body.appendChild(cardContainer);
// old function end ******************************************

// new function 
function downloadSocialCard() {
    
    const title = document.querySelector('h1').innerText;
    const newsId = "{{ $newsDetail->id }}"; 
    
    // Getting the image
    let imageUrl = '';
    const imageElement = document.querySelector('figure.printable-image img') || 
                        document.querySelector('figure.mb-8 img') || 
                        document.querySelector('figure img') ||
                        document.querySelector('.printable-image img');
    
    if (imageElement) {
        imageUrl = imageElement.src; 
    }
    
    const logoUrl = `{{ asset('assets/logo4.png') }}`; 
    const siteName = `{{ config('app.name', 'News Site') }}`;
    const websiteUrl = window.location.origin;
    
    
    const cardContainer = document.createElement('div');
    cardContainer.style.position = 'fixed';
    cardContainer.style.left = '-9999px';
    cardContainer.style.top = '0';
    document.body.appendChild(cardContainer);
    
   
// new function end 
    
    // the card HTML
//   cardContainer.innerHTML = `
//     <div id="social-card" style="max-width: 800px; width: 100%;  font-family:'Hind Siliguri', Arial, sans-serif; margin: 0 auto;">
//         <!-- Image Section with Logo Overlay (Black BORDER) -->
//         <div style="position: relative; border: 8px solid #000; overflow: hidden;">
//             <img src="${imageUrl}" style="width: 100%; height: auto; min-height: 250px; max-height: 600px; object-fit: cover; display: block;" crossorigin="anonymous">
            
//             <!-- Logo Overlay (Top Right) -->
//             <div style="position: absolute; top: 10px; right: 10px; z-index: 10;  padding: 8px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
//                 <img src="${logoUrl}" style="width: clamp(80px, 15vw, 150px); height: auto; display: block;" crossorigin="anonymous">
//             </div>
//         </div>
        
//    <!-- Headline + Comment Section  -->
// <div style="background: #003366; padding: clamp(15px, 4vw, 30px) clamp(15px, 4vw, 30px) clamp(15px, 3vw, 25px); color: white; text-align: center;">
//     <!-- Headline -->
//     <h1 style="font-size: clamp(18px, 4vw, 32px); font-weight: bold; margin: 0 0 clamp(15px, 3vw, 20px) 0; line-height: 1.4; word-wrap: break-word;">
//         ${title.replace(/</g, '&lt;').replace(/>/g, '&gt;')}
//     </h1>
    
//     <!-- Comment Text -->
//     <p style="font-size: clamp(14px, 2.5vw, 20px); margin: 0; font-weight: 500;">
//         >> বিস্তারিত সংবাদ কমেন্ট সেকশনে দেখুন << 
//     </p>
// </div>


// <!-- Social Media Links (BLUE BACKGROUND) -->
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


// <div style="background: #003366; padding: clamp(15px, 3vw, 25px); display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: clamp(15px, 3vw, 40px); margin-top: -1rem;">

//     <!-- Facebook -->
//     <div style="display: flex; align-items: center; gap: 10px; color: white;">
//         <i class="fab fa-facebook-f" style="font-size: clamp(18px, 3vw, 26px);"></i>
//         <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500;">/trustnewspressbd</span>
//     </div>

//     <!-- YouTube -->
//     <div style="display: flex; align-items: center; gap: 10px; color: white;">
//         <i class="fab fa-youtube" style="font-size: clamp(18px, 3vw, 26px);"></i>
//         <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500;">/@trustnews-bd</span>
//     </div>

//     <!-- Website -->
//     <div style="display: flex; align-items: center; gap: 10px; color: white;">
//         <i class="fa-solid fa-globe" style="font-size: clamp(18px, 3vw, 26px);"></i>
//         <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500;">trustnews.press</span>
//     </div>
// </div>

// <!-- Responsive Fix -->
// <style>
//         @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');

//         #social-card {
//           font-family: 'Hind Siliguri', sans-serif !important;
//         }
//       </style>

// `;

// testing code start for any size image 
cardContainer.innerHTML = `
  <div id="social-card" 
    style="max-width: 800px; width: 100%; font-family:'Hind Siliguri', Arial, sans-serif; margin: 0 auto; display: flex; flex-direction: column;">

    <!-- Image Section with Logo Overlay (Black BORDER) -->
    <div style="position: relative; border: 8px solid #000; overflow: hidden; flex-shrink: 0;">
        <img src="${imageUrl}" 
             style="width: 100%; height: auto; max-height: 500px; object-fit: contain; display: block;" 
             crossorigin="anonymous">

        <!-- Logo Overlay (Top Right) -->
        <div style="position: absolute; top: 10px; right: 10px; z-index: 10; padding: 8px; border-radius: 8px; ">
            <img src="${logoUrl}" 
                 style="width: clamp(80px, 15vw, 150px); height: auto; display: block;" 
                 crossorigin="anonymous">
        </div>
    </div>
    
    <!-- Headline + Comment Section -->
    <div style="background: #003366; padding: clamp(15px, 4vw, 30px) clamp(15px, 4vw, 30px) clamp(15px, 3vw, 25px); color: white; text-align: center; flex-shrink: 0;">
       <h1 style="font-size: clamp(16px, 3vw, 26px); font-weight: bold; margin: 0 0 clamp(15px, 3vw, 20px) 0; line-height: 1.4; word-wrap: break-word;">
    
            ${title
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .split(' ')
        .slice(0, 7)
        .join(' ')}${title.split(' ').length > 7 ? '…' : ''}
        </h1>
        <p style="font-size: clamp(14px, 2.5vw, 20px); margin: 0; font-weight: 500; white-space: nowrap;">
            &gt;&gt; বিস্তারিত সংবাদ কমেন্ট সেকশনে দেখুন &lt;&lt;
        </p>
    </div>

    <!-- Social Media Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <div style="background: #003366; padding: clamp(15px, 3vw, 25px); display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: clamp(15px, 3vw, 40px); flex-shrink: 0;">

        <!-- Facebook -->
        <div style="display: flex; align-items: center; gap: 10px; color: white;">
            <i class="fab fa-facebook-f" style="font-size: clamp(18px, 3vw, 26px);"></i>
            <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500;">/trustnewspressbd</span>
        </div>

        <!-- YouTube -->
        <div style="display: flex; align-items: center; gap: 10px; color: white;">
            <i class="fab fa-youtube" style="font-size: clamp(18px, 3vw, 26px);"></i>
            <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500; px-1">/@trustnews-bd</span>
        </div>

        <!-- Website -->
        <div style="display: flex; align-items: center; gap: 10px; color: white;">
            <i class="fa-solid fa-globe" style="font-size: clamp(18px, 3vw, 26px);"></i>
            <span style="font-size: clamp(12px, 2vw, 18px); font-weight: 500;">trustnews.press</span>
        </div>
    </div>

    <!-- Responsive Fix -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');
        #social-card {
          font-family: 'Hind Siliguri', sans-serif !important;
        }
    </style>
  </div>
`;

// testing code end  for any size image.



    

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
            
            
            a.download = `${newsId}.png`;

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
            <div class="dark:text-white mt-6">
                
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
                   
                   




{{-- old woking  code  for news details image  original********************************************** --}}

         
  {{-- @php
    $defaultImage = asset('assets/news-details-view.png');
    $largeImage   = $newsDetail->photoLibrary->large_image ?? null;
    

    if ($largeImage) {
        
        $imagePath = ltrim(str_replace(['public/', 'storage/'], '', $largeImage), '/');

       
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
</figure>  --}}


 {{-- old working code for news details image end  original end   --}}

 {{-- new code testing one start  --}}
@php
    $defaultImage = asset('assets/news-details-view.png');
    $largeImage   = $newsDetail->photoLibrary->large_image ?? null;

    if ($largeImage) {
        $imagePath = ltrim(str_replace(['public/', 'storage/'], '', $largeImage), '/');
        if (!\Illuminate\Support\Str::startsWith($imagePath, 'uploads/photo-library')) {
            $imagePath = 'uploads/photo-library/' . $imagePath;
        }
        $src = asset($imagePath);
    } else {
        $src = $defaultImage;
    }

    $headline = $newsDetail->title ?? '';
    $headlineWords = explode(' ', strip_tags($headline));
    $shortHeadline = implode(' ', array_slice($headlineWords, 0, 6));
    if (count($headlineWords) > 6) {
        $shortHeadline .= '…';
    }
@endphp

<figure class="mb-8 relative w-full max-h-[550px] overflow-hidden border-8 border-black bg-gray-200">
 
    <div class="absolute inset-0 bg-yellow-100 opacity-20 z-0"></div>
    
    <img class="w-full h-auto max-h-[550px] object-contain block relative z-1" 
         src="{{ $src }}" 
         alt="{{ $newsDetail->image_alt ?? 'News Image' }}">

   
    <div class="absolute top-3 right-3 z-20">
        <img src="{{ asset('assets/logo4.png') }}" 
             alt="Logo" 
             class="w-[100px] md:w-[140px] h-auto">
    </div>


    <div class="absolute bottom-0 left-0 w-full bg-blue-900 px-4 py-3 text-white text-center z-10">
    <h1 class="text-lg md:text-2xl font-bold leading-snug">
        {{ $shortHeadline }}
    </h1>
</div>
</figure>

<figcaption class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic text-center">
    {{ $newsDetail->image_title }}
</figcaption>

         {{-- new code testing one end  --}}


                

                <div id="news-content" class="text-base prose-content" style="margin-top:1rem">
                    
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
