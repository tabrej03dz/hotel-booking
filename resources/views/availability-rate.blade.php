{{-- <x-app-layout> --}}
{{--    <x-slot name="header"> --}}
{{--        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg"> --}}
{{--            <h2 class="font-bold text-2xl text-gray-800"> --}}
{{--                {{ __('Payments') }} --}}
{{--            </h2> --}}
{{--        </div> --}}
{{--    </x-slot> --}}

{{-- <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">💰 Availabilities & Rates</h2>

                <div class="overflow-x-auto">

                    <!-- resources/views/calendar/index.blade.php -->

                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-2 border">
                                <form action="{{route('availability-rate.index')}}" method="get">
                                    <input type="month" name="month" value="{{$month}}" onchange="this.form.submit()">
                                </form>
                            </th>
                            @foreach ($dates as $date)
                                <th class="p-2 border">{{ \Carbon\Carbon::parse($date)->format('D d M') }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roomTypes as $roomType)
                            <tr class="border">
                                <td class="p-2 border font-semibold">
                                    <p>{{ $roomType->name }}</p><br>
                                    <p>INR</p>
                                </td>
                                @foreach ($dates as $date)
                                    @php
                                        $record = \App\Models\AvailabilityRate::where('room_type_id', $roomType->id)->where('date', $date)->first();
                                    @endphp
                                    <td class="p-2 border text-center">
                                        @if ($record)
                                            <form action="{{route('availability-rate.update', $record->id)}}" method="post">
                                                @csrf
                                                <input type="number" name="rooms" placeholder="Rooms" value="{{$record->rooms}}" class="w-20 border border-gray-300 rounded text-center mb-1" required/>
                                                <input type="number" name="price" placeholder="Price" value="{{$record->price}}" class="w-20 border border-gray-300 rounded text-center"/>
                                                <button type="submit" class="hidden"></button>
                                            </form>
                                        @else
                                        <form action="{{route('availability-rate.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="date" value="{{$date}}">
                                            <input type="hidden" name="room_type_id" value="{{$roomType->id}}">
                                            <input type="number" name="rooms" placeholder="Rooms" class="w-20 border border-gray-300 rounded px-2 py-1 mb-1" required>
                                            <input type="number" name="price" placeholder="Price" class="w-20 border border-gray-300 rounded px-2 py-1" required>
                                            <button type="submit" class="hidden"></button>
                                        </form>
                                        @endif
                                    </td>

                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout> --}}






<x-app-layout>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
  <div class="flex justify-between ">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">💰 Availabilities & Rates</h2>
  <!-- Month selector  -->
  <div class="mb-4">
    <form action="{{ route('availability-rate.index') }}" method="get">
        <input type="month" name="month" value="{{ $month }}" onchange="this.form.submit()"
            class="border border-gray-300 rounded px-3 py-2">
    </form>
</div>
  </div>
                {{-- <!-- Month selector  -->
                <div class="mb-4">
                    <form action="{{ route('availability-rate.index') }}" method="get">
                        <input type="month" name="month" value="{{ $month }}" onchange="this.form.submit()"
                            class="border border-gray-300 rounded px-3 py-2">
                    </form>
                </div> --}}

                {{-- scroller area --}}
                <div class="overflow-x-auto relative">
                    <div class="sticky left-0 z-10 bg-white" style="width: fit-content;">
                        <table class="text-sm text-left border border-gray-200">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="p-2 border w-40">Room Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomTypes as $roomType)
                                    <tr class="border">
                                        <td class="p-6 border font-semibold">
                                            <p>{{ $roomType->name }}</p><br>
                                            <p>INR</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="absolute top-0 left-40 overflow-x-auto" style="width: calc(100% - 160px);">
                        <table class="text-sm text-left border border-gray-200">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    @foreach ($dates as $date)
                                        <th class="p-2 border">{{ \Carbon\Carbon::parse($date)->format('D d M') }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomTypes as $roomType)
                                <tr>
                                @foreach ($dates as $date)
                                    @php
                                        $record = \App\Models\AvailabilityRate::where('room_type_id', $roomType->id)
                                            ->where('date', $date)
                                            ->first();
                                    @endphp
{{--                                    <td class="p-2 border text-center">--}}
{{--                                        @if ($record)--}}
{{--                                            <form action="{{ route('availability-rate.update', $record->id) }}"--}}
{{--                                                method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input type="number" name="rooms" placeholder="Rooms"--}}
{{--                                                    value="{{ $record->rooms }}"--}}
{{--                                                    class="w-20 border border-gray-300 rounded text-center mb-1"--}}
{{--                                                    required />--}}
{{--                                                <input type="number" name="price" placeholder="Price"--}}
{{--                                                    value="{{ $record->price }}"--}}
{{--                                                    class="w-20 border border-gray-300 rounded text-center" />--}}
{{--                                                <button type="submit" class="hidden"></button>--}}
{{--                                            </form>--}}
{{--                                        @else--}}
{{--                                            <form action="{{ route('availability-rate.store') }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="date" value="{{ $date }}">--}}
{{--                                                <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">--}}
{{--                                                <input type="number" name="rooms" placeholder="Rooms"--}}
{{--                                                    class="w-20 border border-gray-300 rounded px-2 py-1 mb-1" required>--}}
{{--                                                <input type="number" name="price" placeholder="Price"--}}
{{--                                                    class="w-20 border border-gray-300 rounded px-2 py-1" required>--}}
{{--                                                <button type="submit" class="hidden"></button>--}}
{{--                                            </form>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}

                                        <td class="p-2 border text-center">
                                            <form class="availability-form" data-action="{{ $record ? 'update' : 'store' }}"
                                                  data-id="{{ $record->id ?? '' }}"
                                                  data-date="{{ $date }}"
                                                  data-room-type="{{ $roomType->id }}">
                                                @csrf
                                                <input type="number" name="rooms" placeholder="Rooms"
                                                       value="{{ $record->rooms ?? '' }}"
                                                       class="w-20 border border-gray-300 rounded text-center mb-1 room-input"
                                                       required />
                                                <input type="number" name="price" placeholder="Price"
                                                       value="{{ $record->price ?? '' }}"
                                                       class="w-20 border border-gray-300 rounded text-center price-input"
                                                       required />
                                            </form>
                                        </td>

                                    @endforeach
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.querySelectorAll('.availability-form').forEach(form => {
                form.querySelectorAll('input').forEach(input => {
                    input.addEventListener('change', () => {
                        const action = form.dataset.action;
                        const roomTypeId = form.dataset.roomType;
                        const date = form.dataset.date;
                        const id = form.dataset.id;

                        const rooms = form.querySelector('.room-input').value;
                        const price = form.querySelector('.price-input').value;

                        const url = action === 'update'
                            ? `/availability-rate/update/${id}`
                            : `/availability-rate/store`;

                        // const method = action === 'update' ? 'PUT' : 'POST';

                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                room_type_id: roomTypeId,
                                date: date,
                                rooms: rooms,
                                price: price
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Saved:', data);
                                if (action === 'store') {
                                    form.dataset.action = 'update';
                                    form.dataset.id = data.id; // returned by store method
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });
            });
        });
    </script>



</x-app-layout>
