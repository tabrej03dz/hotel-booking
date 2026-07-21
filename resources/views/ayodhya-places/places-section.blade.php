<section id="places" class="py-20 md:py-28">
    <div class="ayodhya-container">

        <div class="mx-auto max-w-3xl text-center ayodhya-reveal">
            <div class="mx-auto ayodhya-title-line"></div>

            <p class="mt-4 font-semibold uppercase tracking-[.2em] text-[#8B4513]">
                Top Attractions
            </p>

            <h2 class="mt-3 text-4xl font-bold text-[#1a1a2e] md:text-5xl">
                Places to explore in Ayodhya
            </h2>

            <p class="mt-5 leading-7 text-gray-600">
                Discover Ayodhya's most loved temples, ghats and heritage landmarks.
            </p>
        </div>

        @if ($places->isNotEmpty())

            <div id="ayodhyaPlacesGrid"
                 class="mt-14 grid gap-7 sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($places as $place)
                    <a href="{{ route('ayodhya.places.show', $place) }}"
                       class="ayodhya-place-card ayodhya-card group block overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm ayodhya-reveal"
                       aria-label="View details of {{ $place->name }}"
                       data-place-index="{{ $loop->index }}">

                        <article class="h-full">

                            <div class="ayodhya-image-zoom relative h-56 overflow-hidden bg-gray-100">

                              <img src="{{ $place->image_url }}"
                                alt="{{ $place->name }}"
                                loading="lazy"
                                class="h-full w-full object-cover"
                                onerror="this.onerror=null; this.src='{{ asset('asset/images/no-image.png') }}';">
                                    

                                @if ($place->category)
                                    <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#8B4513] backdrop-blur">
                                        {{ $place->category }}
                                    </span>
                                @endif

                                <div class="absolute inset-0 flex items-center justify-center bg-black/35 opacity-0 transition duration-300 group-hover:opacity-100">
                                    <span class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-[#8B4513]">
                                        View Details →
                                    </span>
                                </div>

                            </div>

                            <div class="p-5">

                                <h3 class="text-xl font-bold text-[#1a1a2e] transition group-hover:text-[#8B4513]">
                                    {{ $place->name }}
                                </h3>

                                @if ($place->short_description)
                                    <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600">
                                        {{ $place->short_description }}
                                    </p>
                                @endif

                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#8B4513]">
                                    Explore place

                                    <span class="transition-transform group-hover:translate-x-1">
                                        →
                                    </span>
                                </span>

                            </div>
                        </article>
                    </a>
                @endforeach

            </div>

            @if ($places->count() > 8)
                <div class="mt-12 text-center">

                    <button type="button"
                            id="loadMorePlacesButton"
                            class="inline-flex items-center justify-center gap-3 rounded-xl bg-[#8B4513] px-8 py-3.5 font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-[#6B3410] hover:shadow-xl">

                        <span id="loadMorePlacesText">
                            Load More
                        </span>

                        <svg id="loadMorePlacesIcon"
                             class="h-5 w-5 transition-transform duration-300"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>

                    </button>

                    <p id="placesCountText"
                       class="mt-3 text-sm text-gray-500">
                    </p>

                </div>
            @endif

        @else
            <div class="mt-14 rounded-2xl border border-dashed border-[#8B4513]/30 bg-[#fff8ec] p-10 text-center text-gray-600">
                No attractions have been added yet.
            </div>
        @endif

    </div>

    
</section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = Array.from(
                document.querySelectorAll('.ayodhya-place-card')
            );

            const loadMoreButton = document.getElementById(
                'loadMorePlacesButton'
            );

            const placesCountText = document.getElementById(
                'placesCountText'
            );

            const initialVisibleCount = 8;
            const loadPerClick = 4;

            let visibleCount = initialVisibleCount;

            if (!cards.length) {
                return;
            }

            function updatePlaces() {
                cards.forEach(function (card, index) {
                    if (index < visibleCount) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });

                const shownCount = Math.min(
                    visibleCount,
                    cards.length
                );

                if (placesCountText) {
                    placesCountText.textContent =
                        'Showing ' +
                        shownCount +
                        ' of ' +
                        cards.length +
                        ' places';
                }

                if (
                    loadMoreButton &&
                    visibleCount >= cards.length
                ) {
                    loadMoreButton.classList.add('hidden');
                }
            }

            updatePlaces();

            loadMoreButton?.addEventListener('click', function () {
                visibleCount += loadPerClick;

                updatePlaces();

                const firstNewCardIndex =
                    visibleCount - loadPerClick;

                const firstNewCard =
                    cards[firstNewCardIndex];

                if (firstNewCard) {
                    setTimeout(function () {
                        firstNewCard.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }, 100);
                }
            });
        });
    </script>


