@extends('component.main')

@section('content')
<style>
    .place-container {
        width: min(1180px, calc(100% - 32px));
        margin-inline: auto;
    }

    .detail-content h2,
    .detail-content h3,
    .detail-content h4 {
        margin-top: 1.5rem;
        font-weight: 800;
        color: #1a1a2e;
    }

    .detail-content p {
        margin-top: 1rem;
        line-height: 1.9;
        color: #5f6368;
    }

    .detail-content ul {
        margin: 1rem 0;
        padding-left: 1.25rem;
        list-style: disc;
        color: #5f6368;
    }

    .detail-content ol {
        margin: 1rem 0;
        padding-left: 1.25rem;
        list-style: decimal;
        color: #5f6368;
    }

    .detail-content img {
        width: 100%;
        border-radius: 20px;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .place-main-image {
        aspect-ratio: 16 / 9;
    }
</style>

@php
    $fallbackImage = asset('asset/images/no-image.png');

    $placeImage = $place->image_url ?: $fallbackImage;
@endphp

<div class="bg-[#fffdf9]">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[62vh] overflow-hidden">

        <img src="{{ $placeImage }}"
             alt="{{ $place->name }}"
             class="absolute inset-0 h-full w-full object-cover"
             onerror="this.onerror=null; this.src='{{ $fallbackImage }}';">

        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/55 to-black/20"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>

        <div class="place-container relative z-10 flex min-h-[62vh] items-end pb-16 pt-36 text-white md:pb-20">
            <div class="max-w-3xl">

                @if ($place->category)
                    <span class="inline-flex rounded-full border border-white/25 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">
                        {{ $place->category }}
                    </span>
                @endif

                <h1 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl md:text-6xl">
                    {{ $place->name }}
                </h1>

                @if ($place->short_description)
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-white/85">
                        {{ $place->short_description }}
                    </p>
                @endif

            </div>
        </div>
    </section>

    {{-- BREADCRUMB --}}
    <div class="border-b bg-white">
        <div class="place-container flex flex-wrap gap-2 py-4 text-sm text-gray-500">

            <a href="{{ url('/') }}"
               class="transition hover:text-[#8B4513]">
                Home
            </a>

            <span>/</span>

            <a href="{{ route('explore-ayodhya') }}#places"
               class="transition hover:text-[#8B4513]">
                Explore Ayodhya
            </a>

            <span>/</span>

            <span class="font-semibold text-[#8B4513]">
                {{ $place->name }}
            </span>

        </div>
    </div>

    {{-- MAIN DETAIL SECTION --}}
    <section class="py-16 md:py-24">
        <div class="place-container grid gap-10 lg:grid-cols-[1fr_340px]">

            <article class="overflow-hidden rounded-[28px] border border-gray-100 bg-white shadow-sm">

                {{-- MAIN DETAIL IMAGE --}}
                <div class="overflow-hidden bg-gray-100">
                    <img src="{{ $placeImage }}"
                         alt="{{ $place->name }}"
                         class="place-main-image h-full w-full object-cover transition duration-700 hover:scale-105"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='{{ $fallbackImage }}';">
                </div>

                {{-- DETAIL CONTENT --}}
                <div class="p-6 md:p-10">

                    <div class="mb-6 flex flex-wrap items-center gap-3">

                        @if ($place->category)
                            <span class="rounded-full bg-[#8B4513]/10 px-4 py-2 text-xs font-bold uppercase tracking-wider text-[#8B4513]">
                                {{ $place->category }}
                            </span>
                        @endif

                        @if ($place->location)
                            <span class="inline-flex items-center gap-2 text-sm text-gray-500">
                                <svg class="h-4 w-4 text-[#8B4513]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>

                                {{ $place->location }}
                            </span>
                        @endif

                    </div>

                    <h2 class="text-3xl font-bold text-[#1a1a2e] md:text-4xl">
                        About {{ $place->name }}
                    </h2>

                    @if ($place->short_description)
                        <p class="mt-5 border-l-4 border-[#8B4513] pl-5 text-lg leading-8 text-gray-600">
                            {{ $place->short_description }}
                        </p>
                    @endif

                    <div class="detail-content mt-6">
                        {!! $place->description !!}
                    </div>

                </div>
            </article>

            {{-- SIDEBAR --}}
            <aside class="space-y-6">

                {{-- VISITOR INFORMATION --}}
                <div class="rounded-[24px] bg-[#1a1a2e] p-6 text-white shadow-xl lg:sticky lg:top-28">

                    <h3 class="text-2xl font-bold">
                        Visitor Information
                    </h3>

                    <div class="mt-6 space-y-5">

                        @if ($place->location)
                            <div class="flex gap-4 border-b border-white/10 pb-5">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/10">
                                    <svg class="h-5 w-5 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs uppercase tracking-wider text-white/55">
                                        Location
                                    </p>

                                    <p class="mt-1 font-semibold">
                                        {{ $place->location }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($place->timing)
                            <div class="flex gap-4 border-b border-white/10 pb-5">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/10">
                                    <svg class="h-5 w-5 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs uppercase tracking-wider text-white/55">
                                        Timings
                                    </p>

                                    <p class="mt-1 font-semibold">
                                        {{ $place->timing }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($place->entry_fee)
                            <div class="flex gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/10">
                                    <svg class="h-5 w-5 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m4-4h-8m8 0l-3-3m3 3l-3 3"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs uppercase tracking-wider text-white/55">
                                        Entry Fee
                                    </p>

                                    <p class="mt-1 font-semibold">
                                        {{ $place->entry_fee }}
                                    </p>
                                </div>
                            </div>
                        @endif

                    </div>

                    @if ($place->map_url)
                        <a href="{{ $place->map_url }}"
                           target="_blank"
                           rel="noopener"
                           class="mt-7 flex items-center justify-center gap-2 rounded-xl bg-[#8B4513] px-5 py-3 text-center font-semibold transition hover:bg-[#6B3410]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>

                            Open in Google Maps
                        </a>
                    @endif

                </div>

                {{-- HOTEL CTA --}}
                <div class="overflow-hidden rounded-[24px] border border-[#8B4513]/15 bg-[#fff8ec]">

                    <img src="{{ asset('asset/images/cafe.jpg') }}"
                         alt="Hotel Krinoscco Ayodhya"
                         class="h-44 w-full object-cover"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='{{ $fallbackImage }}';">

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#1a1a2e]">
                            Stay near Ayodhya's attractions
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-gray-600">
                            Enjoy a comfortable stay at Hotel Krinoscco while exploring Ayodhya.
                        </p>

                        <a href="{{ url('/#booking') }}"
                           class="mt-5 inline-flex rounded-xl bg-[#8B4513] px-5 py-3 font-semibold text-white transition hover:bg-[#6B3410]">
                            Book Your Stay
                        </a>
                    </div>

                </div>

            </aside>
        </div>
    </section>

    {{-- RELATED PLACES --}}
    @if ($relatedPlaces->isNotEmpty())
        <section class="bg-[#fff8ec] py-16 md:py-20">
            <div class="place-container">

                <div class="flex flex-wrap items-end justify-between gap-4">

                    <div>
                        <p class="font-semibold uppercase tracking-[.2em] text-[#8B4513]">
                            Discover More
                        </p>

                        <h2 class="mt-2 text-3xl font-bold text-[#1a1a2e]">
                            Related Attractions
                        </h2>
                    </div>

                    <a href="{{ route('explore-ayodhya') }}#places"
                       class="font-semibold text-[#8B4513] transition hover:text-[#6B3410]">
                        View all places →
                    </a>

                </div>

                <div class="mt-9 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    @foreach ($relatedPlaces as $related)
                        @php
                            $relatedImage = $related->image_url ?: $fallbackImage;
                        @endphp

                        <a href="{{ route('ayodhya.places.show', $related) }}"
                           class="group overflow-hidden rounded-2xl bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div class="overflow-hidden bg-gray-100">
                                <img src="{{ $relatedImage }}"
                                     alt="{{ $related->name }}"
                                     class="h-48 w-full object-cover transition duration-500 group-hover:scale-105"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='{{ $fallbackImage }}';">
                            </div>

                            <div class="p-5">

                                @if ($related->category)
                                    <p class="text-xs font-bold uppercase tracking-wider text-[#8B4513]">
                                        {{ $related->category }}
                                    </p>
                                @endif

                                <h3 class="mt-2 text-lg font-bold text-[#1a1a2e] transition group-hover:text-[#8B4513]">
                                    {{ $related->name }}
                                </h3>

                                @if ($related->short_description)
                                    <p class="mt-3 line-clamp-2 text-sm leading-6 text-gray-500">
                                        {{ $related->short_description }}
                                    </p>
                                @endif

                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

</div>
@endsection