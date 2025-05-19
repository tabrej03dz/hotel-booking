<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">--}}
{{--            <h2 class="font-bold text-2xl text-gray-800">--}}
{{--                {{ __('Payments') }}--}}
{{--            </h2>--}}
{{--        </div>--}}
{{--    </x-slot>--}}

    <div class="py-12">
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
                                        @if($record)
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
</x-app-layout>
