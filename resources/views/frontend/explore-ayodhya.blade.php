@extends('component.main')

@section('content')
    @php
        /*
         |--------------------------------------------------------------------------
         | Ayodhya Images
         |--------------------------------------------------------------------------
         | These are direct public image URLs from the Uttar Pradesh Tourism website.
         | Later, you can download them into public/asset/images/ayodhya and replace
         | these URLs with asset() paths if you want all images hosted locally.
         */
        $ayodhyaImages = [
            'hero' => 'https://uptourism.gov.in/downloadmedia/PageGallary/PG_202401161030549074.jpg',
            'lord_ram' => 'https://uptourism.gov.in/downloadmedia/siteContent/Year_2024/202401241658434109lord-ram-ayodhya.jpg',
            'ram_mandir' => 'https://uptourism.gov.in/downloadmedia/siteContent/Year_2024/202401241609363984ram-mandir.jpg',
            'video_poster' => 'https://uptourism.gov.in/images/Ayodhya_video_poster.jpg',
        ];
    @endphp
    <style>
        :root {
            --ayodhya-primary: #8B4513;
            --ayodhya-primary-dark: #60300d;
            --ayodhya-gold: #D4A017;
            --ayodhya-cream: #fff8ec;
            --ayodhya-dark: #17120f;
        }

        .ayodhya-page {
            color: #29211d;
        }

        .ayodhya-container {
            width: min(1180px, calc(100% - 32px));
            margin-inline: auto;
        }

        .ayodhya-title-line {
            width: 72px;
            height: 3px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--ayodhya-primary), var(--ayodhya-gold));
        }

        .ayodhya-card {
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }

        .ayodhya-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 24px 55px rgba(80, 43, 16, .15);
            border-color: rgba(139, 69, 19, .28);
        }

        .ayodhya-image-zoom img {
            transition: transform .65s ease;
        }

        .ayodhya-image-zoom:hover img {
            transform: scale(1.07);
        }

        .ayodhya-tab-button {
            transition: all .25s ease;
        }

        .ayodhya-tab-button.active {
            color: #fff;
            background: linear-gradient(135deg, var(--ayodhya-primary), var(--ayodhya-gold));
            border-color: transparent;
            box-shadow: 0 12px 30px rgba(139, 69, 19, .24);
        }

        .ayodhya-tab-panel {
            display: none;
            animation: ayodhyaFade .4s ease;
        }

        .ayodhya-tab-panel.active {
            display: block;
        }

        @keyframes ayodhyaFade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ayodhya-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .8s ease, transform .8s ease;
        }

        .ayodhya-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .ayodhya-pattern {
            background-image:
                radial-gradient(circle at 20% 20%, rgba(212, 160, 23, .13) 0, transparent 30%),
                radial-gradient(circle at 80% 75%, rgba(139, 69, 19, .16) 0, transparent 31%);
        }

        @media (max-width: 767px) {
            .ayodhya-container {
                width: min(100% - 24px, 1180px);
            }
        }
    </style>

    <div class="ayodhya-page bg-[#fffdf9]">
        {{-- HERO BANNER --}}
        <section class="relative min-h-[72vh] md:min-h-[82vh] flex items-end overflow-hidden">
            <img src="{{ $ayodhyaImages['hero'] }}"
                alt="Ayodhya Dham"
                class="absolute inset-0 h-full w-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/55 to-black/20"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/20"></div>

            <div class="ayodhya-container relative z-10 pb-16 pt-36 md:pb-24">
                <div class="max-w-3xl text-white ayodhya-reveal">
                    <div class="mb-5 inline-flex items-center gap-3 rounded-full border border-white/25 bg-white/10 px-4 py-2 text-sm backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#D4A017]"></span>
                        Discover the Spiritual Heart of India
                    </div>

                    <h1 class="text-5xl font-bold leading-tight sm:text-6xl md:text-7xl">
                        Explore
                        <span class="block text-[#f3c55b]">Ayodhya Dham</span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/85 md:text-xl">
                        Walk through sacred temples, timeless ghats, cultural landmarks and the divine stories of Lord Shri Ram.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#places"
                            class="rounded-xl bg-[#8B4513] px-7 py-3.5 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-[#6B3410]">
                            Explore Places
                        </a>
                        <a href="#reach"
                            class="rounded-xl border border-white/60 bg-white/10 px-7 py-3.5 font-semibold text-white backdrop-blur-md transition hover:bg-white hover:text-[#1a1a2e]">
                            Plan Your Visit
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- BREADCRUMB --}}
        <div class="border-b border-[#8B4513]/10 bg-white">
            <div class="ayodhya-container flex flex-wrap items-center gap-2 py-4 text-sm text-gray-500">
                <a href="{{ url('/') }}" class="transition hover:text-[#8B4513]">Home</a>
                <span>/</span>
                <span>Destination</span>
                <span>/</span>
                <span class="font-semibold text-[#8B4513]">Explore Ayodhya</span>
            </div>
        </div>

        {{-- INTRODUCTION --}}
        <section class="relative overflow-hidden py-20 md:py-28">
            <div class="absolute -left-20 top-20 h-64 w-64 rounded-full bg-[#D4A017]/10 blur-3xl"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-[#8B4513]/10 blur-3xl"></div>

            <div class="ayodhya-container relative grid items-center gap-14 lg:grid-cols-2">
                <div class="relative ayodhya-reveal">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-8 overflow-hidden rounded-[28px] shadow-2xl ayodhya-image-zoom">
                            <img src="{{ $ayodhyaImages['ram_mandir'] }}"
                                alt="Shri Ram Mandir Ayodhya"
                                class="h-[430px] w-full object-cover">
                        </div>
                        <div class="col-span-4 flex flex-col gap-4 pt-12">
                            <div class="overflow-hidden rounded-[24px] shadow-xl ayodhya-image-zoom">
                                <img src="{{ $ayodhyaImages['hero'] }}"
                                    alt="Saryu Ghat"
                                    class="h-44 w-full object-cover">
                            </div>
                            <div class="overflow-hidden rounded-[24px] shadow-xl ayodhya-image-zoom">
                                <img src="{{ $ayodhyaImages['lord_ram'] }}"
                                    alt="Hanuman Garhi"
                                    class="h-52 w-full object-cover">
                            </div>
                        </div>
                    </div>

                    <div class="absolute -bottom-7 left-6 rounded-2xl border border-[#8B4513]/10 bg-white px-6 py-5 shadow-xl sm:left-12">
                        <p class="text-3xl font-bold text-[#8B4513]">Saptapuri</p>
                        <p class="mt-1 text-sm text-gray-500">One of India's seven sacred cities</p>
                    </div>
                </div>

                <div class="ayodhya-reveal">
                    <div class="flex items-center gap-4">
                        <div class="ayodhya-title-line"></div>
                        <span class="font-semibold uppercase tracking-[.2em] text-[#8B4513]">About Ayodhya</span>
                    </div>

                    <h2 class="mt-5 text-4xl font-bold leading-tight text-[#1a1a2e] md:text-5xl">
                        A city where history, faith and culture meet
                    </h2>

                    <div class="mt-7 space-y-5 text-base leading-8 text-gray-600 md:text-lg">
                        <p>
                            Ayodhya, situated on the banks of the sacred River Saryu, is revered as the birthplace of
                            Maryada Purushottam Lord Shri Ram. The ancient city was once the glorious capital of Kosala
                            and remains deeply connected with the Ramayana and Shri Ramcharitmanas.
                        </p>
                        <p>
                            From magnificent temples and peaceful ghats to spiritual ceremonies and traditional markets,
                            Ayodhya welcomes pilgrims, history lovers, families and travellers from around the world.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-[#8B4513]/10 bg-white p-5 shadow-sm">
                            <p class="text-sm text-gray-500">Best time to visit</p>
                            <p class="mt-1 font-bold text-[#1a1a2e]">October to March</p>
                        </div>
                        <div class="rounded-2xl border border-[#8B4513]/10 bg-white p-5 shadow-sm">
                            <p class="text-sm text-gray-500">Ideal trip duration</p>
                            <p class="mt-1 font-bold text-[#1a1a2e]">2 to 3 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- QUICK HIGHLIGHTS --}}
        <section class="bg-[#1a1a2e] py-12 text-white">
            <div class="ayodhya-container grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center ayodhya-reveal">
                    <div class="text-3xl font-bold text-[#f3c55b] md:text-4xl">15+</div>
                    <div class="mt-2 text-sm text-white/65">Sacred Places</div>
                </div>
                <div class="text-center ayodhya-reveal">
                    <div class="text-3xl font-bold text-[#f3c55b] md:text-4xl">2–3</div>
                    <div class="mt-2 text-sm text-white/65">Days Recommended</div>
                </div>
                <div class="text-center ayodhya-reveal">
                    <div class="text-3xl font-bold text-[#f3c55b] md:text-4xl">24/7</div>
                    <div class="mt-2 text-sm text-white/65">Spiritual Experience</div>
                </div>
                <div class="text-center ayodhya-reveal">
                    <div class="text-3xl font-bold text-[#f3c55b] md:text-4xl">Saryu</div>
                    <div class="mt-2 text-sm text-white/65">Sacred River</div>
                </div>
            </div>
        </section>

        {{-- PLACES TO EXPLORE --}}
        {{-- <section id="places" class="py-20 md:py-28">
            <div class="ayodhya-container">
                <div class="mx-auto max-w-3xl text-center ayodhya-reveal">
                    <div class="mx-auto ayodhya-title-line"></div>
                    <p class="mt-4 font-semibold uppercase tracking-[.2em] text-[#8B4513]">Top Attractions</p>
                    <h2 class="mt-3 text-4xl font-bold text-[#1a1a2e] md:text-5xl">Places to explore in Ayodhya</h2>
                    <p class="mt-5 leading-7 text-gray-600">
                        Discover Ayodhya's most loved temples, ghats and heritage landmarks.
                    </p>
                </div>

                @php
                    $places = [
                        [
                            'name' => 'Shri Ram Janmabhoomi Mandir',
                            'image' => $ayodhyaImages['ram_mandir'],
                            'text' => 'The grand temple dedicated to Lord Shri Ram and the spiritual centre of Ayodhya.',
                            'tag' => 'Temple',
                        ],
                        [
                            'name' => 'Hanuman Garhi',
                            'image' => $ayodhyaImages['lord_ram'],
                            'text' => 'A revered hilltop temple dedicated to Lord Hanuman, located in the heart of the city.',
                            'tag' => 'Sacred Site',
                        ],
                        [
                            'name' => 'Ram Ki Paidi',
                            'image' => $ayodhyaImages['hero'],
                            'text' => 'A beautiful series of ghats along the Saryu, famous for evening lights and holy bathing.',
                            'tag' => 'Ghat',
                        ],
                        [
                            'name' => 'Kanak Bhawan',
                            'image' => $ayodhyaImages['lord_ram'],
                            'text' => 'An ornate palace temple known for the beautiful idols of Lord Ram and Goddess Sita.',
                            'tag' => 'Heritage',
                        ],
                        [
                            'name' => 'Saryu River & Aarti',
                            'image' => $ayodhyaImages['hero'],
                            'text' => 'Experience the calm riverfront and the devotional atmosphere of the evening Saryu Aarti.',
                            'tag' => 'Experience',
                        ],
                        [
                            'name' => 'Nageshwarnath Temple',
                            'image' => $ayodhyaImages['ram_mandir'],
                            'text' => 'An ancient Shiva temple associated with Kush, the son of Lord Shri Ram.',
                            'tag' => 'Temple',
                        ],
                        [
                            'name' => 'Tulsi Smarak Bhawan',
                            'image' => $ayodhyaImages['lord_ram'],
                            'text' => 'A cultural centre dedicated to Goswami Tulsidas, with exhibits and Ramayana programmes.',
                            'tag' => 'Museum',
                        ],
                        [
                            'name' => 'Guptar Ghat',
                            'image' => $ayodhyaImages['hero'],
                            'text' => 'A peaceful historic ghat on the Saryu, admired for sunset views and spiritual importance.',
                            'tag' => 'Ghat',
                        ],
                    ];
                @endphp

                <div class="mt-14 grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($places as $place)
                        <article class="ayodhya-card overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm ayodhya-reveal">
                            <div class="relative h-56 overflow-hidden ayodhya-image-zoom">
                                <img src="{{ $place['image'] }}"
                                    alt="{{ $place['name'] }}"
                                    class="h-full w-full object-cover">
                                <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#8B4513] backdrop-blur">
                                    {{ $place['tag'] }}
                                </span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-[#1a1a2e]">{{ $place['name'] }}</h3>
                                <p class="mt-3 text-sm leading-6 text-gray-600">{{ $place['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section> --}}

        @include('ayodhya-places.places-section', ['places' => $places])

        {{-- VIDEO / THROUGH LENS --}}
        <section class="relative overflow-hidden bg-[#17120f] py-20 text-white md:py-28">
            <div class="absolute inset-0 opacity-25">
                <img src="{{ $ayodhyaImages['hero'] }}"
                    alt="Deepotsav Ayodhya"
                    class="h-full w-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black via-black/90 to-black/55"></div>

            <div class="ayodhya-container relative grid items-center gap-12 lg:grid-cols-2">
                <div class="ayodhya-reveal">
                    <div class="flex items-center gap-4">
                        <div class="ayodhya-title-line"></div>
                        <span class="font-semibold uppercase tracking-[.2em] text-[#f3c55b]">Through the lens</span>
                    </div>
                    <h2 class="mt-5 text-4xl font-bold leading-tight md:text-5xl">Feel the divine energy of Ayodhya</h2>
                    <p class="mt-6 max-w-xl text-lg leading-8 text-white/70">
                        Watch the sacred ghats, temple architecture, festive lights and timeless traditions that make
                        Ayodhya one of India's most unforgettable destinations.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3 text-sm text-white/75">
                        <span class="rounded-full border border-white/15 px-4 py-2">Sacred Temples</span>
                        <span class="rounded-full border border-white/15 px-4 py-2">Saryu Aarti</span>
                        <span class="rounded-full border border-white/15 px-4 py-2">Deepotsav</span>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[28px] border border-white/10 bg-white/5 p-2 shadow-2xl ayodhya-reveal">
                    <video class="aspect-video w-full rounded-[22px] bg-black object-cover"
                        controls
                        preload="metadata"
                        poster="{{ $ayodhyaImages['video_poster'] }}">
                        <source src="{{ asset('asset/video/ayodhya.mp4') }}" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
            </div>
        </section>

        {{-- OVERVIEW TABS --}}
        <section id="reach" class="ayodhya-pattern bg-[#fff8ec] py-20 md:py-28">
            <div class="ayodhya-container">
                <div class="mx-auto max-w-3xl text-center ayodhya-reveal">
                    <div class="mx-auto ayodhya-title-line"></div>
                    <p class="mt-4 font-semibold uppercase tracking-[.2em] text-[#8B4513]">Travel Guide</p>
                    <h2 class="mt-3 text-4xl font-bold text-[#1a1a2e] md:text-5xl">Ayodhya visitor overview</h2>
                </div>

                <div class="mt-12 flex gap-3 overflow-x-auto pb-3 ayodhya-reveal" id="ayodhyaTabs">
                    <button type="button" class="ayodhya-tab-button active whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="reach-panel">
                        How to Reach
                    </button>
                    <button type="button" class="ayodhya-tab-button whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="info-panel">
                        General Info
                    </button>
                    <button type="button" class="ayodhya-tab-button whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="food-panel">
                        Food & Cuisine
                    </button>
                    <button type="button" class="ayodhya-tab-button whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="shopping-panel">
                        Shopping
                    </button>
                    <button type="button" class="ayodhya-tab-button whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="festival-panel">
                        Fairs & Festivals
                    </button>
                    <button type="button" class="ayodhya-tab-button whitespace-nowrap rounded-xl border border-[#8B4513]/15 bg-white px-5 py-3 font-semibold" data-tab="tips-panel">
                        Travel Tips
                    </button>
                </div>

                <div class="mt-6 rounded-[28px] border border-[#8B4513]/10 bg-white p-6 shadow-xl md:p-10 ayodhya-reveal">
                    {{-- HOW TO REACH --}}
                    <div id="reach-panel" class="ayodhya-tab-panel active">
                        <div class="grid gap-6 md:grid-cols-3">
                            <div class="rounded-2xl bg-[#fff8ec] p-6">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#8B4513] text-xl font-bold text-white">✈</div>
                                <h3 class="mt-5 text-xl font-bold text-[#1a1a2e]">By Air</h3>
                                <p class="mt-3 leading-7 text-gray-600">
                                    Maharishi Valmiki International Airport, Ayodhya Dham provides convenient air access.
                                    Travellers may also arrive through Lucknow and continue by road.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-[#fff8ec] p-6">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#8B4513] text-xl font-bold text-white">🚆</div>
                                <h3 class="mt-5 text-xl font-bold text-[#1a1a2e]">By Rail</h3>
                                <p class="mt-3 leading-7 text-gray-600">
                                    Ayodhya Dham Junction and Ayodhya Cantt connect the city with major destinations across
                                    India through regular express and passenger train services.
                                </p>
                            </div>

                            <div class="rounded-2xl bg-[#fff8ec] p-6">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#8B4513] text-xl font-bold text-white">🚌</div>
                                <h3 class="mt-5 text-xl font-bold text-[#1a1a2e]">By Road</h3>
                                <p class="mt-3 leading-7 text-gray-600">
                                    Ayodhya is connected by road with Lucknow, Varanasi, Prayagraj, Gorakhpur and other major
                                    cities. Buses, taxis and private vehicles are readily available.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- GENERAL INFO --}}
                    <div id="info-panel" class="ayodhya-tab-panel">
                        <div class="grid gap-8 lg:grid-cols-2">
                            <div>
                                <h3 class="text-2xl font-bold text-[#1a1a2e]">General information</h3>
                                <div class="mt-6 divide-y divide-gray-100 rounded-2xl border border-gray-100">
                                    <div class="flex justify-between gap-5 p-4">
                                        <span class="text-gray-500">State</span>
                                        <strong class="text-right">Uttar Pradesh</strong>
                                    </div>
                                    <div class="flex justify-between gap-5 p-4">
                                        <span class="text-gray-500">Local Languages</span>
                                        <strong class="text-right">Hindi, Awadhi</strong>
                                    </div>
                                    <div class="flex justify-between gap-5 p-4">
                                        <span class="text-gray-500">Best Season</span>
                                        <strong class="text-right">October to March</strong>
                                    </div>
                                    <div class="flex justify-between gap-5 p-4">
                                        <span class="text-gray-500">Recommended Stay</span>
                                        <strong class="text-right">2 to 3 Days</strong>
                                    </div>
                                    <div class="flex justify-between gap-5 p-4">
                                        <span class="text-gray-500">Main River</span>
                                        <strong class="text-right">Saryu</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-2xl bg-[#1a1a2e] p-7 text-white">
                                <h3 class="text-2xl font-bold">Weather guide</h3>
                                <p class="mt-4 leading-7 text-white/70">
                                    Summers can be hot from April to June. Winters remain pleasant to cool from November to
                                    February. Carry comfortable walking footwear, modest clothing and a light layer in winter.
                                </p>
                                <div class="mt-7 grid grid-cols-2 gap-4">
                                    <div class="rounded-xl bg-white/10 p-4">
                                        <p class="text-sm text-white/60">Summer</p>
                                        <p class="mt-1 text-xl font-bold">April–June</p>
                                    </div>
                                    <div class="rounded-xl bg-white/10 p-4">
                                        <p class="text-sm text-white/60">Winter</p>
                                        <p class="mt-1 text-xl font-bold">Nov–Feb</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FOOD --}}
                    <div id="food-panel" class="ayodhya-tab-panel">
                        <div class="grid items-center gap-10 lg:grid-cols-2">
                            <div class="overflow-hidden rounded-2xl ayodhya-image-zoom">
                                <img src="{{ asset('asset/images/kitchen.jpg') }}"
                                    alt="Ayodhya food and cuisine"
                                    class="h-80 w-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold text-[#1a1a2e]">Simple, sattvik and flavourful</h3>
                                <p class="mt-5 leading-8 text-gray-600">
                                    Ayodhya is known for vegetarian North Indian cuisine and temple-style sattvik meals.
                                    Popular choices include kachori-sabzi, poori, aloo dishes, thali, chaat, jalebi, rabri,
                                    peda and refreshing lassi.
                                </p>
                                <div class="mt-6 flex flex-wrap gap-3">
                                    @foreach (['Kachori Sabzi', 'Sattvik Thali', 'Jalebi', 'Peda', 'Rabri', 'Lassi'] as $food)
                                        <span class="rounded-full bg-[#8B4513]/10 px-4 py-2 text-sm font-semibold text-[#8B4513]">{{ $food }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SHOPPING --}}
                    <div id="shopping-panel" class="ayodhya-tab-panel">
                        <div class="grid items-center gap-10 lg:grid-cols-2">
                            <div>
                                <h3 class="text-3xl font-bold text-[#1a1a2e]">Take home a piece of Ayodhya</h3>
                                <p class="mt-5 leading-8 text-gray-600">
                                    Markets near the temple areas offer devotional items, idols, prayer accessories,
                                    traditional clothes, bangles, copper vessels, framed artwork, wooden handicrafts and
                                    marble statues of deities.
                                </p>
                                <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                                    @foreach (['Ram Darbar idols', 'Brass & copper items', 'Religious books', 'Traditional textiles', 'Local sweets', 'Handcrafted souvenirs'] as $item)
                                        <li class="rounded-xl border border-[#8B4513]/10 bg-[#fff8ec] px-4 py-3 font-medium text-gray-700">✓ {{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="overflow-hidden rounded-2xl ayodhya-image-zoom">
                                <img src="{{ $ayodhyaImages['lord_ram'] }}"
                                    alt="Shopping in Ayodhya"
                                    class="h-80 w-full object-cover">
                            </div>
                        </div>
                    </div>

                    {{-- FESTIVALS --}}
                    <div id="festival-panel" class="ayodhya-tab-panel">
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Festival of Lights</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Deepotsav</h3>
                                <p class="mt-3 leading-7 text-gray-600">Lakhs of diyas, cultural performances, Ramleela and a magnificent Saryu Aarti illuminate the city.</p>
                            </div>
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Birth Celebration</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Ram Navami</h3>
                                <p class="mt-3 leading-7 text-gray-600">A major spiritual celebration marking the birth of Lord Shri Ram with prayers and processions.</p>
                            </div>
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Traditional Fair</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Parikrama Mela</h3>
                                <p class="mt-3 leading-7 text-gray-600">Devotees participate in sacred circumambulation routes and religious gatherings across Ayodhya.</p>
                            </div>
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Monsoon Festival</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Shravan Jhoola Mela</h3>
                                <p class="mt-3 leading-7 text-gray-600">Beautifully decorated swings, devotional songs and temple festivities create a vibrant atmosphere.</p>
                            </div>
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Divine Wedding</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Ram Vivah</h3>
                                <p class="mt-3 leading-7 text-gray-600">The sacred wedding of Lord Ram and Goddess Sita is celebrated with colourful rituals and devotion.</p>
                            </div>
                            <div class="rounded-2xl border border-[#8B4513]/10 p-6">
                                <p class="text-sm font-bold uppercase tracking-wider text-[#8B4513]">Cultural Event</p>
                                <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e]">Ramayan Mela</h3>
                                <p class="mt-3 leading-7 text-gray-600">Performances, discourses and exhibitions celebrate the teachings and cultural legacy of the Ramayana.</p>
                            </div>
                        </div>
                    </div>

                    {{-- TIPS --}}
                    <div id="tips-panel" class="ayodhya-tab-panel">
                        <div class="grid gap-5 md:grid-cols-2">
                            @foreach ([
                                ['Respect temple rules', 'Follow security instructions, dress modestly and keep footwear only at designated counters.'],
                                ['Start early', 'Visit major temples in the morning to avoid crowds and enjoy a calmer experience.'],
                                ['Carry essentials', 'Keep water, ID proof, a small cash amount and comfortable walking shoes.'],
                                ['Plan local transport', 'Use registered e-rickshaws, autos or taxis and confirm fares before starting.'],
                                ['Protect belongings', 'Keep phones, wallets and documents secure in crowded temple and market areas.'],
                                ['Check festival dates', 'During major festivals, book rooms and transport well in advance.'],
                            ] as $tip)
                                <div class="rounded-2xl bg-[#fff8ec] p-5">
                                    <h3 class="font-bold text-[#1a1a2e]">{{ $tip[0] }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-gray-600">{{ $tip[1] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ITINERARY --}}
        <section class="py-20 md:py-28">
            <div class="ayodhya-container grid gap-14 lg:grid-cols-[.9fr_1.1fr]">
                <div class="ayodhya-reveal">
                    <div class="flex items-center gap-4">
                        <div class="ayodhya-title-line"></div>
                        <span class="font-semibold uppercase tracking-[.2em] text-[#8B4513]">Suggested Plan</span>
                    </div>
                    <h2 class="mt-5 text-4xl font-bold leading-tight text-[#1a1a2e] md:text-5xl">A peaceful 2-day Ayodhya itinerary</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Cover the major spiritual sites without rushing and reserve enough time for Saryu Aarti, local food and shopping.
                    </p>
                    <div class="mt-8 overflow-hidden rounded-[26px] ayodhya-image-zoom">
                        <img src="{{ $ayodhyaImages['hero'] }}"
                            alt="Ayodhya city view"
                            class="h-72 w-full object-cover">
                    </div>
                </div>

                <div class="space-y-6 ayodhya-reveal">
                    <div class="rounded-2xl border border-[#8B4513]/10 bg-white p-7 shadow-sm">
                        <div class="flex gap-5">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#8B4513] text-xl font-bold text-white">01</div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#1a1a2e]">Day One – Temples & Saryu Aarti</h3>
                                <p class="mt-3 leading-7 text-gray-600">
                                    Shri Ram Janmabhoomi Mandir → Hanuman Garhi → Kanak Bhawan → Dashrath Mahal → local lunch → Ram Ki Paidi → Saryu Aarti.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-[#8B4513]/10 bg-white p-7 shadow-sm">
                        <div class="flex gap-5">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-[#D4A017] text-xl font-bold text-white">02</div>
                            <div>
                                <h3 class="text-2xl font-bold text-[#1a1a2e]">Day Two – Heritage & Riverside</h3>
                                <p class="mt-3 leading-7 text-gray-600">
                                    Nageshwarnath Temple → Tulsi Smarak Bhawan → Ram Katha Museum → Guptar Ghat → local markets → relaxed dinner at Hotel Krinoscco.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-[#1a1a2e] p-7 text-white">
                        <h3 class="text-xl font-bold">Hotel guest assistance</h3>
                        <p class="mt-3 leading-7 text-white/70">
                            Our team can assist with local travel guidance, cab arrangements, temple visit planning and packed meals, subject to availability.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- STAY CTA --}}
        <section class="px-3 pb-20 md:pb-28">
            <div class="ayodhya-container relative overflow-hidden rounded-[32px] bg-[#8B4513] px-6 py-14 text-white shadow-2xl md:px-14 md:py-16">
                <img src="{{ asset('asset/images/cafe.jpg') }}"
                    alt="Stay near Ayodhya attractions"
                    class="absolute inset-0 h-full w-full object-cover opacity-25">
                <div class="absolute inset-0 bg-gradient-to-r from-[#5e2d0d] via-[#8B4513]/95 to-[#8B4513]/65"></div>

                <div class="relative grid items-center gap-8 lg:grid-cols-[1fr_auto] ayodhya-reveal">
                    <div>
                        <p class="font-semibold uppercase tracking-[.2em] text-[#f7d675]">Stay in comfort</p>
                        <h2 class="mt-3 max-w-3xl text-3xl font-bold leading-tight md:text-5xl">
                            Make Hotel Krinoscco your comfortable base in Ayodhya
                        </h2>
                        <p class="mt-5 max-w-2xl text-lg leading-8 text-white/80">
                            Relax in modern rooms, enjoy warm hospitality and explore Ayodhya's leading attractions with convenient city access.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-4 lg:flex-col">
                        <a href="{{ url('/booking') }}"
                            class="rounded-xl bg-white px-7 py-3.5 text-center font-bold text-[#8B4513] transition hover:-translate-y-1 hover:shadow-xl">
                            Book Your Stay
                        </a>
                        <a href="{{ url('/contact') }}"
                            class="rounded-xl border border-white/50 bg-white/10 px-7 py-3.5 text-center font-bold text-white backdrop-blur transition hover:bg-white hover:text-[#8B4513]">
                            Contact Hotel
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.ayodhya-tab-button');
            const tabPanels = document.querySelectorAll('.ayodhya-tab-panel');

            tabButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const targetId = button.getAttribute('data-tab');

                    tabButtons.forEach(function (item) {
                        item.classList.remove('active');
                    });

                    tabPanels.forEach(function (panel) {
                        panel.classList.remove('active');
                    });

                    button.classList.add('active');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                    }
                });
            });

            const revealItems = document.querySelectorAll('.ayodhya-reveal');

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(function (entries, observerInstance) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observerInstance.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.12
                });

                revealItems.forEach(function (item) {
                    observer.observe(item);
                });
            } else {
                revealItems.forEach(function (item) {
                    item.classList.add('visible');
                });
            }
        });
    </script>
@endsection