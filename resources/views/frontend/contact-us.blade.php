@extends('component.main')

@section('content')
    <style>
        .contact-container {
            width: min(1180px, calc(100% - 32px));
            margin-inline: auto;
        }

        .contact-card {
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
            border-color: rgba(139, 69, 19, 0.22);
        }

        .contact-input {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            padding: 13px 15px;
            background: #fff;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .contact-input:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 0 4px rgba(139, 69, 19, 0.1);
        }
    </style>

    {{-- HERO SECTION --}}
    <section class="relative min-h-[430px] overflow-hidden bg-[#1a1a2e]">

        <img src="{{ asset('asset/images/ayodhya/ayodhya-hero.jpg') }}"
             alt="Contact Hotel Krinoscco Ayodhya"
             class="absolute inset-0 h-full w-full object-cover"
             onerror="this.onerror=null; this.style.display='none';">

        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/65 to-black/35"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20"></div>

        <div class="contact-container relative z-10 flex min-h-[430px] items-center justify-center py-28 text-center text-white">

            <div class="max-w-3xl">
                <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-5 py-2 text-sm font-semibold uppercase tracking-[0.2em] backdrop-blur">
                    Hotel Krinoscco
                </span>

                <h1 class="mt-6 text-4xl font-extrabold leading-tight sm:text-5xl md:text-6xl">
                    Contact Us
                </h1>

                <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                    Have a question about rooms, bookings or your stay in Ayodhya?
                    Our team is always ready to assist you.
                </p>

                <div class="mx-auto mt-7 h-1 w-24 rounded-full bg-gradient-to-r from-[#8B4513] to-[#D4A017]"></div>
            </div>

        </div>
    </section>

    {{-- BREADCRUMB --}}
    <div class="border-b bg-white">
        <div class="contact-container flex flex-wrap items-center gap-2 py-4 text-sm text-gray-500">
            <a href="{{ url('/') }}"
               class="transition hover:text-[#8B4513]">
                Home
            </a>

            <span>/</span>

            <span class="font-semibold text-[#8B4513]">
                Contact Us
            </span>
        </div>
    </div>

    {{-- CONTACT SECTION --}}
    <section class="relative overflow-hidden bg-[#fffdf9] py-16 md:py-24">

        <div class="absolute -left-32 top-10 h-96 w-96 rounded-full bg-[#D4A017]/10 blur-3xl"></div>
        <div class="absolute -right-32 bottom-10 h-96 w-96 rounded-full bg-[#8B4513]/10 blur-3xl"></div>

        <div class="contact-container relative z-10">

            {{-- Section heading --}}
            <div class="mx-auto mb-14 max-w-3xl text-center">
                <p class="font-semibold uppercase tracking-[0.2em] text-[#8B4513]">
                    Get in Touch
                </p>

                <h2 class="mt-3 text-3xl font-extrabold text-[#1a1a2e] sm:text-4xl md:text-5xl">
                    We are here to help
                </h2>

                <p class="mx-auto mt-5 max-w-2xl leading-7 text-gray-600">
                    Contact us for reservations, hotel information, travel assistance
                    or any other enquiry related to your stay.
                </p>
            </div>

            {{-- Success message --}}
            @if (session('success'))
                <div class="mb-8 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800 shadow-sm">
                    <svg class="mt-0.5 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                    <div>
                        <p class="font-semibold">Message sent successfully</p>
                        <p class="mt-1 text-sm">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif

            {{-- Error message --}}
            @if (session('error'))
                <div class="mb-8 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 shadow-sm">
                    <svg class="mt-0.5 h-6 w-6 shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                    <div>
                        <p class="font-semibold">Unable to send message</p>
                        <p class="mt-1 text-sm">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">

                {{-- LEFT CONTACT INFORMATION --}}
                <div class="space-y-6">

                    <div class="rounded-[28px] bg-[#1a1a2e] p-7 text-white shadow-xl md:p-9">

                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#D4A017]">
                            Hotel Information
                        </p>

                        <h3 class="mt-3 text-3xl font-bold">
                            Contact Hotel Krinoscco
                        </h3>

                        <p class="mt-4 leading-7 text-white/70">
                            Our team will help you with bookings, hotel facilities,
                            directions and your stay in Ayodhya.
                        </p>

                        <div class="mt-8 space-y-6">

                            {{-- Registered Address --}}
                            <div class="flex gap-4 border-b border-white/10 pb-6">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                    <svg class="h-6 w-6 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 10l9-7 9 7v9a2 2 0 01-2 2h-4v-7H9v7H5a2 2 0 01-2-2v-9z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wider text-white/50">
                                        Registered Address
                                    </p>

                                    <p class="mt-2 leading-7 text-white/90">
                                        309, Amaniganj, Faizabad, Uttar Pradesh – 224001
                                    </p>
                                </div>
                            </div>

                            {{-- Hotel Address --}}
                            <div class="flex gap-4 border-b border-white/10 pb-6">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                    <svg class="h-6 w-6 text-[#D4A017]"
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
                                    <p class="text-xs font-semibold uppercase tracking-wider text-white/50">
                                        Hotel Address
                                    </p>

                                    <a href="https://www.google.com/maps?ll=26.783073,82.165321&z=16&t=m&hl=en&gl=IN&mapclient=embed&cid=18420098021593240393"
                                       target="_blank"
                                       rel="noopener"
                                       class="mt-2 block leading-7 text-white/90 transition hover:text-[#D4A017]">

                                        Hotel Krinoscco, Ram Path, Amaniganj,
                                        Ayodhya, Uttar Pradesh – 224001
                                    </a>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="flex gap-4 border-b border-white/10 pb-6">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                    <svg class="h-6 w-6 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wider text-white/50">
                                        Email Address
                                    </p>

                                    <a href="mailto:info@krinoscco.com"
                                       class="mt-2 block text-white/90 transition hover:text-[#D4A017]">
                                        info@krinoscco.com
                                    </a>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="flex gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/10">
                                    <svg class="h-6 w-6 text-[#D4A017]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11.04 11.04 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z"/>
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wider text-white/50">
                                        Contact Numbers
                                    </p>

                                    <div class="mt-2 space-y-1">
                                        <a href="tel:+917275002525"
                                           class="block text-white/90 transition hover:text-[#D4A017]">
                                            +91 72750 02525
                                        </a>

                                        <a href="tel:+917275092525"
                                           class="block text-white/90 transition hover:text-[#D4A017]">
                                            +91 72750 92525
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Quick action buttons --}}
                    <div class="grid gap-4 sm:grid-cols-2">

                        <a href="tel:+917275002525"
                           class="contact-card flex items-center justify-center gap-3 rounded-2xl border border-gray-100 bg-white px-5 py-4 font-semibold text-[#1a1a2e] shadow-sm">

                            <svg class="h-5 w-5 text-[#8B4513]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11.04 11.04 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z"/>
                            </svg>

                            Call Now
                        </a>

                        <a href="mailto:info@krinoscco.com"
                           class="contact-card flex items-center justify-center gap-3 rounded-2xl border border-gray-100 bg-white px-5 py-4 font-semibold text-[#1a1a2e] shadow-sm">

                            <svg class="h-5 w-5 text-[#8B4513]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>

                            Send Email
                        </a>

                    </div>
                </div>

                {{-- CONTACT FORM --}}
                <div class="rounded-[28px] border border-gray-100 bg-white p-6 shadow-xl sm:p-8 md:p-10">

                    <div class="mb-8">
                        <p class="font-semibold uppercase tracking-[0.18em] text-[#8B4513]">
                            Send a Message
                        </p>

                        <h3 class="mt-2 text-3xl font-bold text-[#1a1a2e]">
                            How can we help you?
                        </h3>

                        <p class="mt-3 leading-7 text-gray-600">
                            Fill in the form and our team will contact you shortly.
                        </p>
                    </div>

                    <form id="contactForm"
                          action="{{ route('contact.save') }}"
                          method="POST"
                          class="space-y-6">

                        @csrf

                        <div class="grid gap-6 sm:grid-cols-2">

                            {{-- Name --}}
                            <div>
                                <label for="name"
                                       class="mb-2 block text-sm font-semibold text-gray-700">
                                    Your Name <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       id="name"
                                       required
                                       value="{{ old('name') }}"
                                       placeholder="Enter your full name"
                                       class="contact-input">

                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email"
                                       class="mb-2 block text-sm font-semibold text-gray-700">
                                    Email Address <span class="text-red-500">*</span>
                                </label>

                                <input type="email"
                                       name="email"
                                       id="email"
                                       required
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email"
                                       class="contact-input">

                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone"
                                   class="mb-2 block text-sm font-semibold text-gray-700">
                                Mobile Number <span class="text-red-500">*</span>
                            </label>

                            <input type="tel"
                                   name="phone"
                                   id="phone"
                                   required
                                   maxlength="15"
                                   inputmode="numeric"
                                   value="{{ old('phone') }}"
                                   placeholder="+91 98765 43210"
                                   class="contact-input">

                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label for="message"
                                   class="mb-2 block text-sm font-semibold text-gray-700">
                                Message <span class="text-red-500">*</span>
                            </label>

                            <textarea name="message"
                                      id="message"
                                      rows="6"
                                      required
                                      placeholder="Write your enquiry here..."
                                      class="contact-input resize-none">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit"
                                id="contactSubmitButton"
                                class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#8B4513] to-[#D4A017] px-6 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-0.5 hover:shadow-xl disabled:cursor-not-allowed disabled:opacity-60">

                            <svg id="contactSpinner"
                                 class="hidden h-5 w-5 animate-spin"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24">

                                <circle class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"></circle>

                                <path class="opacity-75"
                                      fill="currentColor"
                                      d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>

                            <span id="contactSubmitText">
                                Send Message
                            </span>

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>

                    </form>
                </div>

            </div>

            {{-- GOOGLE MAP --}}
            <div class="mt-16 overflow-hidden rounded-[28px] border border-gray-100 bg-white shadow-xl">

                <div class="flex flex-col gap-4 border-b border-gray-100 p-6 sm:flex-row sm:items-center sm:justify-between md:p-8">

                    <div>
                        <p class="font-semibold uppercase tracking-[0.18em] text-[#8B4513]">
                            Our Location
                        </p>

                        <h3 class="mt-2 text-2xl font-bold text-[#1a1a2e] md:text-3xl">
                            Find Hotel Krinoscco on the map
                        </h3>

                        <p class="mt-2 text-gray-600">
                            Ram Path, Amaniganj, Ayodhya, Uttar Pradesh – 224001
                        </p>
                    </div>

                    <a href="https://www.google.com/maps?ll=26.783073,82.165321&z=16&t=m&hl=en&gl=IN&mapclient=embed&cid=18420098021593240393"
                       target="_blank"
                       rel="noopener"
                       class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-[#8B4513] px-5 py-3 font-semibold text-white transition hover:bg-[#6B3410]">

                        Open in Google Maps

                        <svg class="h-5 w-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14 3h7m0 0v7m0-7L10 14M5 5h5M5 5a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5"/>
                        </svg>
                    </a>

                </div>

                <div class="h-[360px] w-full md:h-[480px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.786563827908!2d82.162745675435!3d26.78307267672456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a0796e56fb899%3A0xffa1558e88f0d349!2sHotel%20Krinoscco!5e0!3m2!1sen!2sin!4v1739181698814!5m2!1sen!2sin"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Hotel Krinoscco Google Map">
                    </iframe>
                </div>

            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contactForm');
            const button = document.getElementById('contactSubmitButton');
            const buttonText = document.getElementById('contactSubmitText');
            const spinner = document.getElementById('contactSpinner');
            const phoneInput = document.getElementById('phone');

            phoneInput?.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9+\s-]/g, '');
            });

            form?.addEventListener('submit', function () {
                button.disabled = true;
                spinner.classList.remove('hidden');
                buttonText.textContent = 'Sending...';
            });
        });
    </script>
@endsection