<!-- What Our Guests Say -->
<section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>

    <div class="container mx-auto px-4 relative z-10 overflow-visible">
        <!-- Section Header -->
        <h2 class="text-5xl font-bold text-white text-center mb-12">
            What Our Guests Say
            <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
        </h2>

        <!-- Wrapper for swiper and buttons -->
        <div class="relative">
            <!-- Swiper Slider -->
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Rahul Sharma</h4>
                        <span class="text-sm text-gray-400">Frequent Traveler</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "Staying here was an amazing experience. The rooms are luxurious, and the staff is
                            incredibly accommodating. Highly recommend!"
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-gray-500"></i>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Priya Kapoor</h4>
                        <span class="text-sm text-gray-400">Luxury Enthusiast</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "The attention to detail in the room design and amenities is exceptional. I felt pampered
                            from the moment I arrived."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Ananya Verma</h4>
                        <span class="text-sm text-gray-400">Luxury Enthusiast</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "The attention to detail in the room design and amenities is exceptional. I felt pampered
                            from the moment I arrived."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Ananya Verma</h4>
                        <span class="text-sm text-gray-400">Luxury Enthusiast</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "The attention to detail in the room design and amenities is exceptional. I felt pampered
                            from the moment I arrived."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>

            <!-- Navigation Arrows (inside relative wrapper so they show on all devices) -->
            <div class="custom-button-prev">
                <span class="text-white material-icons">arrow_back_ios</span>
            </div>
            <div class="custom-button-next">
                <span class="text-white material-icons">arrow_forward_ios</span>
            </div>
        </div>
    </div>
</section>

<!-- Required CSS and Fonts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    .custom-button-prev,
    .custom-button-next {
        width: 60px;
        height: 60px;
        background: linear-gradient(45deg, #8B4513, #D4A017);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        opacity: 0.9;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 50;
        cursor: pointer;
    }

    .custom-button-prev:hover,
    .custom-button-next:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        opacity: 1;
    }

    /* Desktop Position */
    .custom-button-prev {
        left: -70px;
    }

    .custom-button-next {
        right: -70px;
    }

    /* Mobile Override */
    @media (max-width: 768px) {

        .custom-button-prev,
        .custom-button-next {
            width: 50px;
            height: 50px;
            top: 60%;
            /* Lower position for better view */
        }

        .custom-button-prev {
            left: 10px;
        }

        .custom-button-next {
            right: 10px;
        }

        .custom-button-prev .material-icons,
        .custom-button-next .material-icons {
            font-size: 24px;
        }
    }

    /* Swiper Pagination Custom Style */
    .swiper-pagination-bullet {
        background-color: #8B4513;
        opacity: 0.5;
        width: 12px;
        height: 12px;
    }

    .swiper-pagination-bullet-active {
        background-color: #D4A017;
        opacity: 1;
    }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 5000
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.custom-button-next',
            prevEl: '.custom-button-prev'
        },
        breakpoints: {
            640: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
        }
    });
</script>
